<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Ricetta</title>
    <link rel="stylesheet" type="text/css" href="site.css">
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
    <link rel="icon" href="images/loggo icon only.jpeg" type="images/loggo icon only.jpeg">

</head>
 
<body>
<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     $_COOKIE["signorlogin"] = "log in";

// }
// else
// {
//     $_COOKIE["signorlogin"] = "log out";

// }
?>

    <header>
        <div class="wrapper">
            <a href="HomePage.php"><h1 style="color: #852B2A; float: left; margin-right: 5%; 
            margin-bottom: 0%; padding-bottom: 0%; padding-right: 1%; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; 
            font-weight: 500; ">Ricetta<span >.</span></h1>

            <nav>
                <ul style="color: #852B2A; float: left; margin-bottom: 0%; padding-bottom: 0%; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; font-weight: 400; ">
                    <li><a href="Explore.php?page=Explore" target="_blank">Explore</a></li>
                    <li><a href="Search.php" target="_blank">Search</a></li>
                    <li><a href="aboutus.html" target="_blank">About us</a></li>
                    <li><a href="LoginSignup.php" target="_blank">Log in</a></li>
                </ul>
            </nav>
        </div>
    </header>

    
    <div class="heroimage" >

        <div class="wrapper">
                
        <div class="slideshow-container" style=" align-self: center;">
                   <div class="mySlides fade">
            <img src="images\scroll0.jpg" style="width:100%; height:500pt ;">
            <div class="text"><h2><strong>A Recipe is a story,</strong><br/>
                that ends <br>with a good meal</h2> <br><a href="LoginSignup.php" target="_self" class="button-1">Get Started</a>
            </div>
            </div>
        
            <div class="mySlides fade">
            <img src="images\scroll1.jpg" style="width:100%; height: 500pt;">
            <div class="text"><h2><strong>A Recipe is a story,</strong><br/>
                that ends <br>with a good meal</h2> <br><a href="LoginSignup.php" target="_self" class="button-1">Get Started</a></div>
            </div>
        
            <div class="mySlides fade">
            <img src="images\scroll2.jpg" style="width:100%; height: 500pt;">
            <div class="text" ><h2><strong>A Recipe is a story,</strong><br/>
                that ends <br>with a good meal</h2><br><a href="LoginSignup.php" target="_self" class="button-1">Get Started</a></div>
            </div>
        
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        </div>

    </div>

        </div>


    <div class="ThreeImages">

        <figure id="image1">
            <a href="Explore.php?page=Explore" >
            <img src="images/cutlery (2).png" alt="image1" >
            <figcaption>Explore</figcaption>
            </a>
        </figure>

        <figure id="image2">
            <a href="Newrecipe.php">
                <img src="images/write.png" alt="image2" >
                <figcaption id="fig">Create Your Own</figcaption>
            </a>
        </figure>

        <figure id="image3">
           <a href="Search.php">
            <img src="images/search.png" alt="image3" >
            <figcaption>Search by Ingredient</figcaption>
           </a>
        </figure>

    </div>

    
    <div id="primary-content">
        <div class="wrapper">
            <article>
                <h3> Recipe of the Day</h3>
                <h5>cremige One Pot Pasta</h5>
                <p>A quick after-work meal - creamy one-pot pasta with sausage balls and a creamy tomato sauce. Perfect soul food <br>
                    This one pot pasta with bratwurst balls is not only incredibly delicious but also wonderfully creamy and spicy.<br>
                     The list of ingredients is absolutely manageable and the same applies to the preparation. </p>
                <a href="recipephp.php" id="CREMIGE ONE POT PASTA" onclick="rechead(this.id)"><img src="images/One Pot Pasta.png" alt="video placeholder" /></a>
            </article>
        </div>
    </div>
    
    <div id="secondary-content">
        <div class="wrapper">
            <article style="background-image: url('images/Muffins.jpg'); background-repeat: no-repeat;background-size: cover;">
                <div class="overlay">
                    <h4>Whole Wheat Blueberry Muffins</h4>
                    <p><small> Simple, maple-sweetened blueberry muffins that are jam-packed full of fresh berries.the last blueberry muffin recipe you will ever need.</small></p>
                    <a href="recipephp.php"target="_blank" class="more-link" onclick="rechead(this.id)" id="BLUEBERRY MUFFINS">View more</a>
                </div>
            </article>
            <article style="background-image: url('images/pancakes2.webp'); background-repeat: no-repeat; background-size: cover;">
                <div class="overlay">
                    <h4>PANCAKES</h4>
                    <p><small>This pancake recipe produces thick, fluffy, and all-around delicious pancakes with just a few ingredients that are probably already in your kitchen. </small></p>
                    <a href="recipephp.php"target="_blank" class="more-link" onclick="rechead(this.id)" id="Pancakes">View more</a>
                </div>
            </article><div class="clear"></div>
        </div>
    </div>


<div>


    
    <div id="cta">
        <div class="wrapper">
            <h3 id="herdenough">Heard Enough?</h3>
            <hr color="852B2A">
        </div>
    </div>
  
    <footer>
        <div class="wrapper">
            <div id="footer-info">
                <p>Copyright 2014 CompanyName. All rights reserved.</p>
                <p><a href="#">Terms of Service</a> I <a href="#">Privacy</a></p>
            </div>
            <div id="footer-links">
                <ul>
                    <li><h5>Company</h5></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="aboutus.html #meetus ">Meet The Team</a></li>
                    <li><a href="https://www.instagram.com/" target="_blank">Contact Us</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
    
<script>
    function rechead(x){
        document.cookie = "recipename = "+x;
    }
</script>
    
 <script>

    let slideIndex = 0;
    showSlides();

    function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
    }

 </script>   
</body>
</html>