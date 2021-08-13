<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
$_SESSION['user_roll']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>
