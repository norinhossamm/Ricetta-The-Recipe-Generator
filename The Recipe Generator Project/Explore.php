<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="ThisExplore.css">
    <link rel="icon" href="images/loggoicononly.jpeg" type="images/loggoicononly.jpeg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-top: 0%;">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01" >
  
<a href="HomePage.php" id="logotxt" style="float: left; margin-right: 14%; margin-bottom: 0%; padding-bottom: 0%; padding-right: 1%;"><h1 style="color: #852B2A; ">Ricetta<span >.</span></h1> </a>
     
<nav class="navbar navbar-light bg-light" style="width:62%; margin-bottom: 0%; padding-top: calc(100vw/70); padding-left: 53px;" id="searchnav">
  <form class="form-inline" style="width: 69%; height: 5%;" id="searchform" method="POST" action="Searchres.php">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style= "width: 83%; height: 50px; padding: 2.5%;" id="searchbox" name="searchbox">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name= "searchsubmit" id="searchbarBTN">Search</button>
  </form>
</nav>

<ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="color: #852B2A; margin-left: 5% ;margin-right: 10%; padding-right: 2%; position: absolute; top:calc(100vw/42);" >
<li class="nav-item active" >
<a class="nav-link" href="HomePage.php" style="color: #852B2A;">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="Search.php" style="color: #852B2A;" id="SearchExplore">Search</a>
</li>
<li class="nav-item">
<a class="nav-link" href="aboutus.html" style="color: #852B2A;">About us</a>
</li>
<li class="nav-item">
<a class="nav-link" href="UserProfile.php" style="color: #852B2A;">Profile</a>
</li>
</ul> 

</div>
</nav>

<div class="Title">
<h1 id="titlecontent" style="text-decoration: underline; margin: auto;"></h1> 
</div>

<div id="SearchInfo" style="color: #063146; margin: auto; width: fit-content; text-align: center; 
margin-top: 2%; font-size: 11pt; font-weight: 600;"></div>

<table id="table">
    
<?php
if (isset($_GET["page"])) {
    if ($_GET["page"] == "Explore") {

        echo ("<script>
        var errormsg = document.getElementById('titlecontent');  
        errormsg.innerHTML = 'Explore our recipes';         
        </script>");
        require_once('databaseHandler.inc.php');

        $query = "SELECT * FROM recipes;";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $ctr = $count;
            for ($i = 0; $i < ($count / 3); $i++) {
                ?>

    <tr class='tablerow'>
    <?php for ($j = 0; $j < 3; $j++) {
            if ($ctr > 0) {
                $row = mysqli_fetch_assoc($result); ?>

        <td>
            <div class="imgBlock">
                <a target="_self" href="recipephp.php" onclick="rechead(this.id)"  id='<?php echo ($row["RecipeName"]);?>'> <img src="<?php echo ($row["img1"]); ?>" alt="Image" title="Go to Recipe details"></a>
            </div>
            <figcaption style='text-align: center;  margin-top: 2%; margin-bottom: 1%; font-weight:700;'> <?php echo ($row["RecipeName"]); ?> </figcaption> 
            
            <figcaption style='text-align: center; margin-bottom:0%;'>Cook time: <?php echo ($row["CookTime"]); ?> </figcaption> 
            <figcaption style='text-align: center; margin-bottom: 5%;'>Prep time: <?php echo ($row["PrepTime"]); ?> </figcaption>
        </td>

<?php 
$ctr--;
}}}}} 
//--------------------------------------------------------------------------------------------------------------------------------------------//    
    elseif ($_GET["page"] == "Search") {
        echo ("<script>
        var errormsg = document.getElementById('titlecontent');  
        errormsg.innerHTML = 'Search Result';   
        </script>");

        // session_start();
        $Searchresult = $_SESSION['Searchresult'];
        $IngredientNames = $_SESSION["IngredientNames"];

        
        $ingnames = '';
        $flag2 = true;
        foreach ($IngredientNames as $Ingredient)
        {
            if ($flag2 == true)
            {
                $ingnames .= ' '.$Ingredient["IngredientName"];
                $flag2 = false;
            }
            else
                $ingnames .= ' - '.$Ingredient["IngredientName"];

        }
        ?>

        <script>
        var title = document.getElementById('Title');  
        title.style = 'margin-bottom: 0%; ' ;  
        </script>
        <script>
        var SearchExplore = document.getElementById('SearchExplore');  
        SearchExplore.innerHTML = 'Explore';  
        </script>
        <script>
        var SearchExplore = document.getElementById('SearchExplore');  
        SearchExplore.href = 'Explore.php?page=Explore';  
        </script>

        <?php
        if (!$Searchresult) {
            $names = "Sorry! No recipes were found with this/these ingredient(s).";
        }
        else{$names = 'Recipes that include 1 or more ingredient(s) from the following: ';}
        ?>
        <script>
        var info = document.getElementById('SearchInfo');  
        info.innerHTML = "<?php echo($names.'<br> ('.$ingnames.' )')?> ";  
        info.style.marginBottom = '2%';    
        </script>

        <?php
        foreach ($Searchresult as $row)
        {
        ?>
    
        <tr class='tablerow'>
        <td>
            <div class="imgBlock">
                <a target="_blank" href="recipephp.php" onclick="rechead(this.id)" id="<?php echo ($row["RecipeName"]); ?>"> <img src="<?php echo ($row["img1"]); ?>" alt="Image" title="Go to Recipe details"></a>
            </div>
            <figcaption style='text-align: center;  margin-top: 2%; margin-bottom: 1%; font-weight:700;'> <?php echo ($row["RecipeName"]); ?> </figcaption> 
            <figcaption style='text-align: center; margin-bottom:0%;'>Cook time: <?php echo ($row["CookTime"]); ?> </figcaption> 
            <figcaption style='text-align: center; margin-bottom: 5%; padding-left: 2px;'>Prep time: <?php echo ($row["PrepTime"]); ?> </figcaption> 
        </td>  
        </tr> 
   
   <?php }
    }
    }?>
   
</table>


<footer style="border-top: 2px dashed #D88D56; margin-top: 5%;">
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


</body>

</html>
