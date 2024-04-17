<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <?php
    // session_start();
    $email = $password = "";
    $email_err = $password_err = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // if(empty($_POST("Name"))){
        //     $name_err= "Name cannot be empty";
        // }
        // else{
        //     $name=$_POST("Name");
        //     if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        //         $username_err = "Username can only contain letters, numbers, and underscores.";
        //     }
        // } 
        if (empty($_POST["EMail"])) {
            $email_err = "Please enter your email.";
        } else {
            $email = $_POST["EMail"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format.";
            }
        }
        if (empty($_POST["password"])) {
            $password_err = "Please enter your password.";     
        } else {
            $password = $_POST["password"];
            if (strlen($password) < 8) {
                $password_err = "Password must have at least 8 characters.";
            }
        }

        if (empty($email_err) && empty($password_err)) {
            // $_SESSION["username"] = $name;
            // $_SESSION['email'] = $email;
            // $_SESSION['password'] = $password;
            header("Location: session.php");
        }
    }

    
  ?>
  <div class="container">
    <form action="Login.php" method="post">
      <h2>Login</h2>
      <div class="input-group">
        <label for="EMail">EMail</label>
        <input type="text" id="EMail" name="EMail" ><br>
        <span class="error"><?php echo $email_err;?></span>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" ><br>
        <span class="error"><?php echo $password_err;?></span>
      </div>
      <button type="submit">Login</button>
      <P><i>New User?</i><a href="register.php">Register here</a></P>
      </form>
  </div>
</body>
</html>
