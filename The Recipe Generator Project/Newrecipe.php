
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Recipe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
  <link rel="stylesheet" href="newrecpstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="images/LOGO.png" type="images/loggo icon only.jpeg">
 
</head>
<body>

<div class="container-fluid">
  
    <!-- side bar -->
    <div class="row content">
    <div class="col-sm-3 sidenav">
        <img src="images/SideBarLogoName.png" alt="Ricetta" id="LOGO">
        <div class="ImgContainer"></div>


        <?php
      session_start();
      $username = $_SESSION['username'];
      ?>

        <h2 id="usernameH2"><?php echo ($username); ?></h2>
      
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Add Recipe</a></li>
        <li><a href="HomePage.php" >Home</a></li>
        <li><a href="Explore.php?page=Explore">Explore</a></li>
        <li><a href="UserProfile.php">My Profile</a></li>
      </ul><br>
    
    </div>


    <div class="col-sm-9">        
      <h3>Add New Recipe</h3><hr>
      <?php

              $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=RecipeAdded") == true) 
              {
                echo "<p class='success'> You have successfully added a new recipe! </p>";  
              }
              
              
              ?>
      
      <form action="ForMyNewRecipe.php" method="POST"> 
        <div class="DetailsContainer"> 
            
          <div class="inputblock" >
              <label for="Recipename"><strong>Recipe Name: </strong></label><br>
             
          
           <input type="text" placeholder="Enter your recipe name" name="Recipename" id="Recipename"><br> 

            <?php

               $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please enter recipe name </p>";  //my error msg
              }
               else if (strpos($fullurl, "Field=IncorrectFormatName") == true)  //regex did not match
              {
                echo "<p class='error'> Please enter recipe name in correct format. </p>";

              } 
              else if (strpos($fullurl, "Field=RecipeExists") == true)  //regex did not match
              {
                echo "<p class='error'> This recipe already exists. </p>";

              } 
              
              
              ?> 
              <p id="errormsg" name="errormsg1" style="color:red;"></p>
              <p id="errorexp" name= "errormsg1" style="color:red;"></p>
          </div>
  
          <div class="inputblock" >
              <label for="RecipeImg" id="imguploadlbl"><strong>Upload Recipe Image</strong></label><br>
               <input type="file"  name="fileToUpload1" id="fileToUpload" accept="image/*"> 
              <input type="file"  name="fileToUpload2" id="fileToUpload1" accept="image/*">
              <input type="file"  name="fileToUpload3" id="fileToUpload2" accept="image/*">
              <?php
            $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please insert all images. </p>";  //my error msg
              }
              
              
              ?>
    

              <p id="errormsg2" style="color:red;"></p> 
          </div>
  
  
          <div class="inputblock">
              <label for="description"><strong>Recipe Description: </strong></label><br>
              <textarea name="description" id="description" placeholder="Briefly describe your recipe."></textarea>
              <?php
            $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please enter your recipe's description. </p>";  //my error msg
              }
              
              
              ?>

              <p id="errormsg1" style="color:red;"></p>
          </div>

          <div class="inputblock">
            <label for="ingredients"><strong>Ingredients needed: </strong></label><br>
            <textarea name="ingredients" id="ingredients" placeholder="Ex. 1 Cup of Milk,40 g of Tomato,20 g of Onion,10 Tablespoon of salt" ></textarea>
            <?php
           $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please enter recipe's ingredients. </p>";  //my error msg
              } 
          
              ?> 
            <p id="errormsg3" style="color:red; "></p>
        </div>
  

        <label for="">Recipe Types:</label>
            <?php
        $connect = mysqli_connect("localhost:3308", "root", "", "ricettadatabase") or die("Connection Failed");
        $queryy = "SELECT * FROM recipetype"; 
        $recptyperesult = mysqli_query($connect, $queryy);
        foreach ($recptyperesult as $res1)
         {
            ?>
        <div class="form-check">
        <input class="form-check-input" type="radio" value="<?php echo $res1['TypeName'] ?>" id="<?php echo $res1['TypeName'] ?>" name="Types[]">
        <label class="form-check-label" for="<?php echo $res1['TypeName'] ?>"><?php echo $res1['TypeName']?> </label>
        </div>
      <?php } ?>     <!-- works with database  -->
              


<br>
             
       </div>

          <div class="inputblock">
              <label for="steps"><strong>Cooking Steps: </strong></label><br>
              <textarea name="steps" id="steps" placeholder="Step by step to how to make this recipe"  ></textarea>
              <?php
            $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please enter your recipe's steps. </p>";  //my error msg
              }
              
             
              ?>
              <p id="errormsg4" style="color:red;"></p>
          </div>
  
  
          <div class="time">
              <div class="inputblock " id="preptimeblock">
                  <label for="PrepTime"><strong>Preparation Time: </strong></label><br>
                  <input type="text" name="PrepTime" id="PrepTime" placeholder="Ex. Hours:Mins:Secs">
                  <?php
           $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
             if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please enter your recipe's preparation time. </p>";  //my error msg
              }
              else if (strpos($fullurl, "Field=IncorrectFormatPrep") == true)  //regex did not match
              {
                echo "<p class='error'> Please enter in correct format. </p>";

              }
           
              
              ?>
                  <p id="errormsg5" style="color:red;"></p> 
                  <p id="errorexp1" style="color:red;"></p>
              </div>
      
              <div class="inputblock" id="cooktimeblock">
                  <label for="CookTime"><strong>Cooking Time: </strong></label><br>
                  <input type="text" name="CookTime" id="CookTime" placeholder="Ex. Hours:Mins:Secs">

                  <?php
             $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please enter your recipe's cook time. </p>";  //my error msg
              }
              else if (strpos($fullurl, "Field=IncorrectFormatCook") == true)  //regex did not match
              {
                echo "<p class='error'> Please enter in correct format. </p>";

              }
              
              ?>
                  <p id="errormsg6" style="color:red;"></p>
                  <p id="errorexp2" style="color:red;"></p>
                

              </div>
  
              <div class="inputblock" id="servingsblock">
                  <label for="servings"><strong>No. of Servings: </strong></label><br>
                  <input type="number" name="servings" id="servings" min="2">

                  <?php
              $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strpos($fullurl, "Field=empty") == true) //if we have this string inside URL , means display error msg for empty!
              {
                echo "<p class='error'> Please select number of servings. </p>";  //my error msg
              }
              
            
              ?>
                  <p id="errormsg7" style="color:red;"></p>
          
              </div>
  
           

          </div>

          <p>
            <button class="btn btn-primary" style="  background-color: #D88D56; color: white; font-size: 12pt; font-weight: 500; border-radius: 0.5em; border: 2px solid #103e5b; cursor: pointer; margin-top: 2%;
            padding: 12px 20px;" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Anything special about this recipe?
            </button>
          
         <button type="submit" name="submit" class="submitbtn" onclick="getcheckboxesvalue()" >Submit?</button> 

          </p>

          <div class="collapse" id="collapseExample">
            <div class="card card-body">
            <?php
        $connect = mysqli_connect("localhost:3308", "root", "", "ricettadatabase") or die("Connection Failed");
        $query2 = "SELECT * FROM tags"; 
        $tagresult = mysqli_query($connect, $query2);
        foreach ($tagresult as $res) {
            ?>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="<?php echo $res['TagName'] ?>" id="<?php echo $res['TagName'] ?>" name="Special[]">
        <label class="form-check-label" for="<?php echo $res['TagName'] ?>"><?php echo $res['TagName'] ?></label>
        </div>
      <?php } ?> 
              </div>

            </div>
          </div>

      </form>



    </div>

</div>

<script>
