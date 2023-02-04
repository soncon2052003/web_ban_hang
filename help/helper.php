<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php 
class Helper {
    public static function Paginate($sql_name, $limit_a_page,$page,$key,$sort_option,$search){
        $db = new Database;
        $conn = $db->conn();

        $page_first_result = ($page-1)*$limit_a_page;
        $sql = "SELECT * FROM $sql_name";
        $result = $conn->query($sql);
        $number_of_result = mysqli_num_rows($result);
        $number_of_page = ceil($number_of_result/$limit_a_page);

        $condition = "";
        if($sql_name=="sanpham"){
            $condition .=  "id LIKE '%$search%' or tensanpham LIKE '%$search%' or gia LIKE '%$search%'
            or soluong LIKE '%$search%' or diachi LIKE '%$search%'";
        }else if($sql_name=="user"){
            $condition .= "id LIKE '%$search%' or username LIKE '%$search%' or password LIKE '%$search%' or 
            fullname LIKE '%$search%' or age LIKE '%$search%' or sdt LIKE '%$search%'";
        }else if($sql_name="tintuc"){
            $condition .= "id LIKE '%$search%' or title LIKE '%$search%' or short LIKE '%$search%' or 
            content LIKE '%$search%'";
        }

        if($condition != ""){
            $sqla = "SELECT * FROM $sql_name WHERE $condition";
            $resulta = $conn->query($sqla);
            $number_of_resulta = mysqli_num_rows($resulta);
            $number_of_page = ceil($number_of_resulta/$limit_a_page);
        }

        $sql = "SELECT * FROM $sql_name WHERE $condition ORDER BY $key $sort_option LIMIT $page_first_result,$limit_a_page ";
        return [
            'sql' => $sql,
            'number_page' => $number_of_page 
        ];
    }  

    public static function getData($table_name){
        require_once "C:\laragon\www\web\model\database.php";
        $db = new Database;
        $conn = $db->conn();
        $sql = "SELECT * FROM $table_name";
        $result = $conn->query($sql);
        return $result;
    }
}
?>