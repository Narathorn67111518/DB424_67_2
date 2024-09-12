<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
    <style>
        td {
            width: 50px;
            height: 50px;
        }
        .black {
            background-color: black;
        }
        .while {
            background-color: while;
        }
        table {
            border-spacing: 0;
            border: 1px solid;
        }
    </style>
</head>
<body>
    <table>
       <!-- <tr>
            <td class = "black"></td> 
            <td class = "while"></td>
        </tr>
        <tr>
            <td class = "while"></td> 
            <td class = "black"></td>
        </tr>
    -->
<?php
for($i = 0; $i < 8; $i++) {
    echo '<tr>';
    for($j = 0; $j < 8; $j++) {
        $class = ($i + $j) % 2 == 0 ? 'black' : 'while' ; 
        echo "<td class='$class'></td>";
    }
    echo '<tr>';
}
?>
</body>
</html>