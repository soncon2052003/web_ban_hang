<?php
class Helper {
    public static function Paginate($sql_name, $limit_a_page,$page){
        require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'\web\model\database.php');
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

};
?>