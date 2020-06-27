<?php
include("functions.php");
extract($_GET);
extract($_POST);

switch($action){
    case "store":
        store($nom,$prenom,$tel,$ville_id);
        break; 
    case "update":
        update($nom,$prenom,$tel,$ville_id , $id);
        break;
     case "delete":
        delete($id,"client");
     break;   
    }
    header("location:index.php?op=$action");

?>