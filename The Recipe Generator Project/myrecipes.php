<?php
session_start();
$username = $_SESSION['username'];
// print_r ($_SESSION);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost:3308", "root", '', "ricettadatabase");

$q = "SELECT `UserID` from users where UserName = '$username'";
$r = mysqli_query($link, $q);
$useridX = mysqli_fetch_assoc($r);
$userid = $useridX['UserID'];


$query = "SELECT `RecipeName`, `UserID`,`img1` FROM `recipes` WHERE `UserID`=$userid";
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
// print_r($namesarray);
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

<link rel="icon" href="images/loggo icon only.jpeg" type="images/loggo icon only.jpeg">
    <title>my recipes</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <h1 style="color: #852B2A;">Ricetta<span >.</span></h1>

            <nav>
                <ul>
                    <li><a href="Explore.php?page=Explore" target="_blank">Explore</a></li>
                    <li><a href="Search.php" target="_blank">Search</a></li>
                    <li><a href="aboutus.html" target="_blank">About us</a></li>
                    <li><a href="UserProfile.php" target="_blank">Profile </a></li>
                </ul>
            </nav>
        </div>
    </header>


     <br><br>
    <div><h3 style="text-decoration: double;text-align: left; margin-left: 8%; color: #F0BA5A;"> My Recipes</h3></div>
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
                        $row = mysqli_fetch_assoc($result); ?>

        <td>
            <div class="imgBlock">
                <a href="recipephp.php" target="_blank"> <img  src="<?php echo ($images[$c]); ?>" alt="Image" title="Go to Recipe details"></a>
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





              <a href="#" class="button-1">Explore more...</a>

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

    
</body>
</html>