<?php include 'navbar.php'; ?>
<?php
$stmt = $pdo->prepare('SELECT * FROM customer_user WHERE username = ?');
$stmt->bindParam(1, $_SESSION['login1'], PDO::PARAM_STR);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
if (isset($_POST['update'])) {
    $new_Fname = $_POST['customerFname'];
    $new_Lname = $_POST['customerLname'];
    $new_email = $_POST['email'];
    $new_address = $_POST['address'];
    $new_city = $_POST['addresscity'];
    if($new_email != $_SESSION['email']) {
    $stmt = $stmt = $pdo->prepare("select * from customer_user where email = ? ");
    $stmt->bindParam(1, $new_email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount(); 
    if ($result >= 1) {
        echo '<script>alert("email already exists, please re-enter.")</script>'; 
    } else
    {
    $stmt = $pdo->prepare('UPDATE customer_user SET customerFname=?,customerLname=?,email=?,address=?,city=?  WHERE username = ?');
    $stmt->bindParam(1, $new_Fname, PDO::PARAM_STR);
    $stmt->bindParam(2, $new_Lname, PDO::PARAM_STR);
    $stmt->bindParam(3, $new_email, PDO::PARAM_STR);
    $stmt->bindParam(4, $new_address, PDO::PARAM_STR);
    $stmt->bindParam(5, $new_city, PDO::PARAM_STR);
    $stmt->bindParam(6, $_SESSION['login1'], PDO::PARAM_STR);
    $stmt->execute();
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['customerFname'] = $_POST['customerFname'];
    $_SESSION['customerLname'] = $_POST['customerLname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['city'] = $_POST['addresscity'];
    echo '<script>alert("Change information successfully.")</script>';
    }}
}

?>
<div class="wrapper-login justify-content-center d-flex">
    <div class=" m-auto">
        <form action="" autocomplete="off" method="POST">
            <table class="table table-danger table-bordered" style="text-align: center; border-width:1 ">
                <tr>
                    <td colspan="2">
                        <h3>Change Information</h3>
                    </td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="customerFname" id="customerFname" value="<?=$_SESSION['customerFname']?>" >

                    </td>
                </tr>
                <tr>
                    <td>Family Name</td>
                    <td>
                        <input type="text" name="customerLname" id="customerLname" value="<?=$_SESSION['customerLname']?>" >

                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> 
            <input id="input" name="email" type="email" 
            pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" value="<?=$_SESSION['email']?>"> 
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td> <select id="city" name="addresscity">
                    <option value="H?? N???i">Tp.H?? N???i
                    <option value="H??? Ch?? Minh">TP HCM
                    <option value="C???n Th??">Tp.C???n Th??
                    <option value="???? N???ng">Tp.???? N???ng
                    <option value="H???i Ph??ng">Tp.H???i Ph??ng
                    <option value="An Giang">An Giang
                    <option value="B?? R???a - V??ng T??u">B?? R???a - V??ng T??u
                    <option value="B???c Giang">B???c Giang
                    <option value="B???c K???n">B???c K???n
                    <option value="B???c Li??u">B???c Li??u
                    <option value="B???c Ninh">B???c Ninh
                    <option value="B???n Tre">B???n Tre
                    <option value="B??nh ?????nh">B??nh ?????nh
                    <option value="B??nh D????ng">B??nh D????ng
                    <option value="B??nh Ph?????c">B??nh Ph?????c
                    <option value="B??nh Thu???n">B??nh Thu???n
                    <option value="C?? Mau">C?? Mau
                    <option value="Cao B???ng">Cao B???ng
                    <option value="?????k L???k">?????k L???k
                    <option value="?????k N??ng">?????k N??ng
                    <option value="??i???n Bi??n">??i???n Bi??n
                    <option value="?????ng Nai">?????ng Nai
                    <option value="?????ng Th??p ">?????ng Th??p
                    <option value="Gia Lai">Gia Lai
                    <option value="H?? Giang">H?? Giang
                    <option value="H?? Nam">H?? Nam
                    <option value="H?? T??nh">H?? T??nh
                    <option value="H???i D????ng">H???i D????ng
                    <option value="H???u Giang">H???u Giang
                    <option value="H??a B??nh">H??a B??nh
                    <option value="H??ng Y??n">H??ng Y??n
                    <option value="Kh??nh H??a">Kh??nh H??a
                    <option value="Ki??n Giang">Ki??n Giang
                    <option value="Kon Tum">Kon Tum
                    <option value="Lai Ch??u">Lai Ch??u
                    <option value="L??m ?????ng">L??m ?????ng
                    <option value="L???ng S??n">L???ng S??n
                    <option value="L??o Cai">L??o Cai
                    <option value="Long An">Long An
                    <option value="Nam ?????nh">Nam ?????nh
                    <option value="Ngh??? An">Ngh??? An
                    <option value="Ninh B??nh">Ninh B??nh
                    <option value="Ninh Thu???n">Ninh Thu???n
                    <option value="Ph?? Th???">Ph?? Th???
                    <option value="Qu???ng B??nh">Qu???ng B??nh
                    <option value="Qu???ng B??nh">Qu???ng B??nh
                    <option value="Qu???ng Ng??i">Qu???ng Ng??i
                    <option value="Qu???ng Ninh">Qu???ng Ninh
                    <option value="Qu???ng Tr???">Qu???ng Tr???
                    <option value="S??c Tr??ng">S??c Tr??ng
                    <option value="S??n La">S??n La
                    <option value="T??y Ninh">T??y Ninh
                    <option value="Th??i B??nh">Th??i B??nh
                    <option value="Th??i Nguy??n">Th??i Nguy??n
                    <option value="Thanh H??a">Thanh H??a
                    <option value="Th???a Thi??n Hu???">Th???a Thi??n Hu???
                    <option value="Ti???n Giang">Ti???n Giang
                    <option value="Tr?? Vinh">Tr?? Vinh
                    <option value="Tuy??n Quang">Tuy??n Quang
                    <option value="V??nh Long">V??nh Long
                    <option value="V??nh Ph??c">V??nh Ph??c
                    <option value="Y??n B??i">Y??n B??i
                    <option value="Ph?? Y??n">Ph?? Y??n
                </select>
                <script>
                    var ident = "<?= isset($_SESSION['city']) ? $_SESSION['city'] : '' ?>";
                    $('#city option[value="' + ident + '"]').attr("selected", "selected");
                </script>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <input type="address" name="address" id="address" value="<?=$_SESSION['address']?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input class="btn btn-danger btn-hover" type="submit" name="update" value="update"></td>
                </tr>
            </table>
        </form>
    </div>
</div>