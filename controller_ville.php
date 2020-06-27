<?php
include("functions.php");
extract($_GET);
extract($_POST);

switch($action){
    case "store":
        store_ville($nom );
        break; 
    case "update":
        update_ville($nom , $id);
        break;
     case "delete":
        delete($id ,"ville");
     break;   
    }
    header("location:index_ville.php?op=$action");

?>