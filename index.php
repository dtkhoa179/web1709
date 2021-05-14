<?php
session_start();
include('admin/db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<style>
body {background-color: #BFCDFF;}
*{
	margin: 0;
	padding: 0;
	font-family: 'Roboto', sans-serif;
}

nav{
	background-color: #C397F5;
	color: #fff;
	display: flex;
	justify-content: space-between;
	padding: 20 50px;
}

nav ul li{
	list-style: none;
	display: inline-block;
	margin-left: 5px;
	margin-right: 5px;
}

nav li a{
	padding: 10 40px;
	background-color: SlateBlue;
	text-decoration: none;
	color: #fff;
}
</style>
</head>
<head>
<title>Welcome to the DTK toy store</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<nav>
<img src="product-images/logo1.jpg" alt="logo" width="150" height="150">
<ul>
<li><a href = "index.php">Home</a></li>
<li><a href = "about.php">About</a></li>
<li><a href = "toys.php">Toys</a></li>
<li><a href = "bonus.php">Bonus</a></li>
<li><a href = "login.php">Login</a></li>
</ul>
</nav>
<div style="width:700px; margin: 100 auto;">

<h2><center>Welcome to the ATN toy store</h2>   
<br>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>

<?php
}

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='product-images/".$row['image']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />
<center><a href="https://ctthanh.com"><strong>Copyright &copy 2021 by CTTHANH</strong></a></center>
</div>
</body>
</html>
