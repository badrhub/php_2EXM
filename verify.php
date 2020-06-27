<?php
include("functions.php");
extract($_POST);
verifier($login , $passe ,"login.php?cn=no");
header("location:index.php");
?>