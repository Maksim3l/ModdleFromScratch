<?php
include "connection.php";
include "functions.php";

if (
    array_key_exists("CurrPass", $_POST) &&
    array_key_exists("Pass", $_POST) &&
    array_key_exists("RepPass", $_POST)
) {
    $user = $_SESSION["Username"];
    $pass = $_POST["CurrPass"];
    $pass2 = sqli_takefirst(
        $con->query("SELECT Password from login where Username ='$user'")
    );
    if (password_verify($pass, $pass2)) {
        if ($_POST["Pass"] == $_POST["RepPass"]) {
            $Pass3 = password_hash($_POST["Pass"], PASSWORD_DEFAULT);
            $sql = "UPDATE login SET Password = '$Pass3' WHERE login.username ='$user'";
            echo "<h1> CRINGEEEEEEEEEEE </h1>";
            if ($con->query($sql)) {
                echo "<h1>New record created successfully</h1>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
        $con->close();
    }
}

?>
