<?php
session_start();
if (isset($_SESSION['user'])) {
    // Está logado

} else {
    // Não está logado
    $url = '/guild/login.php';
    header("location:$url");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php require_once "navbar.php" ?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
</body>
</html>