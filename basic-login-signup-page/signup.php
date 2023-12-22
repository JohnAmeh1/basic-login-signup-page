<?php
         include("php/checker.php");

        $username = "";
        $email = "";
        $password ="";
        $confirm_password ="";

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $signup = new Signup();
            $result = $signup->evaluate($_POST);

            if($result != ""){
                // echo "error";
            }else{
                header("Location: login.php");
            }
        }

?>


<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width" initial-scale="1.0" />
    <meta charset="utf-8" />    
    <title>login / Sign up form account</title>
    <!--<link rel="shortcut icon" href="/assets/favicon.1co">-->    
    <link rel="stylesheet" href="./extensions/style.css" />
    <link rel="#" href="./testing.html" />
    <style>
    div .center{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    background: tomato;
    margin: 10px 10px 10px 0;
    border-radius: 10px;
    padding: 10px 0;
    font-size: 20px;
    font-weight: 500;
}
    .form__button:hover {
    background: black;
    }
    body{
        background-image: url("./Tutorials/img/img3.jpg");
    }
    </style>
</head>
<body>
        <form class="form" id="createAccount"  method="post">
            <h1 class="form__title">CREATE ACCOUNT</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="username" name="username" class="username" >
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="Email Address" name="email" id="email" >
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" autofocus placeholder="password" name="password" id="password" >
                <!-- <div class="form__input-error-message">asdfghj</div> -->
                <?php 



                    if($result != ""){
                        echo "<div class='center'>";
                        echo "<span>$result</span>";
                        echo "</div>";
                    }
                

                ?>

            </div>    
            <div class="form__input-group">
                <input type="password" class="form__input" autofocus placeholder="Comfirm password" name="confirm_password" id="confirm-password" >
                <div class="form__input-error-message"></div>
            </div>    
            <button class="form__button" type="submit" id="createAccount-submit" onclick="sub()">continue</button>

            <p class="form__text">
                <a href="./login.php" class="form__link" id="linkLogin" >Already have an account? Sign in</a>
            </p>
        </form>
    </div>
    <script>
    function sub(){
        var firstname = document.getElementsByName("username")[0].value;
        var email = document.getElementsByName("email")[0].value;
        var password = document.getElementsByName("password")[0].value;
        var confirm_password = document.getElementsByName("confirm-password")[0].value;
        if (firstname == ""){
            alert("Username cant be empty!!");
        }
        else if(email == "")
        {
            alert("email cant be empty!!");
        }
        else if(password == "")
        {
            alert("password cant be empty!!");
        }
        else if(confirm_password == "")
        {
            alert("cpassword cant be empty!!");
        }
    }
</script>
    <script src="./extensions/main.js"></script>
</body>