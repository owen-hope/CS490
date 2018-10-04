
<?php
$username = $_POST['myUser'];
$password = $_POST['myPass'];

$cur = curl_init();
$url = "https://aevitepr2.njit.edu/myhousing/login.cfm";
curl_setopt($cur, CURLOPT_URL, $url);
curl_setopt($cur, CURLOPT_POST, 1);
curl_setopt($cur, CURLOPT_POSTFIELDS,
            "ucid=$username&pass=$password");
curl_setopt($cur, CURLOPT_RETURNTRANSFER, true);
$njitResponse = curl_exec($cur);
//var_dump($njitResponse);

if (strlen($njitResponse) == 78) {
    //This is for BACKEND cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://web.njit.edu/~oeh3/myTesting/backend.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                "username=$username&password=$password");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    //echo curl_getinfo($ch) . '<br/>';
    //echo curl_errno($ch) . '<br/>';
    //echo curl_error($ch) . '<br/>';

    curl_close($ch);

    $jsonInfo = json_decode($output, true);


    $obj->login = $jsonInfo['login'];
    $obj->njitInfo = "NJIT Login Successful";
    $jsonEncode = json_encode($obj);
    echo $jsonEncode;
} else {
    //This is for BACKEND cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://web.njit.edu/~oeh3/myTesting/backend.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                "username=$username&password=$password");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    //echo curl_getinfo($ch) . '<br/>';
    //echo curl_errno($ch) . '<br/>';
    //echo curl_error($ch) . '<br/>';

    curl_close($ch);

    $jsonInfo = json_decode($output, true);


    $obj->login = $jsonInfo['login'];
    $obj->njitInfo = "NJIT Login Not Successful";
    $jsonEncode = json_encode($obj);
    echo $jsonEncode;
}







?>
