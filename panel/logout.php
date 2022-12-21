

<?php
ob_start();
session_start();
if(isset($_SESSION['authuser_id'])) {
session_destroy();
unset($_SESSION['authuser_id']);
unset($_SESSION['userfirst_name']);
unset($_SESSION['userlast_name']);
unset($_SESSION['email']);
header("Location: http://localhost:3000/login_form.php");
} else {
header("Location: http://localhost:3000/login_form.php");
}
?>