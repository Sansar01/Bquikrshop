<?php
session_start();
include('db.php');
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
<title>Bquikrshop</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
        <link rel='stylesheet' href='style1.css'>
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style>
			.carousel-inner img {
                width: 100%;
                height: 60%;
                padding-left: 0.5px;
                padding-right: 0.5px;
                border-block: 2px;
            }
            /* The sidebar menu */
            
            .sidebar {
                height: 70%;
                /* 100% Full-height */
                width: 0;
                /* 0 width - change this with JavaScript */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Stay on top */
                top: 0;
                left: 0;
                background-color: bisque;
                /* Black*/
                overflow-x: hidden;
                /* Disable horizontal scroll */
                padding-top: 60px;
                /* Place content 60px from the top */
                transition: 0.5s;
                /* 0.5 second transition effect to slide in the sidebar */
            }
            /* The sidebar links */
            
            .sidebar a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: lightslategrey;
                display: block;
                transition: 0.3s;
            }
            /* When you mouse over the navigation links, change their color */
            
            .sidebar a:hover {
                color: lightsalmon;
            }
            /* Position and style the close button (top right corner) */
            
            .sidebar .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }
            /* The button used to open the sidebar */
            
            .openbtn {
                font-size: 20px;
                cursor: pointer;
                background-color: burlywood;
                color: white;
                padding: 10px 15px;
                border: none;
            }
            
            .openbtn:hover {
                background-color: lightsalmon;
            }
            /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
            
            #main {
                transition: margin-left .5s;
                /* If you want a transition effect */
                padding: 20px;
            }
            /* Add an active class to the active dropdown button */
            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            
            @media screen and (max-height: 450px) {
                .sidebar {
                    padding-top: 15px;
                }
                .sidebar a {
                    font-size: 18px;
                }
            }
            
            .photo {
                padding-top: 60px;
            }
            
            .button1 {
                border-radius: 5px;
                font-size: 15px;
                font-family: lucida calligraphy;
                color: lightseagreen;
                background-color: wheat;
                padding: 5px 6px;
                margin: 0.5px 1px 4px 0.1px;
                cursor: pointer;
                border: none;
                outline: none;
                box-shadow: 0 9px white;
            }
            
            .button1:hover {
                background-color: lightcoral;
            }
            
            .button1:active {
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            
            .button2 {
                border-radius: 5px;
                font-size: 15px;
                font-family: lucida calligraphy;
                color: seagreen;
                background-color: lightgreen;
                padding: 5px 6px;
                margin: 0.5px 1px 4px 10px;
                cursor: pointer;
                border: none;
                outline: none;
                box-shadow: 0 9px ivory;
            }
            
            .button2:hover {
                background-color: lightcoral;
            }
            
            .button2:active {
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            
            .column {
                column-count: 3;
                padding-top: 50px;
            }
            
            .foot {
                padding-top: 100px;
            }
            /*dropdown content*/
            /* Navbar container */
            
            .dropbtn {
                background-color: bisque;
                color: gray;
                padding-top: 12px;
                padding-left: 33px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }
            
            .dropdown {
                position: relative;
                display: inline-block;
            }
            
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 120px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }
            
            .dropdown-content a {
                color: black;
                padding: 5px 12px;
                font-size: 15px;
                text-decoration: none;
                display: block;
            }
            
            .dropdown-content a:hover {
                background-color: #f1f1f1
            }
            
            .dropdown:hover .dropdown-content {
                display: block;
            }
            
            .dropdown:hover .dropbtn {
                color: tomato;
            }
            /*footer*/
            
            .footer {
                left: 0;
				margin: 0;
                bottom: 0;
                width: 100%;
                height: 55%;
                background-color: rgb(24, 23, 23);
                color: white;
                text-align: center;
            }
		</style>
		<script src="MENU.JS"></script>

</head>
<body>


<div id="mySidebar" class="sidebar ">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
                <!---dropdown content-->
                <div class="dropdown">
                    <button class="dropbtn" style="font-size:1.5vw;">Raj gharana</button>
                    <div class="dropdown-content">
                        <a href="Men's wear.php">Men's wear</a>
                        <a href="Women' wear.php">Women's wear</a>
                        <a href="Kid's wear.php">Kid's wear</a>
                    </div>
                </div>

                <br>
                <br>
                <div class="dropdown">
                    <button class="dropbtn" style="font-size:1.5vw;">Prithvi raj</button>
                    <div class="dropdown-content">
                        <a href="Men's wear1.php">Men's wear</a>
                        <a href="Women1's wear.php">Women's wear</a>
                        <a href="Kid1's wear.php">Kid's wear</a>
                    </div>
                </div>
                <br>
                <br>
                <a href="contact.php">Contact Us</a>

            </div>


            <ul class="topnav">
                <li class="left">
                    <div class="main">
                        <button class="openbtn button2" onclick="openNav()"><font face="jokerman" size=3>MENU</font></button>
                        </button>
                    </div>
                    <li class="right">
                        <a href="login.php">
                            <font face="jokerman" size=2 autofocus>LOGIN</font>
                        </a>

                    </li>
                </li>
            </ul>
			<h1 class="app" style="color:orange">
                <a href="Bquikrshop.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtyeaEH1iArsAV9suPQlVNFT699Bis35HqAw&usqp=CAU.jpg" style="max-width:10%;height:auto">
                </a>
                <font face="jokerman" style="font-size:3vw;">BQUIKR
                    <font color="palevioletred" style="font-size:3vw;">sHoP</font>
                </font>
            </h1>
            <div class="container">
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="text"></label>
                        <div class="col-sm-10">
                            <input type=" text " class="form-control " id="text " placeholder="Search shop... " name="text ">
                        </div>
                    </div>
                </form>
            </div>

            <br>
            <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="http://cheapsasta.com/wp-content/uploads/2017/02/Limeroad-2017-Offers-Online-Shopping-Offers-Special-Offers-Deals.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
        <img src="https://i.ytimg.com/vi/rpco4H5Voi8/maxresdefault.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
        <img src="https://happysale.in/hs/img/w/up/christmasoffershappysalejpg1544783853685.jpg" alt="html" width="1100" height="500">
    </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
</a>
</div>

            <div style="width:700px; margin:50 auto;">

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
            <div class='image'><img src='     ".$row['image']."    ' 'width='250px' height='230' style='padding:10px'/></div>
            <div class='name'>".$row['name']."</div>
            <div class='price'>rs".$row['price']."</div>
            <button type='submit' class='button1'>Add to cart</button>
            </form>
            </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</div>
            <div class="footer">
                <br>
                <h4>Store</h4>
                <p><i class="fa fa-fw fa-map-marker"></i>Bquikrshop</p>
                <p><i class="fa fa-fw fa-phone"></i>8517896946 / 9137935845</p>
                <p><i class="fa fa-fw fa-envelope"></i> st9889477@gmail.com / ravendrasahu2525@gmail.com</p>
                <h4>We accept</h4>
                <p><i class="fa fa-fw fa-cc-amex"></i>Amex</p>
                <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
                <br>
                <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
                <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
                <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
                <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
                <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
                <br>
                <br>
                <center>
                    <font face="lucida calligraphy" size="4" color="white" class="foot">Our suppoters is W3c schools</font>
                </center>
            </div>
</div>
</body>
</html>