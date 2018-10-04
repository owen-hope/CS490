<?php

    $username = $_POST['myUser'];
    $password = $_POST['myPass'];


    $ch = curl_init();                                               // initialize the curl
    $URLmiddle = "https://web.njit.edu/~oeh3/myTesting/myMiddle.php";          // URL to send data to njit housing
    curl_setopt($ch, CURLOPT_URL, $URLmiddle);                 // URL to Send te Request to
    curl_setopt($ch, CURLOPT_POST, 1);                // we are submiting data
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                "myUser=$username&myPass=$password");                // What type of data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);      //return transfer - get response and store it in a variable
    $middleEnd_RESULTS = curl_exec($ch);                             // the variable of return info - executes the curl

    echo $middleEnd_RESULTS;
?>
