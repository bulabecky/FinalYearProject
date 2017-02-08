<<<<<<< HEAD:loginTest/logout.php
<?php
session_start();

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
} else if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
}

if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['userSession']);
 header("Location: index.php");
}
=======
<?php
session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
header("Location: login.php");
}
?>
>>>>>>> 28d4c23bfd51b19898b5ea2fbe69aa1adf5d9022:logout.php
