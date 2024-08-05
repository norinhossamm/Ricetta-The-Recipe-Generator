<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost:3308", "root", '', "ricettadatabase");

session_start();
$username =$_SESSION["username"];

$query = "SELECT UserID INTO @u FROM users WHERE users.UserName='$username';";
$query .= "SELECT recipes.RecipeName,users.UserName,recipes.img1
FROM likedrecipes, recipes,users
WHERE  likedrecipes.RecipeID= recipes.RecipeID and likedrecipes.UserID=@u AND users.UserID=likedrecipes.UserID;";
$namesarray = [];

$images = [];
/* execute multi query */
mysqli_multi_query($link, $query);
$count = null;
do {
    /* store the result set in PHP */
    if ($result = mysqli_store_result($link)) {
        $count = mysqli_num_rows($result);
        while ($row = mysqli_fetch_all($result)) {
            foreach ($row as $i => $value) {
                // print_r($row[$i]);
                array_push($namesarray, $row[$i][0]);
                array_push($images, $row[$i][2]);

                // $namesarray .= $row[$i][0];
            }
        }
    }

} while (mysqli_next_result($link));
// print_r($images);
// echo ($count);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/loggo icon only.jpeg" type="images/loggo icon only.jpeg">
    <link rel="stylesheet" href="ThisExplore2.css">

<!-- <link rel="stylesheet" type="text/css" href="userfavCSS.css"> -->
<link rel="icon" href="images/loggo icon only.jpeg" type="images/loggo icon only.jpeg">
    <title>Favourites</title>
</head>
<body>
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
                    <li><a href="LoginSignup.php" target="_blank">Sign in </a></li>
                </ul>
            </nav>
        </div>
    </header>


     <br><br>
    <div><h3 style="text-decoration: double ; color: #F0BA5A;"> Liked Recipes</h3></div>
    <br>
    <br>





<table id="table">
    
<?php
        $c=0;


if ($count > 0) {
    $ctr = $count;
    for ($i = 0; $i < ($count / 3); $i++) {
        ?>

    <tr class='tablerow'>
    <?php

     for ($j = 0; $j < 3; $j++) {
               
    
                    if ($ctr > 0) {
                        $row = mysqli_fetch_assoc($result); 
                        ?>

        <td>
            <div class="imgBlock">
                <a href="recipephp.php" target="_blank"  onclick="rechead(this.id)"  id='<?php echo ($namesarray[$c]);?>'> <img  src="<?php echo ($images[$c]); ?>" alt="Image" title="Go to Recipe details"></a>
            </div>
            <figcaption style='text-align: center;  margin-top: 2%; margin-bottom: 1%; font-weight:700;'> <?php echo ($namesarray[$c]); ?> </figcaption> 

        </td>

<?php $ctr--;
                                $c++;
                    }
                
            }
    }
}?>
   
</table>





              <a href="Explore.php?page=Explore" class="button-1">Explore more...</a>

 <hr>
    <footer>
        <div class="wrapper">
            <div id="footer-info">
                <p>Copyright 2014 CompanyName. All rights reserved.</p>
                <p><a href="#">Terms of Service</a> I <a href="#">Privacy</a></p>
            </div>
            <div id="footer-links">
                <ul>
                    <li><h5>Company</h5></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Meet The Team</a></li>
                    <li><a href="#">What We Do</a></li>
                    <li><a href="#">Careers</a></li>
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


