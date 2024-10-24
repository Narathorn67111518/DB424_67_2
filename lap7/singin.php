<?php
session_start();
require 'db.php';

if (isset($_POST['singin'])) {
    
    $username = $_POST['username'];    //ตรวจสอบว่า  $username นี้มีอยู่ในฐานข้อมูลหรือไม่ 
    $password = $_POST['password']; 
    $sql = 'SELECT * 
            FROM users join student on  username = studentID   
            WHERE username = ?'; //ดึงข้อมูล พร้อมหา ตำแหน่ง         บรรทัด FROM คือ เชื่อมไปอีกตารางให้มันอยู่ด้วยกัน
    $stmt = $conn->prepare($sql);    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();{
    if ($row = $result->fetch_assoc()) 
    if (password_verify($password,$row['password'])) {   //ตรวจเช็ค password ถ้า รหัสถุกไปอีกหน้านึง
        $_SESSION['user'] = [
            'studentID' =>$row ['studentID'],
            'firstName' =>$row ['firstName'],
            'lastName' =>$row ['lastName'],
        ];
       // $_SESSION['studentID'] = $row ['studentID'];
       // $_SESSION['firstName'] = $row ['firstName'];
       // $_SESSION['lastName'] = $row ['lastName'];
        
        header('location:index.php');      //เชื่อมไปอีกหน้านึง
        exit();
    
        echo 'ถูกต้องเเล้วนะจ้ะ';
    }
    else {
        echo 'password ไม่ถูกต้อง';
  }
    else {
        echo 'Username ไม่ถูกต้อง';
         }
    }
}
?>
