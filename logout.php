<?php
include("parts/header.php");
include("utils/connectDB.php");
session_start();
session_destroy();
header('Location: login.php?message=logout');
?>
<?php
include("parts/footer.php");
?>
