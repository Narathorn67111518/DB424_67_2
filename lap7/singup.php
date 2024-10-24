<?php
require 'db.php'; // คือใช้ไว้ดึงข้อมูลจากข้อมูลที่ต้องการดึงมา

if (isset($_POST['signup'])) { //isset คือเช็คว่ามีความสั่ง post มั้ย
    $username = $_POST['username'];     
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน
try {
    $sql = "SELECT  studentID  
            FROM student 
            WHERE studentID=?";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) { 
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)"; //เรียงตามลำดับที่สร้าง คืออะไรที่มาจากข้างนอกไว้ใจไม่ได้ให้ใส่ ?
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("ss", $username, $password); //เรียกใช้ stmt ส่งข้อมูล เป็นไปตามข้อมูลที่ต้องการ
            $stmt->execute();  // 
            echo 'Success';  
    }
  else {
    echo 'Student ID not found.';
    }
}
catch (Exception $e) {
    echo $e->getMessage();
    }    
}    
        
?>