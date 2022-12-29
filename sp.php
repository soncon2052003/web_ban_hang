<html>

<head>
    <title>Trang sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    table {
    border-collapse: collapse;
    }
    .inline{
    display: inline-block;
    float: right;
    margin: 20px 0px;
    }
    input, button{
    height: 34px;
    }
    .pagination {
    display: inline-block;
    }
    .pagination a {
    font-weight:bold;
    font-size:18px;
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border:1px solid black;
    }
    .pagination a.active {
    background-color: pink;
    }
    .pagination a:hover:not(.active) {
    background-color: skyblue;
    }
    </style>
</head>

<body>
<center>
<?php
    require './connect.php';
    if(isset($_GET["search"]) && !empty($_GET["search"]))
    {
        $key = $_GET["search"];
        $sql = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$key%' 
            or gia LIKE '$key' or soluong LIKE '$key' or diachi LIKE '%$key%'";
    }
    else{
        $sql = "SELECT * FROM sanpham";
    }

    $result = mysqli_query($conn,$sql);
?>

<h3 align = "center">Thông tin sản phẩm</h3>
    <ftable class="search-form" align="center" cellpadding="5">
        <tr>
            <td>
                <form action="sp.php" method="get">
                    <input type="text" name="search" placeholder="Nhập từ khóa cần tìm" value = 
                    "<?php if(isset($_GET["search"])){echo $_GET["search"];}?>">
                    <input type="submit" value="Tìm">
                    <input type="button" value="Tất cả" onclick="window.location.href='sp_all.php'">
                </form>
            </td>
        </tr>
    </table>

<?php
// Import the file where we defined the connection to Database.
require_once "./connect.php";
$per_page_record = 4;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
}else {
    $page=1;
}
$start_from = ($page-1) * $per_page_record;
$query = "SELECT * FROM sanpham LIMIT $start_from, $per_page_record";
$rs_result = mysqli_query($conn, $query);
?>

<div class="container">
<br>
<div>
<h1>Thông tin sản phẩm</h1>
<table class="table table-striped table-condensed table-bordered">
<thead>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Địa chỉ</th>
    </tr>
</thead>
<tbody>
    <?php
    while ($row = mysqli_fetch_array($rs_result)) {
    // Display each field of the records.
    ?>

    <tr>
        <td><?php echo $row["tensanpham"]; ?></td>
        <td><?php echo $row["gia"]; ?></td>
        <td><?php echo $row["soluong"]; ?></td>
        <td><?php echo $row["diachi"]; ?></td>
    </tr>
    <?php
    };
    ?>
</tbody>

</table>
<div class="pagination">
    <?php
    $query = "SELECT COUNT(*) FROM sanpham";
    $rs_result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    echo "</br>";
    // Number of pages required.
    $total_pages = ceil($total_records / $per_page_record);
    $pagLink = "";
    if($page>=2){
    echo "<a href='sp.php?page=".($page-1)."'>  Prev </a>";
    }

    for ($i=1; $i<=$total_pages; $i++) {
        if ($i == $page) {
            $pagLink .= "<a class = 'active' href='sp.php?page="
            .$i."'>".$i." </a>";
        }else {
            $pagLink .= "<a href='sp.php?page=".$i."'>
            ".$i." </a>";
    }

    };

    echo $pagLink;

    if($page<$total_pages){
        echo "<a href='sp.php?page=".($page+1)."'>  Next </a>";
    }
    ?>
</div>
    <div class="inline">
    <input id="page" type="number" min="1″ max="<?php echo $total_pages?>"
    placeholder="<?php echo $page."/".$total_pages; ?>" required>
    <button onClick="go2Page();">Go</button>
    </div>
    </div>
    </div>
</center>

<script>
function go2Page(){
    var page = document.getElementById("page").value;
    page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
    window.location.href = 'sp.php?page='+page;
}
</script>
</body>
</html>