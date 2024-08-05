<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Ricetta</title>
    <link rel="stylesheet" href="SignupLogin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <link rel="icon" href="images/loggoicononly.jpeg" >


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>

<?php
session_start();
?>
<script>

    function showmodal(){
        $(document).ready(function(){
        $("#exampleModalCenter").modal('show');
    });
    }

    function hidemodal(){
        $(document).ready(function(){
        $("#exampleModalCenter").modal('hide');
    });
    }

</script>

<div class="LeftHalf">

    <div class="LeftTextContainer" style="font-size: 12pt;">
            <h1 style="font-weight: 900;">
                Wondering what to eat?
            </h1>
            <h3 style="font-size: 1.17em; font-weight: bold; margin-top: 4%;"><strong>Ricetta</strong> is here to make your life easier. <br>
                <br>Discover a world where cooking is less stressful and more fun. <br>
                <p>With <strong>Ricetta</strong> you can</p> 
                <ul>
                    <li>Search recipes with specific ingredients</li>
                    <li>Explore new recipes</li>
                    <li>Add your own recipes</li>
                </ul>

                <h2 style="font-weight: 900;">Check it out!</h2>
            
            </h3 >

    </div>

</div>

<div class="RightHalf"> 

    <div class="ImgContainer"> 
        <a href="HomePage.php" target="_self" > <img src="images/LOGO.png" alt="Ricetta The recipe generator"  id="Logo"></a> 
    </div>
    
    <div id="loginerror" style="color: red; font-size: 12pt; text-align: center;"></div>

    <form action="PhpLoginSignup.php" method="post" id="loginForm" >
        <div class="container">
            <div class="inputblock">
                <label for="username"><strong>Username: </strong></label><br>
                <input type="text" placeholder="Enter your Username" name="Loginusername" id="loginusername" class="textbox" ><br>
                <p id="username_errormsg" style="color: red; margin-top: 0%; padding-top: 0%;"></p>
            </div>
            
            <div class="inputblock">
                <label for="password"><strong>Password: </strong></label><br>
                <input type="password" placeholder="Enter your Password" name="Loginpassword" id="loginpassword" class="textbox" ><br>
                <p id="password_errormsg" style="color: red; margin-top: 0%; padding-top: 0%;"></p>
            </div>

            <button type="submit" id="loginbtn" name="Loginsubmit" style="border-radius: 0.5em;">Login</button>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="SignUpbtn" style="margin-left: 24%;">Not a user? <b><u>Sign Up</u></b></button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
        
      <div class="modal-body">
        
      <div class="ImgContainerModal"> 
            <img src="images/LOGO.png" alt="Ricetta The recipe generator"  id="ModalLogo">
        </div>

        <div class="container" id="ModalContainer">
        <div>
            <h2>Welcome! </h2>
            <h4>Sign up to continue</h4>
        </div>

      <form class="animate" action="PhpLoginSignup.php" method="post">
        
        <div class="inputblock">
        <label for="username1"><strong>Enter a Username: </strong></label><br>
        <input type="text" placeholder="Enter your username" name="Signupusername" id="username1" class="textbox"  ><br>
        <p id="usernameer" class="errormessage"> </p>
        </div>

        <div class="inputblock">
        <label for="password1"><strong>Enter a Password: </strong></label><br>
        <input type="password" placeholder="Enter your password" name="Signuppass" id="password1" class="textbox"><br>
        <p id="passer" class="errormessage"> </p>
        </div>

        <div class="inputblock">
        <label for="password1"><strong>Confirm your Password: </strong></label><br>
        <input type="password" placeholder="Renter your password " name="Signuppass2" id="passwordconfirm" class="textbox" onchange="validatr()"><br>
        <p id="passconfer" class="errormessage"> </p>
        </div>

    <button type="submit" class="btn" name="SignupSubmit" style="  width: 50%; height: auto; margin-top: 5%; padding: 12px 20px; 
    background-color: #D88D56;color: white;font-size: 12pt;font-weight: 500;border-radius: 0.5em;border: 2px solid #103e5b;cursor: pointer;" >
    Sign Up</button>
    </div>

    <div class="Cancelbtncontainer">
    <button type="button" class="cancelbtn btn " data-dismiss="modal" id="ModalCancelid" style=" height: auto; padding: 12px 20px;color: white;font-size: 12pt;font-weight: 500;border-radius: 0.5em;border: 2px solid #103e5b;cursor: pointer;
    background-color:#9e3534; text-align: center; width: 20%; margin-top: 3%; color: white;">Cancel</button>
    </div>
    </form>

    </div>
      
    </div>
  </div>
