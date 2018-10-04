<?php

//url to curl to
$url = 'https://web.njit.edu/~/middle.php';
//new curl resource
$ch = curl_init($url);

//Read post request from middle
$username = $_POST["username"];
$pwd = $_POST["password"];

//Insert into DN
$conn = mysqli_connect('sql1.njit.edu', //usernmae, //password , 'oeh3' );
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//mySQL query
$get = "SELECT username, hashedpwd FROM Accounts WHERE username='$username'";
$result = mysqli_query($conn, $get);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pwd, $row['hashedpwd'])) {
            //account in DB
            $obj->login = "Backend Login Successful";
            $jsonInfo  = json_encode($obj);
           // echo 'hello';
            //echo $jsonInfo;
            echo $jsonInfo;
            //echo '{"login":"successful"}';
        } else {
            //account not in DB
            $obj->login = "Not Successful";
            //$jsonDataEncoded = json_encode($data);
            $jsonInfo = json_encode($obj);
            echo $jsonInfo;
        }
    }
} else {
    $obj->login = "Backend Login Not Successful";
    $jsonInfo = json_encode($obj);
    echo $jsonInfo;
}

mysqli_close($conn);
?>
