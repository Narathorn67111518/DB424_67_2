<?php
$server = "db403-mysql";
$username = 'root';
$passwoed = 'P@ssw0rd';
$db = 'northwind';
$conn = new mysqli($server, $username , $passwoed , $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL First Contact</title>
</head>
<body>
<?php
    $sql = "SELECT * FROM categories";
    $result =   $conn->query($sql);
    echo '<h3>แสดงข้อมูลจากตาราง cattegories</h3>';
    echo '<table>';
    echo '<tr><th>CategoryID</th><th>CategoryName</th></tr>';
    while  ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo " <td>{$row['CategoryID']}</td>";
        echo " <td>{$row['CategoryName']}</td>";
        echo '<tr>';
    }
echo '</table>';
?>
    </table>
<!-- โจทย์จากวิชา DB 304 --> 
    <h3> แสดงข้อมูลชื่อสินค้า (ProductName) และราคาต่อหน่วย (UnitPrice) ของสินค้าที่มีราคามากกว่า 50 บาท
    จากนั้นจัดเรียงตามราคาจากสูงไปต่ำ</h3> 
    <table>
        <tr>
            <th> ProductName</th>  
            <th> UnitPrice</th>
        <tr>
<?php
$sql = 'selecy ProductName, UniPrice
        from products
        where UnitPrice > 50
        order by UnitPrice desc';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    echo '<tr>';
    echo "<td>{$row['ProductName']}</td>";
    echo "<td>{$row['UnitPrice']}</td>";
    echo '</tr>';
}
    $conn->close();
?>
</body>
</html>