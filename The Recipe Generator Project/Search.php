<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search</title>

<link rel="stylesheet" href="Search.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
<link rel="icon" href="images/loggoicononly.jpeg" type="images/loggoicononly.jpeg">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>

<script>
function validate()
{
    var checkboxs=document.getElementsByName("check_list[]");
    var flag =false;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            flag=true;
            break;
        }
    }
    document.cookie = "flag = "+flag;
}
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-top: 0%;">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01" >
  
<a href="HomePage.php" id="logotxt" style="float: left; margin-right: 6%; margin-bottom: 0%; padding-bottom: 0%; padding-right: 1%;"><h1 style="color: #852B2A; ">Ricetta<span >.</span></h1> </a>
       
<nav class="navbar navbar-light bg-light" style="width:62%; margin-bottom: 0%; padding-top: calc(100vw/70); padding-left: 53px;" id="searchnav">
  <form class="form-inline" style="width: 69%; height: 5%;" id="searchform" method="POST" action="Searchres.php">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style= "width: 83%; height: 50px; padding: 2.5%; font-size: 11pt;" id="searchbox" name="searchbox">
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
    <a class="nav-link" href="LoginSignup.php" style="color: #852B2A;">sign in</a>
</li>
</ul> 

</div>
</nav>


<div class="Title">
  <h1 >Search by ingredients</h1> 
</div>


<div class="FormContainer">

<div id="Errormsg" ></div>

<form action="PhpSearch.php" method="post">

        
<?php
require_once('databaseHandler.inc.php');
$query = "SELECT * FROM ingredienttype;"; 
$Typeresult = mysqli_query($conn, $query);
$Typecount = mysqli_num_rows($Typeresult);
if ($Typecount > 0) {
    foreach ($Typeresult as $r) {
        ?>
    <section class="<?php echo $r['IngTypeName'] ?>">
        <p>
            <button class="btn btn-primary" style="width: calc(70vw/3.5);  background-color: #063146; color: white; font-size: 12pt; font-weight: 500; border-radius: 0.5em; border: 1px solid white; cursor: pointer; margin-top: 2%;
            padding: 18px 20px;" type="button" data-toggle="collapse" data-target="#<?php echo $r['IngTypeName'] ?>" aria-expanded="false" aria-controls="<?php echo $r['IngTypeName'] ?>">
              <?php echo $r['IngTypeName'] ?>
            </button>
        </p> 

        <div class="collapse" id="<?php echo $r['IngTypeName'] ?>" >
            <div class="card card-body" >
                <div class="form-check">

            <?php
            $query2 = "SELECT * FROM ingredients WHERE IngredientTypeID = (SELECT IngredientTypeID from ingredienttype WHERE IngTypeName = '".$r['IngTypeName']." ');"; 
            $Ingredientresult = mysqli_query($conn, $query2);
            foreach ($Ingredientresult as $res) {
                ?>
            <div class="checkbox">
            <input class="form-check-input" type="checkbox" value="<?php echo $res['IngredientName'] ?>" id="<?php echo $res['IngredientName'] ?>" name="check_list[]">
            <label class="form-check-label" for="<?php echo $res['IngredientName'] ?>"><?php echo $res['IngredientName'] ?></label>
            </div>
        <?php } ?>
      </div>
      </div>
  </div>
</section> 
    <?php
    }
}
?>
    <button type="submit" name="submitbtn" id="submitbtn" onclick="validate()">Search </button>

</form>
</div>

<footer style="border-top: 2px dashed #D88D56;">
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

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "Notchecked") {
        echo ("<script>
        var errormsg = document.getElementById('Errormsg');  
        errormsg.innerHTML = 'Please select an ingredient';         
        </script>");

        echo ("<script>
        var errormsg = document.getElementById('Errormsg');  
        errormsg. style='background-color: white; opacity: 0.8; color: #063146; text-align: center; width: 30%; margin: auto; margin-bottom: 2%; padding: 1%; font-size: 12pt; border: 3px solid #b83e3c; border-radius: 7px';         
        </script>");
    }
}