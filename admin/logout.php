<?php
session_start();
include('../db.php');
$_SESSION['admin_logid'] = 0;
$_SESSION['admin_username'] = "";
session_unset();

?>
<script language="javascript">
document.location = "index.php";
</script>