<?php
    require "db.php";
?>
<?php
    if(isset($_GET["id"])){
        $Id = $_GET["id"];
    }
?>

<?php
    if(isset($_POST["edit"])){
        $Id = $_POST["id"];
        $Name = $_POST["name"];
        $Code = $_POST["code"];
        $Price = $_POST["price"];
        $Image = $_POST["image"];

        if($Name == ""){echo "Please enter product name <br />";}
        if($Code == ""){echo "Please enter product code <br />";}
        if($Price == ""){echo "Please enter product price <br />";}
        if($Image == ""){echo "Please enter product image <br />";}
        
        if($Name != "" && $Code != "" && $Price != "" && $Image != ""){
            $sql = "UPDATE products SET name = '" . $Name . "' , code = '" . $Code . "' , price ='" . $Price . "' , image ='" . $Image . "'
            WHERE id = '" . $Id . "'";
            $qr = mysqli_query($con,$sql);
            header("location: index.php");
        }
    }
?>
<?php
    $sql = "SELECT * FROM products WHERE id = '" . $Id . "'";
    $qr = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($qr);

echo '
<form method="POST" action="">
    <input type="hidden" name="id" value="'. $rows['id'] .'">
    <label >Name </label><input type="text" name="name" value="' . $rows['name'] . '"><br /><br />
    <label >Code </label><input type="text" name="code" value="' . $rows['code'] . '"><br /><br />
    <label >Price </label><input type="text" name="price" value="' . $rows['price'] . '"><br /><br />
    <label >Image </label><input type="file" alt="SUBMIT" name="image" value="' .  $rows['image'] . '"><br /><br />
    <input type="submit" name = "edit" value= "Edit" />
</form>
';
?>