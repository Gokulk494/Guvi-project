<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "loginregister");

if (isset($_POST["action"])) {
    if ($_POST["action"] == "register") {
        register();
    } elseif ($_POST["action"] == "login") {
        login();
    }
}

function register()
{
    global $conn;

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($name) || empty($username) || empty($password)) {
        echo "Please Fill Out The Form!";
        exit;
    }

    $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($user) > 0) {
        echo "Username Has Already Taken";
        exit;
    }

    $query = "INSERT INTO tb_user (name, username, password) VALUES ('$name', '$username', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "Registration Successful";
    } else {
        echo "Registration Failed";
    }
}
function login()
{
    global $conn;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_num_rows($user) > 0) {
        $row = mysqli_fetch_assoc($user);

        if ($password == $row['password']) {
            echo "Login Successful";
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "User Not Registered";
    }
}
?>
