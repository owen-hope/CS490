
    function myFunction() {
        var myUser = document.getElementById("ID_USERNAME").value;
        var myPass = document.getElementById("ID_PASSWORD").value;
        document.getElementById("demo").innerHTML = myUser + myPass;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "https://web.njit.edu/~jdb58/Front.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
                document.getElementById("demo").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send("myUser=" + myUser + "&myPass=" + myPass);                                                  // Actually execute the request
        console.log("myUser=" + myUser + "&myPass=" + myPass);                                                  // Actually execute the request
        document.getElementById("demo").innerHTML = "processing...";
    }