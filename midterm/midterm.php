
<?php
$host = 'db403-mysql';
$user = 'root';
$password = 'P@ssw0rd'; 
$dbname = 'northwind'; 
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_errno) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search product by category</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$page = isset($_GET['page']) ?(int) $_GET['page'] : 1;
$limit = isset($_GET['limit']) ?(int) $_GET['limit'] : 10;
$start = ($page - 1) * $limit;

$query = "SELECT COUNT(*) AS total FROM products";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalRecords = $row['total'];

$totalPages = ceil($totalRecords / $limit);

$sql = "SELECT * FROM categories";
$result =   $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<table class="table"table-bordered>
  <table class="table table-striped-columns">
  <table class="table table-sm">
  <table class="table table-dark table-hover">
  <table class="table table-striped table-hover">
     <tr>
        <th>CategoryName</th>
        <th>CategoryID</th>
    </tr>';
    while  ($row = $result->fetch_assoc()){
      echo '<tr>';
      echo " <td>{$row['CategoryName']}</td>";
      echo " <td>{$row['CategoryID']}</td>";
      echo '<tr>';

    }
  }
echo '</table>';
?>

  <form>  
    <label for="category">
      <select name="category" id="category"> 
      <option value="CategoryID">Beverages</option>
      <option value="CategoryID">Condiments</option>
      <option value="CategoryID">Confections</option>
      <option value="CategoryID">Dairy Products</option>
      <option value="CategoryID">Grains/Cereals</option>
      <option value="CategoryID">Meat/Poultry</option>
      <option value="CategoryID">Produce</option>
      <option value="CategoryID">Seafood</option>

<?php
// ทำข้อสอบหลังจาก comment ของแต่ละข้อ
// 1. (2 คะแนน) เขียนคำสั่ง php เพื่อติดต่อฐานข้อมูล northwind

// 2. (3 คะแนน) เขียนคำสั่ง php เพื่อดึงข้อมูล CategoryName และ CategoryID จากตาราง categories

// 3. (5 คะแนน) เพิ่ม element option ใน element select เพื่อแสดงตัวเลือกเป็น CategoryName และค่าที่ได้เป็น CategoryID
// ตัวอย่างการเพิ่ม element options
// <option value="CategoryID">CategoryName</option>

?>
      </select>
    </label>
    <input type="submit" value="Search" name="submit">
  </form>
</body>
</html>
  