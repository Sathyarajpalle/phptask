<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
    session_start();
    $name = $email = $mobile_number = $password = $confirm_password = "";
    $name_err = $email_err = $mobile_number_err = $password_err = $confirm_password_err = "";
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
        if (empty(trim($_POST["Name"]))) {
            $name_err = "Please enter your name.";
        } else {
            $name = trim($_POST["Name"]);
        }
        if (empty(trim($_POST["EMail"]))) {
            $email_err = "Please enter your email.";
        } else {
            $email = trim($_POST["EMail"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format.";
            }
        }
    
        if (empty(trim($_POST["Mobile"]))) {
            $mobile_number_err = "Please enter your mobile number.";
        } else {
            $mobile_number = trim($_POST["Mobile"]);
            if (!preg_match("/^[0-9]{10}$/", $mobile_number)) {
                $mobile_number_err = "Mobile number should be a 10-digit number.";
            }
        }
        
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";     
        } else {
            $password = trim($_POST["password"]);
            if (strlen($password) < 8) {
                $password_err = "Password must have at least 8 characters.";
            }
        }
        if (empty(trim($_POST["confirmpassword"]))) {
            $confirm_password_err = "Please confirm your password.";     
        } else {
            $confirm_password = trim($_POST["confirmpassword"]);
            if ($password != $confirm_password) {
                $confirm_password_err = "Passwords do not match.";
            }
        }
    
        if (empty($name_err) && empty($email_err) && empty($mobile_number_err) && empty($password_err) && empty($confirm_password_err)) {
            $_SESSION['username'] = $name;
            header("Location: session.php");
        }
    }
    ?>
    
 
    
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2>Register</h2>
      <div class="input-group">
        <label for="Name">Name</label>
        <input type="text" id="Name" name="Name" >
        <span class="error"><?php echo $name_err;?></span>
      </div>
      <div class="input-group">
        <label for="EMail">EMail</label>
        <input type="text" id="EMail" name="EMail" >
        <span class="error"><?php echo $email_err;?></span>
      </div>
      <div class="input-group">
        <label for="Mobile">Mobile</label>
        <input type="text" id="Mobile" name="Mobile" >
        <span class="error"><?php echo $mobile_number_err;?></span>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" >
        <span class="error"><?php echo $password_err;?></span>
      </div>
      <div class="input-group">
        <label for="Confirm Password">Confirm Password</label>
        <input type="password" id="Confirm Password" name="confirmpassword" >
        <span class="error"><?php echo $confirm_password_err;?></span>
      </div>
      <button type="submit">Submit</button>
      </form>
  </div>
</body>
</html>
