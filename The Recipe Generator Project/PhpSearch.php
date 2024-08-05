<?php
if (isset( $_POST["submitbtn"] ))
{
    $conn = mysqli_connect("localhost:3308", "root", "","ricettadatabase") or die ("Connection failed".mysqli_connect_error());

    echo ('<script> validate(); </script>');
    $cookie = $_COOKIE['flag'];

    if($cookie=='true'){

        if(!empty($_POST['check_list']))
        {            
            $size = count($_POST['check_list']);
            $sql = " SELECT * FROM recipes WHERE RecipeID IN (SELECT RecipeID from contain WHERE";
    
            $IngredientID = array();
            foreach($_POST['check_list'] as $value2)
            {
                $query1 = "SELECT IngredientID FROM ingredients WHERE IngredientName = '$value2' ; "; 
                $result = mysqli_query($conn, $query1);
                $row = mysqli_fetch_assoc($result);
                array_push($IngredientID, $row['IngredientID'] );
            }

            $ctr = 0;
            foreach($IngredientID as $id)
            {
                $ctr++;
                
                if($ctr < $size)
                {
                    $sql .= "( IngredientID = ".$id.") or ";
                } 
                elseif ($ctr == $size)
                {
                    $sql .= "( IngredientID = ".$id.") );";
                }
                
            }

            $result = mysqli_query($conn, $sql);
            $Searchresult = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $IngNameSql = "SELECT IngredientName FROM ingredients WHERE  ";
            $NamesCount = count($IngredientID);
            $ctr2 = 0;

            foreach($IngredientID as $id)
            {
                $ctr2++;

                if($ctr2 < $NamesCount)
                {
                    $IngNameSql .= "( IngredientID = ".$id.") or ";
                } 
                elseif ($ctr == $NamesCount)
                {
                    $IngNameSql .= "( IngredientID = ".$id.");";
                }
            }
            echo ($IngNameSql);

            $result2 = mysqli_query($conn, $IngNameSql);
            $IngredientNames = mysqli_fetch_all($result2, MYSQLI_ASSOC);

            session_start();
            $_SESSION['Searchresult'] = $Searchresult;
            $_SESSION["IngredientNames"] = $IngredientNames;

            header("Location: Explore.php?page=Search");
            exit();
            
        }
    }
    else
    {
        header("Location: Search.php?error=Notchecked");
        exit();
    }

}
else
{
    header("Location: Search.php");
    exit();
}

  