<?php
      function loadall_taikhoan() {
        $sql = "select * from taikhoan order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
      }
      function insert_taikhoan($email, $user, $pass) {
        $sql = "insert into taikhoan(email, user, pass) values('$email', '$user', '$pass')";
        pdo_execute($sql);
    }
    function checkuser($user, $pass) {
      $sql = "select * from taikhoan where user= '".$user."' and pass= '".$pass."'";
      $tk = pdo_query_one($sql);
      return $tk;
  }
    function checkemail($email) {
      $sql = "select * from taikhoan where email= '".$email."'";
      $tk = pdo_query_one($sql);
      return $tk;
  }
    function update_taikhoan($id, $email, $user, $pass, $address, $tell) {
          $sql = "update taikhoan set email= '".$email."', user= '".$user."', pass= '".$pass."', address= '".$address."', tell= '".$tell."' where id=".$id;
      pdo_execute($sql);
  }
    function loadone_taikhoan($id) {
      $sql = "SELECT * FROM taikhoan WHERE id =".$id;
      $tk = pdo_query_one($sql);
      return $tk;
  }
  function delete_taikhoan($id) {
    $sql = "delete from taikhoan where id =".$id;
    pdo_execute($sql);
}

?>