</div>


    <?php
    if (isset($_GET["error"]))
    {
        session_start();
        $usernamevalue = $_SESSION['username'];

        if ($_GET["error"] == "emptyusernameorpassword")
    {
        echo ("<script>
        var error_username = document.getElementById('username_errormsg');  
        error_username.innerHTML = 'Please enter your username';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('loginusername');
        username_box.style.border= '0.5px solid red ' ; 
        </script>");

        echo ("<script>
        var error_password = document.getElementById('password_errormsg');
        error_password.innerHTML = 'Please enter your password' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('loginpassword');
        password_box.style.border= '0.5px solid red' ;  
        </script>");
    }

    if ($_GET["error"] == "incorrectusername")
    {
        echo ("<script>
        var loginerror = document.getElementById('loginerror');  
        loginerror.innerHTML = 'Incorrect username. Please try again.';         
        </script>");

        echo ("<script>
        var loginerror = document.getElementById('loginerror');  
        loginerror.style.margin-bottom = '2%';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('loginusername');
        username_box.style.border= '0.5px solid red ' ; 
        </script>");

        echo ("<script>
        var password_box = document.getElementById('loginpassword');
        password_box.style.border= '0.5px solid red' ;  
        </script>");

        echo ("<script>
        document.getElementById('loginusername').value = '';
        </script>");
    }

    if ($_GET["error"] == "incorrectpassword")
    {
        echo ("<script>
        document.getElementById('loginusername').value = '$usernamevalue';
        </script>");

        echo ("<script>
        var loginerror = document.getElementById('loginerror');  
        loginerror.innerHTML = 'Incorrect password. Please try again.';         
        </script>");

        echo ("<script>
        var loginerror = document.getElementById('loginerror');  
        loginerror.style.margin-bottom = '2%';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('loginusername');
        username_box.style.border= '0.5px solid red ' ; 
        </script>");

        echo ("<script>
        var password_box = document.getElementById('loginpassword');
        password_box.style.border= '0.5px solid red' ;  
        </script>");

    }

    if ($_GET["error"] == "logout")
    {
        echo ("<script>
        document.getElementById('loginusername').value = '';
        </script>");

        echo ("<script>
        document.getElementById('loginpassword').value = '';
        </script>");


        echo ("<script>
        var username_box = document.getElementById('loginusername');
        username_box.style.border= '0.5px solid black ' ; 
        </script>");

        echo ("<script>
        var password_box = document.getElementById('loginpassword');
        password_box.style.border= '0.5px solid black' ;  
        </script>");

    }

    ######################### SIGNUP ###########################
    elseif ($_GET["error"] == "Signupemptyusernameorpassword")
    {
        echo ("<script>
        showmodal();        
        </script>");

        echo ("<script>
        var error_username = document.getElementById('usernameer');  
        error_username.innerHTML = 'Please enter your username';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('username1');
        username_box.style.border= '0.5px solid red ' ; 
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passer');
        error_password.innerHTML = 'Please enter your password' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('password1');
        password_box.style.border= '0.5px solid red' ;  
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passconfer');
        error_password.innerHTML = 'Please confirm your password' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('passwordconfirm');
        password_box.style.border= '0.5px solid red' ;  
        </script>");
    }
    
    elseif ($_GET["error"] == "invalidusername")
    {
        echo ("<script>
        showmodal();        
        </script>");

        echo ("<script>
        var error_username = document.getElementById('usernameer');  
        error_username.innerHTML = 'Username can be letters, numbers, or underscores, and at least 3 in length';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('username1');
        username_box.style.border= '0.5px solid red ' ; 
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passer');
        error_password.innerHTML = '' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('password1');
        password_box.style.border= '0.5px solid black' ;  
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passconfer');
        error_password.innerHTML = '' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('passwordconfirm');
        password_box.style.border= '0.5px solid black' ;  
        </script>");
    }
    elseif ($_GET["error"] == "usernamealreadyexists")
    {
        echo ("<script>
        showmodal();        
        </script>");

        echo ("<script>
        var error_username = document.getElementById('usernameer');  
        error_username.innerHTML = '&nbsp;&nbsp;&nbsp;A user with that username already exists.';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('username1');
        username_box.style.border= '0.5px solid red ' ; 
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passer');
        error_password.innerHTML = '' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('password1');
        password_box.style.border= '0.5px solid black' ;  
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passconfer');
        error_password.innerHTML = '' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('passwordconfirm');
        password_box.style.border= '0.5px solid black' ;  
        </script>");
    }
    elseif ($_GET["error"] == "invalidpassword")
    {   
        echo ("<script>
        showmodal();        
        </script>");

        echo ("<script>
        document.getElementById('username1').value = '$usernamevalue';
        </script>");

        echo ("<script>
        var username_box = document.getElementById('username1');
        username_box.style.border= '0.5px solid black ' ; 
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passer');
        error_password.innerHTML = 'Password must contain letters, numbers, or underscores, and at least 8 in length' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('password1');
        password_box.style.border= '0.5px solid red' ;  
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passconfer');
        error_password.innerHTML = '' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('passwordconfirm');
        password_box.style.border= '0.5px solid black' ;  
        </script>");
    }
    elseif ($_GET["error"] == "passwordmismatch")
    {
        echo ("<script>
        showmodal();        
        </script>");

        echo ("<script>
        document.getElementById('username1').value = '$usernamevalue';
        </script>");

        echo ("<script>
        var error_password = document.getElementById('passer');
        error_password.innerHTML = 'Password mismatch' ;          
        </script>");

        echo ("<script>
        var password_box = document.getElementById('password1');
        password_box.style.border= '0.5px solid red' ;  
        </script>");

        echo ("<script>
        var password_box = document.getElementById('passwordconfirm');
        password_box.style.border= '0.5px solid red' ;  
        </script>");
    }
    elseif ($_GET["error"] == "none")
    {
        echo ("<script>
        var loginerror = document.getElementById('loginerror');  
        loginerror.innerHTML = 'You have signed up successfully! Now login please :)'; 
        loginerror.style.color = 'blue';     
        </script>");

        echo ("<script>
        var loginerror = document.getElementById('loginerror');  
        loginerror.style.margin-bottom = '2%';         
        </script>");

        echo ("<script>
        var username_box = document.getElementById('loginusername');
        username_box.style.border= '0.5px solid blue ' ; 
        </script>");

        echo ("<script>
        var password_box = document.getElementById('loginpassword');
        password_box.style.border= '0.5px solid blue' ;  
        </script>");
    }
    // elseif ($_GET["error"] == "emptyusername")
    // {
    //     echo ("<script>
    //     var error_username = document.getElementById('username_errormsg');  
    //     error_username.innerHTML = 'Please enter your username';         
    //     </script>");

    //     echo ("<script>
    //     var username_box = document.getElementById('loginusername');
    //     username_box.style.border= '0.5px solid red ' ; 
    //     </script>");

    //     echo ("<script>
    //     var error_password = document.getElementById('password_errormsg');
    //     error_password.innerHTML = '' ;          
    //     </script>");

    //     echo ("<script>
    //     var password_box = document.getElementById('loginpassword');
    //     password_box.style.border= '0.5px solid black' ;  
    //     </script>");
    // }
    
    
    }
    ?> 

    <script>
         

        document.querySelector('#username1').addEventListener("change", function() //select element by id, when user selects new file this function is run
        {
        const reader = document.getElementById ('username1').value; //converts file to data URL (url contains info about the file)
        reader.addEventListener("load", () => {   //listening for load event 
            
        localStorage.setItem("recent-name", reader);   //localstorage for it to be saved in browser, setting selected file as recent image
        //key recent image set to value which is data url
        showmodal();
        });

        });

        document.addEventListener ("DOMContentLoaded", () => {   //once the dom content has loaded , this function is run
        const usernamevalue = localStorage.getItem("recent-name");  //getting recent image 

        if (usernamevalue) //if we have recent previously image
        {
        document.querySelector("#username1").setAttribute("value", usernamevalue); //so we return this previously saved image
        showmodal();
        }


        });

    </script>





</body>
</html>