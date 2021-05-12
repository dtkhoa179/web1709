<center><h1>Add products</h1>
<center>
<?php
    require "db.php";
?>
<?php
    if(isset($_POST["add"])){
        $Name = $_POST["name"];
        $Code = $_POST["code"];
        $Price = $_POST["price"];
        $Image = $_POST["image"];

        if($Id == ""){echo "Please enter product id <br />";}
        if($Name == ""){echo "Please enter product name <br />";}
        if($Code == ""){echo "Please enter product code <br />";}
        if($Price == ""){echo "Please enter product price <br />";}
        if($Image == ""){echo "Please enter product image <br />";}

        if($Name != "" && $Code != "" && $Price != "" && $Image != ""){
            $sql = "INSERT INTO products(name,code,price,image) VALUES('$Name', '$Code', '$Price', '$Image')";
            $qr = mysqli_query($con,$sql);
            header("location: index.php");
        }
    }
?>
<form method="POST" action="">
    <label >Name </label><input type="text" name="name" /><br /><br />
    <label >Code </label><input type="text" name="code" /><br /><br />
    <label >Price </label><input type="text" name="price" /><br /><br />
    <label >Image </label><input type="file" alt="SUBMIT" name="image" /><br /><br />
    <input type="submit" name = "add" value= "Add" />
</form>