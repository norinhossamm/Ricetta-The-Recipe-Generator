<?php
session_start();

$user= $_SESSION["username"];
$recname = $_COOKIE['recipename'];

require_once 'databaseHandler.inc.php';
$sql = "SELECT * FROM recipes  WHERE RecipeName= '$recname' ";
//make query and get results
$result = mysqli_query($conn, $sql);
// fetch rsulting rows as array
$ings = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqlrecipe = "SELECT RecipeID FROM recipes WHERE recipes.RecipeName='$recname'";
$result2 = mysqli_query($conn, $sqlrecipe);
$row2 = mysqli_fetch_assoc($result2);

$idrecp = $row2["RecipeID"];
$sqlcontain =  "SELECT ingredients.IngredientName, contain.Quantity,contain.Unit
                FROM ingredients,contain
                where (ingredients.IngredientID= contain.IngredientID ) 
                and contain.RecipeID= $idrecp";//change based on the id in cookie or session idk yet 
$resultcontain = mysqli_query($conn, $sqlcontain);
$rescont = mysqli_fetch_all($resultcontain, MYSQLI_ASSOC);

$sqlsteps=  "SELECT `Steps`FROM `recipes` WHERE RecipeID= $idrecp";
$resultsteps = mysqli_query($conn, $sqlsteps);
$steps = mysqli_fetch_all($resultsteps, MYSQLI_ASSOC);



$sqluser= "SELECT UserID FROM users WHERE users.UserName='$user'";
$result1 = mysqli_query($conn, $sqluser);
$row1 = mysqli_fetch_assoc($result1);

$iduser = $row1["UserID"];
$_SESSION["userid"] = $iduser;
$_SESSION["recipeid"] = $idrecp;

