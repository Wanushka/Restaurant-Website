
<?php
session_start();


// Check if the username is set in the session
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the username is not set
    header("Location: logged.php");
    exit();
}

// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$database = "yummyfood";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission for order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    // Get the form data
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $unit_price = $_POST['unit_price'];
    $quantity = $_POST['quantity'];
    $total_price = $unit_price * $quantity;

    // Fetch user_id based on the username from the user table
    $username = $_SESSION['username'];
    $userQuery = "SELECT user_id FROM user WHERE first_name = '{$_SESSION['username']}'";
    $userResult = $conn->query($userQuery);

    if ($userResult->num_rows > 0) {
        $userData = $userResult->fetch_assoc();
        $user_id = $userData['user_id'];

        // Insert data into the cart table
        $insertQuery = "INSERT INTO cart (user_id, item_id, item_name, quantity, price) VALUES ('$user_id', '$item_id', '$item_name', '$quantity', '$unit_price')";

        if ($conn->query($insertQuery) === TRUE) {
            echo '<script>alert("Item added to the cart successfully.");</script>';
        } else {
            echo '<script>alert("Error adding item to the cart: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error fetching user data.");</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yummy Food</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <LINK rel="stylesheet" href="style.css">
    <link rel="stylesheet" hrf="menu.css">

    <style>/*Home*/
* {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  width: 100%;
  height: 100%;
  position: absolute;
  margin-top:-820px ;
  margin-left:5px;
  margin-right: 5px;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 0px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.menu {
    text-align: center;
    padding: 20px;
}

.drinks {
    color:black;
    padding: 70px;
    text-align:center;
}

.box-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;

}

.box {
    float:left;
    width: 300px;
    margin: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius:20px;
}

.image img {
    width: 20%;
    height: 20%;
    border-bottom: 1px solid #ddd;
}

.content {
    padding: 10px;
    text-align: center;
}

.stars {
    color: #f39c12;
    text-align:center;
}

.price {
    font-size: 20px;
    margin-bottom: 10px;
}

form {
    margin-top: 10px;
}

label {
    font-size: 16px;
    font-weight: bold;
}

input[type="number"] {
    width: 50px;
    text-align: center;
}

.btn {
    background-color: black;
    color: #fff;
    padding: 8px 15px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius:20px;
}

.btn:hover {
    background-color: red;
}


</style>
    
</head>
<body>
    <!--Main-->
    <section id="Home">
        <nav class="navbar">
            <!-- LOGO -->
            <div class="logo"><span style="font-family: mv boli;color:yellow;font-size: 20px;">YUMMY </span><b>FOOD</b></div>
        
            <!-- NAVIGATION MENU -->
            <ul class="nav-links">
        
              <!-- USING CHECKBOX HACK -->
              <input type="checkbox" id="checkbox_toggle" />
              <label for="checkbox_toggle" class="hamburger">&#9776;</label>
        
              <!-- NAVIGATION MENUS -->
              <div class="list">
        
                <li><a href="#Home">Home</a></li>
                <li class="services">
                  <a href="#Food Menu">Food Menu</a>
        
                  <!-- DROPDOWN MENU -->
                  <ul class="dropdown">
                    <li><a href="#Burger">Burger</a></li>
                    <li><a href="#Pizza">Pizza</a></li>
                    <li><a href="#Dessert">Dessert</a></li>
                    <li><a href="#Drinks">Drink</a></li>
                  </ul>
        
                </li>
                <li><a href="#Ourservices">ourservices</a></li>
                <li><a href="#Review">Review</a></li>
                <li><a href="#Locations">Locations</a></li>
                <li> <div class="profile-box">
                <li><a href="login.php">SIGN OUT</a></li>
                <li><a href="cart"><i class="fa-solid fa-shopping-cart"></i></a></li>
              
            </ul>
        </nav>
    </section>

<!--Home-->
<div class="slideshow-container">

    <div class="mySlides fade">
    <img src="image/20off.png"width=100%>
    </div>

    <div class="mySlides fade">
     <img src="image/15off.png"width=100%>
    </div>

    <div class="mySlides fade">
    <img src="image/10off.png"width=100%>
    </div>
</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<!--food catagory-->
 <!--Buger Menu-->

 
 <div class="menu" id="Burger">
        <br><br><h1>Burger<span>Menu</span></h1>

        <div class="menu_box">
            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/1.jpg">
                </div>
                <div class="menu_info">
                    <h2>Supreme Chicken Burger</h2>
                    <h5></h5>
                    <h3>Rs.500.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                    
                </div>

            </div> 
            
            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/2.jpg">
                </div>

                <div class="menu_info">
                    <h2>Cheesy Beef Burger</h2>
                    <h5></h5>
                    <h3>Rs.960.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 

            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/3.jpg">
                </div>
                <div class="menu_info">
                    <h2>Double Chicken Burger</h2>
                    <h5></h5>
                    <h3>Rs.600.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 

            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/4.jpg">
                </div>
                <div class="menu_info">
                    <h2>Cheesy Chicken Burger</h2>
                    <h5></h5>
                    <h3>Rs.820.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>
            </div> 
        </div> 

    </div> 
    
    <!--Pizza Menu-->

    <div class="menu" id="Pizza">
    <br><br><h1>Pizza<span>Menu</span></h1>

        <div class="menu_box">
            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/9.png">
                </div>

                <div class="menu_info">
                    <h2>Chilli Cheese Pizza</h2>
                    <h5></h5>
                    <h3>Rs. 1800.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 
            
            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/10.png">
                </div>
                <div class="menu_info">
                    <h2>Double Chicken Pizza</h2>
                    <h5></h5>
                    <h3>Rs. 1000.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 

            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/11.png">
                </div>
                <div class="menu_info">
                    <h2>Chilli Chicken Pizza</h2>
                    <h5></h5>
                    <h3>Rs. 900.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 

            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/12.png">
                </div>
                <div class="menu_info">
                    <h2>Sausage Delight Pizza</h2>
                    <h5></h5>
                    <h3>Rs. 1200.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 
        </div> 
    </div>   
    
<!--desert menu-->

    <div class="menu" id="Dessert">
    <br><br><h1>Dessert<span>Menu</span></h1>

        <div class="menu_box">
            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/5.jpg">
                </div>
                <div class="menu_info">
                    <h2>Donuts</h2>
                    <h5></h5>
                    <h3>Rs.300.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 
            
            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/6.jpg">
                </div>
                <div class="menu_info">
                    <h2>Ice Cream</h2>
                    <h5></h5>
                    <h3>Rs.200.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 

            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/7.jpg">
                </div>

                <div class="menu_info">
                    <h2>Chocalate cup</h2>
                    <h5></h5>
                    <h3>Rs.200.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 

            <div class="menu_card">

                <div class="menu_image">
                    <img src="image/8.jpg">
                </div>
                <div class="menu_info">
                    <h2>Apple Cake</h2>
                    <h5></h5>
                    <h3>Rs.120.00</h3>
                    <div class="menu_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="menu_btn"onclick=addtocart()>Add to Cart</a>
                    <script>function addtocart(){alert("System is under Maintaining You can Buy Drinks item only! Sorry for the difficulties");}</script>
                </div>

            </div> 
        </div> 
    </div>

    <!--Drinks-->

<!--menu section starts-->

<section class="menu" id="menu">
<br><br>
<div class="drinks" id="Drinks"><h1>Drinks<span>Menu</span></h1></div>

        
<div class="box-container">

<?php
// Assuming $conn is your database connection
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagePath = strtolower(str_replace(' ', '_', $row['item_name'])) . '.png';
?>
        <div class="box">
            <div class="image">
                <img src="image/<?php echo $imagePath; ?>" style="height: 300px; width:100%" alt="<?php echo $row['item_name']; ?>">
            </div>
            <div class="content">
                <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <h3><?php echo $row['item_name']; ?></h3>
                <div class="price" style = "font-size:20px">Rs.<?php echo $row['price']; ?></div>
                <form method="post" action="">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                    <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>">
                    <input type="hidden" name="unit_price" value="<?php echo $row['price']; ?>">
                    <label for="quantity">Items:</label>
                    <input type="number" name="quantity" value="1" min="1"><br><br>
                    <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
                </form>
            </div>
        </div>
<?php
    }
} else {
    echo '<script>alert("No food items available.");</script>';
}

