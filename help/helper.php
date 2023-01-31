<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
class Helper {
    public static function Paginate($sql_name, $limit_a_page,$page){
        require_once ('..\model\database.php');
        $db = new Database;
        $conn = $db->conn();
        $page_first_result = ($page-1)*$limit_a_page;
        $sql = "SELECT * FROM $sql_name";
        $result = $conn->query($sql);
        $number_of_result = mysqli_num_rows($result);
        $number_of_page = ceil($number_of_result/$limit_a_page);

        $sql = "SELECT * FROM $sql_name LIMIT $page_first_result,$limit_a_page";
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