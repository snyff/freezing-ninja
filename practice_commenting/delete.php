<?php
require 'connect.php';
$getid= intval($_GET['id']);
mysql_query("DELETE FROM comment WHERE id='$getid'");
header("Location: success.php");
?>
