<?php

include("./php/checker.php");

$username = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $login = new Login();
  $result = $login->evaluate($_POST);

  if($result != ""){
    echo $result;
  }else{
    header("Location: ./welcomepage.html");
    die;
  }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <!--<link rel="shortcut icon" href="/assets/favicon.1co">-->    
    <link rel="stylesheet" href="./extensions/style.css" />
    <link rel="#" href="./testing.html" />
    <style>
    .form__button:hover {
      background: black;
    }
    body{
      background-image: url("./Tutorials/img/img3.jpg");
    }
    .ticks{
      color:  rgb(3, 3, 88);
      margin: 0 auto;
    }
    </style>
</head>
<body>
        <form class="form" id="login" method="post">
            <h1 class="form__title">LOGIN</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="username or email" name="username">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" autofocus placeholder="password" name="password" required>
                <div class="form__input-error-message"></div>
            </div>    
            <button class="form__button" type="submit">continue</button>
            <p class="form__text">
                <a href="#" class="form__link">forgot password?</a>
            </p>
            <div class="ticks">
              <label><input type="checkbox">Remember me</label>
            </div>
            <p class="form__text">
                <a href="./signup.php" class="form__link" id="linkCreateAccount">Don't have account? create account</a>
            </p>
        </form>
</body>
</html>