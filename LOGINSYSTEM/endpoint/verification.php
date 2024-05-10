<?php
include ('../conn/conn.php');
session_start();
if (isset($_SESSION['user_verification_id'])) {
$userVerificationID = $_SESSION['user_verification_id'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Verification Page</title>
  <style>
    * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url(https://i.pinimg.com/originals/53/34/61/5334617e5d31d521a1680bc988e3ad50.gif);
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      height: 100vh;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .container:hover {
      background-color: rgba(0, 0, 0, 0.5);
    }
    .verification-form{
      backdrop-filter: blur(100px);
      text-align: center;
      color: rgb(4, 4, 4);
      padding: 40px;
      width: 500px;
      border: 5px solid;
      border-radius: 5px;
      border-color: rgb(0, 21, 57);
      background-image: url(https://img.freepik.com/premium-photo/white-paper-plane-flying-blue-sky-background_29277-185.jpg);
      transition: border-color 0.3s ease; 
    }
    .verification-form:hover{
      border-color: #024792; 
    }
    h2.text-center {
      color: #0092e7;
      transition: color 0.3s ease;
    }
    .verification-form:hover h2.text-center {
      color: #003858;
      font-size: 33px;
    }
    .form-group {
      text-align: left;
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input,
    .form-group select {
      width: calc(100% - 16px);
      padding: 8px;
      font-size: 15px;
      margin-bottom: 10px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .switch-form-link {
      text-decoration: underline;
      cursor: pointer;
      color: rgb(173, 8, 11);
    }
    .verify{
      background-color: #72c5f8;
      color: rgb(0, 0, 0);
      border: none;
      width: 50%;
      padding: 10px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }
    .verify:hover {
      background-color: #024185;
      color: rgb(255, 255, 255);
    }
    .row {
      display: flex;
      justify-content: space-between;
    }
    .row .form-group {
      width: calc(50% - 10px);
    }
    .verification-form {
        backdrop-filter: blur(100px);
        color: rgb(255, 255, 255);
        padding: 40px;
        width: 500px;
        border: 2px solid;
        border-radius: 10px;
}
  </style>
</head>
<body>
  <div class="container">
    <div class="main">
        <div class="verification-container">
            <div class="verification-form" id="loginForm">
            <h2 class="text-center">Email Verification</h2>
            <p class="text-center">Please check your email for verification code.</p>
            <form action="/LOGINSYSTEM/endpoint/add-user.php" method="POST">
            <input type="text" name="user_verification_id" value="<?= $userVerificationID ?>" hidden>
            <br>
            <input type="number" class="form-control text-center" id="verificationCode"
            name="verification_code">
            <br><button type="submit" class="btn btn-secondary login-btn form-control mt-4"
            name="verify">Verify</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>