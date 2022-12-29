<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sản phẩm</title>
    </head>
    <body>
    <h1>Nhập thông tin sản phẩm cần thêm</h1>
        <form action="xl_themsp.php" method="POST">
            <table cellpadding="0" cellspacing="0" border="1">
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
            <input type="submit" value="Thêm sản phẩm" />
            <input type="reset" value="Nhập lại" />
        </form>
    </body>
</html>