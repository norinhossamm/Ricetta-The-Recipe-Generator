<?php
$connect = mysqli_connect("localhost:3308", "root", "", "ricettadatabase") or die("Connection Failed");


  session_start();
  $username = $_SESSION['username'];

if (isset($_POST['submit'])) {

    $imgpath = "images\\\\";

    //values in textbox 
    $recipename = $_POST['Recipename'];
    $imgfile1 = $imgpath . $_POST['fileToUpload1'];
    $imgfile2 = $imgpath . $_POST['fileToUpload2'];
    $imgfile3 = $imgpath . $_POST['fileToUpload3'];
    $recipedescrip = $_POST['description'];
    $ingneeded = $_POST['ingredients'];

    $steps = $_POST['steps'];
    $preptime = $_POST['PrepTime'];
    $cooktime = $_POST['CookTime'];
    $nofservings = $_POST['servings'];

    $anythspecial = $_POST['Special'];
    $x = $_POST['Types'];
    $recptypes = $x[0];


    if ($recipename && $imgfile1 && $imgfile2 && $imgfile3 && $recipedescrip && $ingneeded && $steps && $preptime && $cooktime && $nofservings && $recptypes) //if fields not empty
    {
        if (!preg_match("/^[a-zA-Z]+(\s+[a-zA-Z]+)+$/", $recipename)) //if regex not match
        {
            header("Location: Newrecipe.php?Field=IncorrectFormatName");
        } else if (!preg_match("/^[0-9]{1,3}\:[0-5][0-9]\:[0-9]{1,3}$/", $preptime)) 
        {
            header("Location: Newrecipe.php?Field=IncorrectFormatPrep");
        } else if (!preg_match("/^[0-9]{1,3}\:[0-5][0-9]\:[0-9]{1,3}$/", $cooktime)) 
        {
            header("Location: Newrecipe.php?Field=IncorrectFormatCook");
        } 
        else
         {

            $query = "SELECT RecipeName from recipes WHERE RecipeName = '$recipename' "; //to check if this recipe already exists
            $myres = mysqli_query($connect, $query);
            $count = mysqli_num_rows($myres);
            if ($count > 0) //if same recipe name returned from DB then this recipe already exists
            {
             header("Location: Newrecipe.php?Field=RecipeExists");

            } 
            else //insert into database 
            {

               
                //recipe 
                $sqltypeid = "select TypeID from recipetype where TypeName = '$recptypes' ";
              
                $typeidque = mysqli_query($connect, $sqltypeid);
            
                $typeidres = mysqli_fetch_assoc($typeidque);
                $mytypeid = $typeidres['TypeID'];
                
                

                $sqluserid = "SELECT UserID from users WHERE UserName = '$username' "; //come back and do username = username  variable in page
                $useridque = mysqli_query($connect, $sqluserid);
                
                $useridres = mysqli_fetch_assoc($useridque);
                $myuserid = $useridres['UserID'];

                $mysql = "INSERT INTO recipes(RecipeName,Description,CookTime,PrepTime,NServings,Steps,TypeID,UserID,img1,img2,img3)
                        VALUES  ('$recipename', '$recipedescrip', '$cooktime' ,'$preptime' ,'$nofservings', '$steps', ' $mytypeid', '$myuserid', '$imgfile1',
                        '$imgfile2', '$imgfile3')";
                mysqli_query($connect, $mysql);
                

                $updatesql = "UPDATE recipetype SET NoRecipes=NoRecipes+1 WHERE TypeName = '$recptypes' ";
                $updateres = mysqli_query($connect, $updatesql);
           


                //ingredients
                $ingneed1 = (explode(',', $ingneeded));
                $mycount = count($ingneed1);


                for ($i = 0; $i < $mycount; $i++) {
                    $ingneed2 = (explode(' ', $ingneed1[$i]));

                    $myquantity = $ingneed2[0];


                    $myunit = $ingneed2[1];


                    $myingredient = $ingneed2[3];
                    $ingredientsql = "SELECT IngredientID from ingredients WHERE IngredientName = '$ingneed2[3]';";
                    echo ($ingredientsql);
                    $ingredientque = mysqli_query($connect, $ingredientsql);
                    $ingredientidres = mysqli_fetch_assoc($ingredientque);
                    $myingid = $ingredientidres['IngredientID'];


                    $recipesql = "SELECT RecipeID from recipes WHERE RecipeName = '$recipename';";
                    $recipeque = mysqli_query($connect, $recipesql);
                    $recipeidres = mysqli_fetch_assoc($recipeque);
                    $myrecpid = $recipeidres['RecipeID'];


                    $sqltypeid = "INSERT INTO contain (RecipeID,IngredientID,Unit,Quantity) 
                                    VALUES($myrecpid,$myingid,' $ingneed2[1]', '$ingneed2[0]');";
                    mysqli_query($connect, $sqltypeid);
                     }



                    //tags                           
                    if (isset($anythspecial)) {
                        foreach ($anythspecial as $check)
                         {
                            //  echo $check;
                            $checked = $check; //each checked value
                            //  echo $checked;

                            $recipsql = "SELECT RecipeID from recipes WHERE RecipeName = '$recipename'";
                            $recipque = mysqli_query($connect, $recipsql);
                            $recipidres = mysqli_fetch_assoc($recipque);
                            $myrecpidd = $recipidres['RecipeID'];


                            $tagsql = "SELECT TagID from tags WHERE TagName = '$checked'";
                            $tagidque = mysqli_query($connect, $tagsql);
                            $tagidres = mysqli_fetch_assoc($tagidque);
                            $mytagid = $tagidres['TagID']; //tag id in tag table


                            $recpupdatesql = "UPDATE tags SET NoofRecipes=NoofRecipes+1 WHERE TagName = '$checked'";
                            $recpupdateres = mysqli_query($connect, $recpupdatesql);


                            $describsql = "INSERT INTO describes(RecipeID, TagID)
                            VALUES ('$myrecpidd', '$mytagid')";

                            mysqli_query($connect, $describsql);
    
                        }

                    }

              header("Location: Newrecipe.php?Field=RecipeAdded");

            }
        }

    }

    else
    {
        header("Location: Newrecipe.php?Field=empty");
    }

}



