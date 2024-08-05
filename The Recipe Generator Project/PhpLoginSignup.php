<?php

if (isset( $_POST["Loginsubmit"] ))
{
    $username = $_POST["Loginusername"];
    $password = $_POST["Loginpassword"];

    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    // echo ($_SESSION['username']);

    require_once('databaseHandler.inc.php');
    require_once('functions.php');

    if (emptyInputs($username, $password) !== false)
    {
        header("location: LoginSignup.php?error=emptyusernameorpassword");
        exit();
    }
    
    else
    {
        $sql = "SELECT UserPassword FROM users where UserName = '$username'";                
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: LoginSignup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
        $count = mysqli_num_rows($resultData);

        if ($count > 0)
        {
            $hashedPass = $row["UserPassword"];

            if (!password_verify($password, $hashedPass)) {
                header("location: LoginSignup.php?error=incorrectpassword");
                exit;
            }
            else
            {
                session_start();
                $_SESSION["username"] = $username;
                header("location: UserProfile.php");
            }

        }
        else
        {
            header("location: LoginSignup.php?error=incorrectusername");
            exit;   
        }

        
        


    }
    
}

elseif (isset( $_POST["SignupSubmit"] )){
    $username = $_POST["Signupusername"];
    $password = $_POST["Signuppass"];
    $Confirmpassword = $_POST["Signuppass2"];

    session_start();
    $_SESSION['username'] = $username;

    require_once('databaseHandler.inc.php');
    require_once('functions.php');

    if (emptySignupInputs($username, $password, $Confirmpassword) !== false)
    {
        header("location: LoginSignup.php?error=Signupemptyusernameorpassword");
        exit();
    }
    if (invalidUsername($username) !== false)
    {
        header("location: LoginSignup.php?error=invalidusername");
        exit();
    }
    if (UsernameExits($conn, $username) !== false) 
    {
        header("location: LoginSignup.php?error=usernamealreadyexists");
        exit();   
    }
    if (invalidPassword($password) !== false)
    {
        header("location: LoginSignup.php?error=invalidpassword");
        exit();
    }
    if (Passwordmatch($password, $Confirmpassword) !== true)
    {
        header("location: LoginSignup.php?error=passwordmismatch");
        exit();
    }

    createNewUser($conn, $username, $password);



}


else{
    header("location: HomePage.php");
    exit();
}