$conn->close();
?>
</div>
</section>
<br>
<hr>
<hr>

<!--ouerservices-->

<div class="ourservices" id="Ourservices">
        <h1>Our<span>Services</span></h1>

        <div class="ourservices_image_box">
            <div class="ourservices_image">
                <img src="image/delivery.jpg">

                <h3>FREE<br>DELIVERY</h3>
            </div>

            <div class="ourservices_image">
                <img src="image/serve.jpg">

                <h3>FRIENDLY<br>SERVICE</h3>
            </div>

            <div class="ourservices_image">
                <img src="image/music.jpg">

                <h3>MUSIC</h3>
            </div>

            <div class="ourservices_image">
                <img src="image/takeaway2.jpg">

                <h3>FOOD<br>TAKEAWAY</h3>
            </div>

            <div class="ourservices_image">
                <img src="image/24x7.jpg">

                <h3>24 X 7<br>SERVICE</h3>
            </div>

            <div class="ourservices_image">
                <img src="image/offer.jpg">

                <h3>FREE<br>DISCOUNTS</h3>
            </div>

        </div>
        <br><br><br>
    </div>
</div>
<hr>
<hr>

 <!--Review-->

 <div class="review" id="Review">
        <br><br><br><br><h1>Customer<span>Review</span></h1>

        <div class="review_box">
            <div class="review_card">

                <div class="review_profile">
                    <img src="image/user.png">
                </div>
                <div class="review_text">
                <div class="menu_icon" style="align:center;color:yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                    </div>
                    <h2 class="name">Isuru Dilshan</h2>
                    <p>Yummy Food staff members are very friendly. They gave good service.
                        Tasty & Authentic Italian taste. Value for Money.  
                    </p>
                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="image/user.png">
                </div>
                <div class="review_text">
                <div class="menu_icon" style="align:center;color:yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                    </div>
                    <h2 class="name">Anjana Dilsara</h2>
                    <p>We were there for family holiday.
                        Great quality. Value for money. Many varieties.
                        On weekends, Late afternoons and specially public holidays place the order in advance to avoid long wait times.
                    </p>
                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="image/user.png">
                </div>
                <div class="review_text">
                <div class="menu_icon" style="align:center;color:yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                    </div>
                    <h2 class="name">Dulshan Nipun</h2>

                    <p>We love chicken delight and the double cheese Pizza. They also have one of the best Garlic breads in the town. Food is as usual fresh and hot.   
                    </p>
                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="image/user.png">
                </div>

                <div class="review_text">
                    <div class="menu_icon" style="align:center;color:yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i><br>
                    </div>
                    <h2 class="name">Malisha Amarakoon</h2>
                    <p>Your food is super and your staff is very friendly your place is very clean your service to the coustemer is very good   
                    </p>

                </div>

            </div>

        </div>

    </div>

