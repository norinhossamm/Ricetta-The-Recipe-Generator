<!DOCTYPE html>
<html lang="en">
<head>
  <title>My profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="userprofile.css">

    <link rel="icon" href="C:\Users\norah\Desktop\ricon.PNG" >
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/LOGO.png" type="images/loggo icon only.jpeg">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla One|Asap Condensed|Pacifico|Damion|Cambay|Yrsa|Kaushan Script|Staatliches|M PLUS Rounded 1c|Crete Round">
   

</head>
<body>

  <input type="checkbox" id="check">
  <label for="check">
   <i class="fas fa-bars" id="btn"></i>
   <i class="fas fa-times" id="cancel"></i>
  </label>
    

    <div class="sidebar">
    <header> 
    <?php
      session_start();
      $username = $_SESSION['username'];
      ?>

      <i class="fas fa-user"> </i>  User: <?php echo ($username); ?>
      </header>
    <ul>

      <li> <a href="HomePage.php"> <i class="fas fa-home" > </i> &nbsp; Home </a></li>
      <li> <a href="Search.php"> <i class="fas fa-search"  >  </i> &nbsp;  Search </a></li>
      <li> <a href="userfavphp.php"> <i class="fa fa-heart" aria-hidden="true" ></i> &nbsp;   My Favourites  </a></li>
      <li> <a href="myrecipes.php"> <i class="fas fa-book-open"  > </i> &nbsp; My Recipes  </a></li>
      <li> <a href="Newrecipe.php"> <i class="fa fa-plus" aria-hidden="true"  > </i> &nbsp;   Add A Recipe  </a>   </li>
      <li onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="surpriseme"> <a href="#"> <i class='fas fa-lightbulb'></i> &nbsp; Surprise Me! </a></li>
      <li>  
<form action="phplogout.php" method="post">
<a href="LoginSignup.php" onclick="this.form.submit()"> <i class='fas fa-sign-out-alt'></i> &nbsp; Logout </a>
</form></li>
    </ul>
 </div>

    <div class="logo">
   <img src="images\LOGO.png" alt="Icon"> 
     
      <figcaption id="caption">Welcome back, <?php echo ($username); ?>!</figcaption>

    </div>
    

     <div class="profile-pic">
     <label name="imgupdate" class="-label" for="file">
      </label> 
     <img src="images/UserIcon.png" id="output" name="userpp" width="200" />   <!-- img from DB (default) in src  -->
    </div>
  
    

     <div class="container-fav">
      <div class="box" style="background-image: url('images/searchuserprofilepng.jpg');">
          <a href="Search.php"> <figcaption>Search By Ingredient
            </figcaption></a>
      </div>
      <div class="box" style="background-image: url('images/pinuserprofile.jpg');"> 
          <a href="Newrecipe.php"> <figcaption> Create Recipe
            </figcaption></a>
      </div>
      <div class="box" style="background-image: url('images/exploreuserprofile.jpg');"> 
          <a href="Explore.php?page=Explore"> <figcaption> Explore
            </figcaption></a>
      </div>
      <div class="box" style="background-image: url('images/heartuserprrofile.jpg');"> 
        <a href="userfavphp.php"> <figcaption> Favourites
          </figcaption></a>
    </div> 

    <div class="recommendedtext">
      <hr>
      <hr>
      <p> Our Recommendations this week </p>
      <hr>
      <hr>
     </div>
  
     <div class="container-fav">
      <div class="box" style="background-image: url('images/Chicken-Pasta-Salad-recipe.jpg');"> 
          <a href="recipephp.php" onclick="rechead(this.id)" id="Chicken Pasta Salad"> <figcaption>Chicken Pasta Salad
            </figcaption></a>
      </div>
      <div class="box" style="background-image: url('images/BFV11503_CheddarRanchPopcornChicken-ThumbTextless1080.jpg');"> 
          <a href="recipephp.php" onclick="rechead('Chicken Popcorn')"> <figcaption> Chicken Popcorn
            </figcaption></a>
      </div>
      <div class="box" style="background-image: url('images/Vegetable-Quesadilla-Recipe-1-1200.jpg');"> 
          <a href="recipephp.php" onclick="rechead('Vegetable Quesadilla')"> <figcaption> Vegetable Quesadilla
            </figcaption></a>
      </div>
      <div class="box" style="background-image: url('images/pancakesuserprofile.jpg');"> 
        <a href="recipephp.php" onclick="rechead(this.id)" id="Pancakes"> <figcaption> Pancakes
          </figcaption></a>
    </div> 


 

<!--Model Section-->
<div id="id01" class="modal">
  
  <form class="modal-content animate">
    
    <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close" id="closemodal">&times;</span> 
    <?php

    require_once("databaseHandler.inc.php");
$query = "SELECT img1 from recipes";   //select image of recipe to be randomized
$res = mysqli_query($conn, $query);
$count = mysqli_num_rows($res);
$rand = rand(1, $count) -1; //randomize selected number of rows 
$querand = "SELECT img1,RecipeName from recipes WHERE RecipeID > $rand LIMIT 1";
$res1 = mysqli_query($conn, $querand);
$count = mysqli_num_rows($res1);  
if ($count>0)
{
  foreach ($res1 as $r1)
  {
    ?>
    <a  target="_blank" href="recipephp.php" onclick="rechead(this.id)" id="<?php echo ($r1["RecipeName"]); ?>"> <img style="height:500px;width:500px;" src="<?php echo $r1['img1']?>" alt="">; </a>
    <p> <?php echo $r1['RecipeName']?></p>
  <?php
  } 
}
?>
    </div>
  </form>
</div>



<footer>
  <div class="wrapper">
      <div id="footer-info">
          <p style="margin-bottom: 5px;">Copyright 2014 CompanyName. <br><br> All Rights Reserved. <br><br></p>
          <p><a href="#">Terms of Service</a> I <a href="#">Privacy</a></p>
      </div>
      <div id="footer-links">
          <ul>
              <li><h5 style="font-size:11pt ;">Company</h5></li>
              <li><a href="aboutus.html">About Us</a></li>
              <li><a href="aboutus.html #meetus">Meet The Team</a></li>
              <li><a href="https://www.instagram.com/" target="_blank">Contact us</a></li>
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


</body>
</html>