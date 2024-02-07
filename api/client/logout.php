<?php
session_start();
include('../db.php');
$_SESSION['client_logid'] = 0;
$_SESSION['client_username'] = "";
session_unset();

?>
<script language="javascript">
document.location = "../index.php";
</script>