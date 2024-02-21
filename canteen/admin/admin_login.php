admin login
<?php
include('../includes/connect.php');
if(isset($_POST['submit'])){
   
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
echo "$username";
echo "$password";
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
      //echo "row password:{$row['password']}";
$hashed_password=password_hash('12345',PASSWORD_DEFAULT);
echo "$hashed_password";
 if(password_verify($password, $row["password"])){
            header("Location: admin_panel.php");
            exit(); // Exit to prevent further execution
        }
    } 
    // If username/password does not match
echo "$row";
echo "$username";
    echo '<script>
            alert("Invalid username or password!!");
           
            </script>';
    exit(); // Exit to prevent further execution
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div id="form">
    <h1>Login</h1>
    <form name="form" action="admin_login.php" method="POST">
        <label>Enter Username</label>
        <input type="text" id="username" name="username" required><br><br>
        <label>Enter Password</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" id="btn" value="Log in" name="submit"/>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
</body>
</html>

