<?php
session_start();
include('../db.php');
$_SESSION['staff_logid'] = 0;
$_SESSION['staff_username'] = "";
session_unset();

?>
<script language="javascript">
document.location = "../index.php";
</script>