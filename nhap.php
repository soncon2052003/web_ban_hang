<!DOCTYPE html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "web_ban_hang";
$conn = new mysqli($host,$username,$password,$dbname);

$id=1;
$sql = "SELECT * FROM sanpham";
$sp = [];
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $sp[] = $row;
}
?>
<html>
    <head>
        <title>Hello</title>
    </head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
<body>
    <div class="card-group">
        <?php
        $i=0;
        while($i<6){
        ?>  

            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $sp[$i]['image']; ?>" alt="" width="400" height="248">
            <div class="card-body">
                <h5 class="card-title"><?php echo $sp[$i]['tensanpham']; ?></h5>
                <p class="card-text">
                    Some quick example text to build on the card
                    title and make up the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go Somewhere</a>
            </div>
            </div>
        <?php
        $i=$i+1;
        }
        mysqli_close($conn);
        ?>
    </div>
</body>