<?php
    $db = new Database;
    $conn = $db->conn();
    $sql = "UPDATE user SET 'username'='$this->username','password'='$this->password','fullname,'='$this->fullname,
        'age'='$this->age, 'sdt'='$this->sdt' WHERE id='$id'";
    if($conn->query($sql)===true){
        echo "Sửa thành công";
    }else{
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
?>