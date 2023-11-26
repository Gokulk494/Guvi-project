<?php
require 'function.php';
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $user["name"]; ?></h1>
        
        <!-- Logout Button -->
        <a href="logout.php" class="logout-button">Logout</a>

        <!-- Login Button -->
        
    </div>
</body>
</html>
