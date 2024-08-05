<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="mysearchres.css">
    <link rel="icon" href="images/loggoicononly.jpeg" type="images/loggoicononly.jpeg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bakbak One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Urbanist">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Itim">
    

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />



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
<a class="nav-link" href="Explore.php?page=Explore" style="color: #852B2A;">Explore</a>
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
  <h1 >Search Results </h1> 

</div>

<?php

require_once("databaseHandler.inc.php");
if (isset($_POST["searchsubmit"])) {
    $str = $_POST["searchbox"]; 
    if ($str) 
    {
     
      $query = "SELECT RecipeName,CookTime,PrepTime,Nservings,img1 from recipes where RecipeName LIKE '%$str%'";
      $res = mysqli_query($conn, $query);
      $count = mysqli_num_rows($res);  


$sqltagid = "SELECT TagID from tags where TagName LIKE '%$str%' "; //will return only one tag 
$tagidque = mysqli_query($conn, $sqltagid);
$mycount = mysqli_num_rows($tagidque);
$tagidres = mysqli_fetch_assoc($tagidque);


 if (mysqli_num_rows($res) > 0)
         {
          ?>
        <?php
         ?> 
          
           foreach ($res as $r)
           {
            ?>
            <div class="container">
            <a style="margin-left:20%"  href="recipephp.php" onclick="rechead(this.id)"  id='<?php echo ($r["RecipeName"]);?>'> > <img style="object-fit:cover;" src="<?php echo $r['img1'];?>"  title="Go to Recipe details"> </a> 
            <table style="margin-top:10%; margin-left:5%;">
           <tr>
                    <th style=" color:black; font-family: 'Urbanist'; font-size: larger;" > <span class="material-symbols-outlined">
                      menu_book</span> &nbsp; <?php echo "Recipe name:"; ?> </th>
                    <td style="color: #852B2A; font-family: 'Itim'; font-size: 25px;"> <?php echo $r['RecipeName']; ?> </td> 
           </tr>
               <tr>
                    <th style="color:black; font-family: 'Urbanist'; font-size: larger;">   <i class="material-icons">access_time</i> &nbsp;  <?php echo "Cook Time:"; ?>  </th>
                    <td style="color: #852B2A; font-family: 'Itim'; font-size: 20px;">  <?php echo $r['CookTime']; ?>  </td> 
               </tr>
                 <tr>
                    <th style="color:black; font-family: 'Urbanist'; font-size: larger;"><i class="material-icons">access_time</i> &nbsp;  <?php echo "Prep Time:"; ?> </th>
                    <td style="color: #852B2A; font-family: 'Itim'; font-size: 20px;">  <?php echo $r['PrepTime']; ?> </td> 
               </tr>
               <tr>
                    <th style="color:black; font-family: 'Urbanist'; font-size: larger; "> <i class="material-icons">person</i> &nbsp;  <?php echo "No of servings:"; ?> </th>
                    <td style="color: #852B2A; font-family: 'Itim'; font-size: 20px;"> &nbsp;  <?php echo $r['Nservings']; ?> </td> 
           </tr>
           </table>
           </div>
           <br>
             <?php
           }
            
        } else if (mysqli_num_rows($tagidque) > 0) {
      ?>
    <?php

        $mytagid = $tagidres['TagID']; //we got tag id for tag name in search box 
  

        //HAS TO BE IN FOR LOOP 
        $sqlrecipeid = "SELECT RecipeID from Describes where TagID = '$mytagid' ";
        $recipeidque = mysqli_query($conn, $sqlrecipeid);
        $count1 = mysqli_num_rows($recipeidque); //we loop throught this
  
        ?> 
     <?php
       if (mysqli_num_rows($recipeidque) > 0) {

         while (($recipeidres = mysqli_fetch_assoc($recipeidque))) {
           $myrecipeid = $recipeidres['RecipeID']; //my recipe id
           $sqlfinal = "SELECT RecipeName,CookTime,PrepTime,Nservings,img1 from recipes where RecipeID = '$myrecipeid' ";
           $res2 = mysqli_query($conn, $sqlfinal);
           $mycount = mysqli_num_rows($res2);
           foreach ($res2 as $r2) {
             ?>
        <div class="container">
        <a style="margin-left:20%" href="recipephp.php" id=" <?php echo $r2['RecipeName']; ?>" onclick="rechead(this.id)"  > <img style="object-fit:cover;" src="<?php echo $r2['img1']; ?>"> </a> 
        <table style="margin-top:10%; margin-left:5%;">
       <tr>
                <th style=" color:black; font-family: 'Urbanist'; font-size: larger;" > <span class="material-symbols-outlined">menu_book</span> &nbsp; <?php echo "Recipe name:"; ?> </th>
                <td style="color: #852B2A; font-family: 'Itim'; font-size: 25px;"> <?php echo $r2['RecipeName']; ?> </td> 
       </tr>
           <tr>
                <th style="color:black; font-family: 'Urbanist'; font-size: larger;">   <i class="material-icons">access_time</i> &nbsp;  <?php echo "Cook Time:"; ?>  </th>
                <td style="color: #852B2A; font-family: 'Itim'; font-size: 20px;">  <?php echo $r2['CookTime']; ?>  </td> 
           </tr>
             <tr>
                <th style="color:black; font-family: 'Urbanist'; font-size: larger;"><i class="material-icons">access_time</i> &nbsp;  <?php echo "Prep Time:"; ?> </th>
                <td style="color: #852B2A; font-family: 'Itim'; font-size: 20px;">  <?php echo $r2['PrepTime']; ?> </td> 
           </tr>
           <tr>
                <th style="color:black; font-family: 'Urbanist'; font-size: larger; "> <i class="material-icons">person</i> &nbsp;  <?php echo "No of servings:"; ?> </th>
                <td style="color: #852B2A; font-family: 'Itim'; font-size: 20px;"> &nbsp;  <?php echo $r2['Nservings']; ?> </td> 
       </tr>
       </table>
       </div>
       <br>
         <?php
           }

         }
       }
    }
        

        else 
        {
            echo '<script type="text/javascript"> alert("Recipe does not exist"); window.location.href="Search.php"</script>';
        }
    }
    else
    {
        echo '<script type="text/javascript"> alert("Please fill the field"); window.location.href="Search.php"</script>';
    } 
   
}
?>
<script>
    function rechead(x){
        document.cookie = "recipename = "+x;
    }
    
</script>
</body>
</html>




             
