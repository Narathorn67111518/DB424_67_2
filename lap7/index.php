<?php
session_start();
if (!isset($_SESSION['user'])){
    header(location: 'singin.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>Welcome 
<?php
echo  $_SESSION['user']['firstName'] .' '.
      $_SESSION['user']['firstName'];
?>
    </h1>
    <button onclick="signout()">Sign Out</button>

    <script>
        function signout() {
            location.href = 'signout.php';
        }
        </script>
</body>
</html>