<hr>
<hr>

<!--Locations-->

<div class="locations" id="Locations">
        <br><h1>Our<span>Locations</span></h1>

        <div class="locations_box">
            <div class="profile">
                <img src="image/kurunegala.jpg"width="100px"height="100px">

                <div class="info">
                    <h2 class="name">KURUNEGALA</h2>
                    <p class="data">Our kurunegala branch is specially famous for our Pizza.</p>
                </div>

            </div>

            <div class="profile">
                <img src="image/galle.jpeg"width="100px"height="100px">

                <div class="info">
                    <h2 class="name">GALLE</h2>
                    <p class="data">You can enjoy our special Burger and Dessert from this branch.</p>
                </div>

            </div>

            <div class="profile">
                <img src="image/colombo.jpg"width="100px"height="100px">

                <div class="info">
                    <h2 class="name">COLOMBO</h2>
                    <p class="data">Our colombo branch special for our every food items.</p>
                </div>

            </div>

            <div class="profile">
                <img src="image/negombo.jpg"width="100px"height="100px">

                <div class="info">
                    <h2 class="name">NEGOMBO</h2>
                    <p class="data">Our this branch is mainly famous for drinks and desserts.</p>
                </div>

            </div>

        </div>

    </div>

   



    <!--Footer-->

    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""></a><i class="fa fa-github"></i></a>
                <a href=""></a><i class="fa fa-linkedin"></i></a>
            </div>
        </div>

        <h4 class="end">Design by<span>WANUWA&#128151;</span></h4>

    </footer>
    <script>
        let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

// JavaScript code for signout button
document.addEventListener("DOMContentLoaded", function() {
    var profileBox = document.querySelector('.profile-box');
    var signoutBox = document.getElementById('signoutBox');
      
    profileBox.addEventListener('mouseover', function() {
        signoutBox.style.display = 'block';
        });
      
    profileBox.addEventListener('mouseout', function() {
        signoutBox.style.display = 'none';
        });
    });
    </script>
    <script src="script.js"></script>


</body>
</html>