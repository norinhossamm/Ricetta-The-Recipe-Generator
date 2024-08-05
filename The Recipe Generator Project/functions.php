<?php

function emptyInputs($username, $password)
{
    $result = false;

    if (empty($username) || empty($password))
    {
        $result = true;
    }

    return $result; 
}

##################### SIGN UP ##########################

function emptySignupInputs($username, $password, $Confirmpassword)
{
    $result = false;

    if (empty($username) || empty($password) || empty($Confirmpassword))
    {
        $result = true;
    }

    return $result; 
}


function invalidUsername($username)
{
    $result = false;

    if (!preg_match("/^[a-zA-Z0-9_ ]{3,}$/", $username)) #3 or more digits or numbers 
    {
        $result = true;
    }

    return $result;

}


function invalidPassword($password)
{
    $result = false;


    if((!preg_match("/^[a-zA-Z0-9_ ]{8,}$/",$password))) #if <8 return true --> invalid
    {
        $result = true;
    }
    
    return $result;
    
}

function Passwordmatch($password, $Confirmpassword)
{
    if ($password !== $Confirmpassword)
        return false;

    return true;
}

function UsernameExits($conn, $username)
{
    $sql = "SELECT * FROM users WHERE UserName = ? ;" ;
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: LoginSignup.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) 
    {
        return $row;
    }
    
    mysqli_stmt_close($stmt);
    
    $result = false;
    return $result;

}

function createNewUser($conn, $username, $password)
{
    $sql = "INSERT INTO users (UserName, UserPassword) VALUES (?,?);" ;
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: LoginSignup.php?error=stmtfailed");
        exit();
    }

    $Passwordhash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $Passwordhash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: LoginSignup.php?error=none");
    exit();
}
