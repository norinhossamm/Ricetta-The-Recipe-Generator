<?php 
require_once("databaseHandler.inc.php");
    session_start();

    $iduser = $_SESSION["userid"];
    $idrecp = $_SESSION["recipeid"];
    $iscolored = $_SESSION["color"];
    if ($iscolored==="true"){
        echo ("<script>
        var heart = document.getElementById('likeheart');
        heart.fill= '#FEEAAB'; 
        </script>");
        $deletos = "DELETE FROM `likedrecipes` WHERE UserID=$iduser AND RecipeID=$idrecp";
        $result = mysqli_query($conn, $deletos);

    }
    elseif($iscolored==="false"){
        echo ("<script>
        var heart = document.getElementById('likeheart');
        heart.fill= '#852B2A'; 
        </script>");
        $addos = "INSERT INTO `likedrecipes`(`likeID`, `RecipeID`, `UserID`) VALUES (null,$idrecp,$iduser)";
        $result2 = mysqli_query($conn, $addos);

        

    }

    header("location:recipephp.php");
    exit();
