<!DOCTYPE html>
<?php 
$id=$_GET['id'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Sửa thông tin</title>
    </head>
    <body>
        <h1>Sửa thông tin sản phẩm</h1>
        <form action="xl_suasp.php" method="POST">
            <table cellpadding="0" cellspacing="0" border="1">
            ID: <input type="text" name="id" value="<?= $_GET['id'] ?>">
                    <td>
                        Tên sản phẩm:
                    </td>
                    <td>
                        <input type="varchar" name="tensanpham" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Giá:
                    </td>
                    <td>
                        <input type="int" name="gia" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Số lượng: 
                    </td>
                    <td>
                        <input type="int" name="soluong" size="50" />
                    </td>
                </tr>
				<tr>
                    <td>
                        Địa chỉ:
                    </td>
                    <td>
                        <input type="varchar" name="diachi" size="50" />
                    </td>
                </tr>
				<tr>
            </table>
            <input type="submit" value="Đồng ý sửa" />
            <input type="reset" value="Nhập lại" />
        </form>
    </body>
</html>