$bigsql = "SELECT likeID, RecipeID, UserID FROM likedrecipes where userid=$iduser and RecipeID= $idrecp";
$bigresult = mysqli_query($conn, $bigsql);
$bigrow = mysqli_fetch_assoc($bigresult);
$color = "#FEEAAB";
$count = mysqli_num_rows($bigresult);
if ($count>0){

$color = "#852B2A";
    $_SESSION["color"] = "true";
}
else{
    $_SESSION["color"] = "false";

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="recipecss.css">
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
    <link rel="icon" href="images/loggo icon only.jpeg" type="images/loggo icon only.jpeg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>Recipe</title>
</head>
<body style="background-color: #faf9f6;">
    <header style="background-color: #f8f9fa;">
    <div class="wrapper">
            <a href="HomePage.php"><h1 style="color: #852B2A; float: left; margin-right: 5%; 
            margin-bottom: 0%; padding-bottom: 0%; padding-right: 1%; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; 
            font-weight: 500; ">Ricetta<span >.</span></h1>

            <nav>
                <ul style="color: #852B2A; float: left; margin-bottom: 0%; padding-bottom: 0%; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; font-weight: 400; ">
                    <li><a href="Explore.php?page=Explore" target="_blank">Explore</a></li>
                    <li><a href="Search.php" target="_blank">Search</a></li>
                    <li><a href="aboutus.html" target="_blank">About us</a></li>
                    <li><a href="UserProfile.php" target="_blank">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>

<!-- --------------------------------------------------------------------------------->
    <div id="recipe-name">
        <div class="wrapper">
            <article style="margin-top: 3%;">
                <form action="likephp.php">
                    <label> 
                        <input name="submit" type="submit" style="z-index: 0; position: absolute; padding: 19px 10px; background-color: #faf9f6;border: none;color:  #faf9f6; margin-bottom: 5px;"> 
                        <svg  name="heartsub" id="likeheart" style="position: absolute;" onchange="this.form.submit()" xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="<?php echo ($color);?>" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>     
                    </label>
                </form>
                   
                <h4 style="margin: auto; font-family: 'pacfico', serif; font-weight: bold; padding-bottom: 4%;"> <?php echo($recname) ?> </h4>
                <br>


                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $ings[0]["img1"]; ?>" alt="First slide" style="height: 600px; width: 700px;object-fit: cover;">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $ings[0]["img2"]; ?>"alt="Second slide" style="height: 600px; width: 700px; object-fit: cover;">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $ings[0]["img3"]; ?>"alt="Third slide" style="height: 600px; width: 700px; object-fit: cover;">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

                <br>
                <p style="font-size: 24px; text-align: justify; margin: 40px;"><?php echo $ings[0]["Description"]; ?> </p>
                     <hr>
                           
            </article>
            <!-- <br><br> -->
            <div class="TwoImages">

                <figure id="image1">
                    <a href="#rec">
                        <img src="images/Recipe icon.png" alt="image1" >
                    </a>
                </figure>
        
                <figure id="image2">
                    <a href="#ing">
                        <img src="images/ingredients.png" alt="image2" >
                    </a>
                </figure>
                </figure>
        </div>
    </div>
    


    <div id="ings">
        <div class="wrapper">
            <article>
                <div class="Rdeatails">
                        <div class="overlay">
                            <pre style="font-family:'Times New Roman', Times, serif ; font: size 20px; ;">
                        Preparation Time: <?php echo $ings[0]["PrepTime"]; ?>
                        Cooking Time:<?php echo $ings[0]["CookTime"]; ?>   
                        Number of Servings: <?php echo $ings[0]["NServings"]; ?>  
                            </pre>
                        
                    </div>
                </div>
            
                
                <h4 id="ing" style="text-align: left; color: #852B2A; text-transform: capitalize; font-weight: bold;"> What You Will need:</h4>
                <ul id="inglist">

                    <?php
                    for ($i=0; $i < sizeof($rescont); $i++) {
                        echo("•" ."\t". $rescont[$i]["Quantity"]);
                        echo ( "\t" . $rescont[$i]["Unit"]);
                        echo ( "\t" . $rescont[$i]["IngredientName"]);
                        echo nl2br("\n");
                        
                    }         

                    ?>
                   
                </ul>

                <h4 id="rec" style="text-align: left; color: #852B2A; padding-top: 50px; font-weight: bold;"> Method:</h4>
                <ol class="method"  style="padding-bottom: 10%; margin-top: 0%;">
                    <p id="steps" style="line-height:140%; font-size: 16pt; color:#27445C;">
                    <?php
                    $separetedsteps =explode("^", $steps[0]["Steps"]);
                    // print_r($separetedsteps);
                    for ($i=0; $i < sizeof($separetedsteps); $i++){
                         echo nl2br ($separetedsteps[$i]."<br>" );

                      }
                    ?>


                    </p>
                        
                   
                </ol>
                           
            </article>
    </div>



    <hr color="852B2A">
    <footer>
    <div class="wrapper">
        <div id="footer-info">
            <p>Copyright 2014 Ricetta. All rights reserved.</p>
            <p><a href="#">Terms of Service</a> I <a href="#">Privacy</a></p>
        </div>
        <div id="footer-links">
            <ul>
                <li><h5>Company</h5></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Meet The Team</a></li>
                <li><a href="#">What We Do</a></li>
                <li><a href="#">Careers</a></li>
                <li> <div id="socials">
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </div></li>
            </ul>
            
                        
        </div>
        <div class="clear"></div>
    </div>
   
</footer>


<script>
   function liked(){ const button = document.querySelector(".heart-like-button");
    button.addEventListener("click", () => {
    if (button.classList.contains("liked")) {
    button.classList.remove("liked");
    } 

    else 
    {
    button.classList.add("liked");
    // alert($_SESSION["like"]);

    }

    });
}


</script>
<script>
   function blaa()
   { let x=liked();
    // alert(x);
}
</script>
  <script>  
    document.addEventListener ("DOMContentLoaded", () => {   //once the dom content has loaded , this function is run
    const recentimagedataURL = localStorage.getItem(".heart-like-button");  //getting recent image 

    if (recentimagedataURL) //if we have recent previously image
    {
    document.querySelector("#output").setAttribute("src", recentimagedataURL); //so we return this previously saved image
    }


});

</script>

</body>

</html>
<?php
//free from memory 
mysqli_free_result($result);
//close conn
 mysqli_close($conn);


?>