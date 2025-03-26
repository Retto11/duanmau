<?php
    if (is_array($tk)) {
        extract($tk);
    }
?>

<div class="row">
    <div class="row formtitle">
        <h1>CẬP NHẬT TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=updatetk" method="post">
            <div class="row mb10">
                Mã tài khoản <br>
                <input type="text" name="id" value="<?= $id?>" readonly>
            </div>
            <div class="row mb10">
                Tên đăng nhập<br>
                <input type="text" name="user" value="<?= $user?>" id="">
            </div>
            <div class="row mb10">
                Mật khẩu <br>
                <input type="text" name="pass" value="<?= $pass?>" id="">
            </div>
            <div class="row mb10">
                Email <br>
                <input type="text" name="email" value="<?= $email ?>" id="">
            </div>
            <div class="row mb10">
                Địa chỉ <br>
                <input type="text" name="address" value="<?= $address ?>" id="">
            </div>
            <div class="row mb10">
                Điện thoại <br>
                <input type="text" name="tell" value="<?= $tell ?>" id="">
            </div>
            <div class="row mb10">
                Vai trò <br>
                <input type="text" name="role" value="<?= $role?>" id="">
            </div>

            <div class="row mb10">
                <input type="hidden" name="id" value="<?= $id  ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listtk"><input type="button" value="DANH SÁCH"></a>
            </div>
           
        </form>
    </div>
</div>
</div>