<?php
include "header.php";
?>
      <h1>ยินดีต้อนรับนะครับไอ้ต้าว</h1>

    <?php
    echo $_SESSION['user']['firstName'].' '.
         $_SESSION['user']['lastName']; 
    ?>
    <br>
    <!-- <button onclick="signout()">ออกจากระบบ</button> -->
    <?php
include "footer.php";
?>