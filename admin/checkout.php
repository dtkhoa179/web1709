<?php
    $servername = "sql6.freesqldatabase.com";
    $username = "sql6411812";
    $password = "4QwNjmclyM";
    $dbname = "sql6411812";
    
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

    $qr = mysqli_query($con,'select * from checkout') or die ('error qr');
?>

<h1><center>List of checkout</h1>
<head>
<style>
#t01 {
  width: 100%;    
  background-color: #999999;
}
</style>
</head>
<table border='2' id='t01'>
    <tr>
        <th>Date</th>
        <th>Total</th>
        <th>Amount</th>
    </tr>
    <?php
        $i = 1;
        while ($rs = mysqli_fetch_array($qr)) {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$rs["date"]."</td>";
            echo "<td>".$rs["total"]."</td>";
            echo "<td>".$rs["amount"]."</td>";
            echo "</tr>";
            $i++;
        }
        
    ?>
</table>
