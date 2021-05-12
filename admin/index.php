<?php
    $servername = "sql6.freesqldatabase.com";
    $username = "sql6411812";
    $password = "4QwNjmclyM";
    $dbname = "sql6411812";
    
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

    $qr = mysqli_query($con,'select * from products') or die ('error qr');
?>

<h1><center>List of products</h1>
<head>
<style>
#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>
</head>
<table border='2' id='t01'>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Code</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
        $i = 1;
        while ($rs = mysqli_fetch_array($qr)) {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$rs["name"]."</td>";
            echo "<td>".$rs["code"]."</td>";
            echo "<td>".$rs["price"]."</td>";
            echo "<td>".$rs["image"]."</td>";
            echo "<td><a href='edit.php?id=".$rs['id']."'>Edit</a> | <a href='delete.php?id=".$rs['id']."'>Delete</a></td>";
            echo "</tr>";
            $i++;
        }
        
    ?>
</table>
<a href='add.php?id=".$rs['id']."'>Add</a>
