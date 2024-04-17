<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .cont {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .cont p {
            margin: 0;
            font-size: 24px;
            text-align: left;
            height: 20px;
            font-weight: 700;
        }
        .cont a {
            color: #fff;
            text-decoration: none;
            position: relative;
            left: 1300px;
            bottom: 7px;
        }
        .cont a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        // echo "Welcome". $_SESSION['username'];
    } else {
        header('Location: Login.php');
    }
    ?> 
    <div class="cont">
        <p>Dashboard</p>
        <p><a href="register.php">Sign Out</a></p>
    </div>
    <div class="container">
        <h2>Welcome <br><?php echo $username?></h2>
        <p>Have a good day</p>
    </div>
</body>
</html>
