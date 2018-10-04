<?php

$conn = mysqli_connect('sql1.njit.edu', //username, //password, 'oeh3' );
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['signup'])) {
    $pwd = $_POST['password'];
    $username = $_POST['username'];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);
}


$insert = "INSERT INTO Accounts (username, hashedpwd)
VALUES($username, $hashedPwd)";

if (mysqli_query($conn, $insert)) {
    echo "recorded";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<body>
    <h1>HELLO</h1>
    <div style="padding:85px">
        <h2>Password to be hashed</h2>
        <form method="post">
            <input type="text" name="username">
            <input type="text" name="password">
            <input type="submit" name="signup">
        </form>
    </div>
</body>
</html>