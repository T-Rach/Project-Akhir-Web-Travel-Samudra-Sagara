<?php

session_start();
include ("db.php")

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="style2.css" />
    <title>Login Page | Samudra Sagara</title>
  </head>

  <body>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form>
          <h1>Create Account</h1>
          <span>or use your email for registeration</span>
          <input type="text" placeholder="User Name" />
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <input type="number" placeholder="Number Phone" />
          <input type="text" placeholder="Addres" />
          <button>Register</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form>
          <h1>Sign In</h1>
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <a href="#">Forget Your Password?</a>
          <button>Login</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Enter your personal details to use all of site features</p>
            <button class="hidden" id="login">Login</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Haii, Sahabat Sagara!</h1>
            <p>
              Masukkan akun mu dan nikmati perjalanan bersama Samudra Sagara
            </p>
            <button class="hidden" id="register">Register</button>
          </div>
        </div>
      </div>
    </div>

    <script src="script2.js"></script>
  </body>
</html>
