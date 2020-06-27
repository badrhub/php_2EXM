<?php

function connect(){
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
    ];
    try {
     $cn = new PDO("mysql:host=localhost;dbname=etudiantphp;","root","root",$options);
     return $cn;
    } catch (PDOException $e) {
        die("Connection database mysql: " . $e->getMessage());
    }
}

function all($table="client" , $condition =""){
    try {
    $cnx = connect();
    if(!empty($condition)){
        $resp = $cnx->prepare("select * from $table where $condition order by id desc");
    }else{
        $resp = $cnx->prepare("select * from $table order by id desc");
    }
    
    $resp ->execute();
    $result = $resp->fetchAll();
    return $result;
} catch (PDOException $e) {
    die("erreur select all $table mysql: " . $e->getMessage());
}
}

function find(int $id , $table="client"){
    try {
    $cnx = connect();
    $resp = $cnx->prepare("select * from $table where id=?");
    $resp ->execute([$id]);
    $result = $resp->fetch();
    return $result;
} catch (PDOException $e) {
    die("erreur find $table mysql: " . $e->getMessage());
}
}

function delete(int $id ,$table="client"){
    try {
    $cnx = connect();
    $resp = $cnx->prepare("delete  from $table where id=?;");
    $resp ->execute([$id]);
} catch (PDOException $e) {
    die("erreur delete $table mysql: " . $e->getMessage());
}
}

function update($n,$p,$d,$v, $id ){
    try {
    $cnx = connect();
    $resp = $cnx->prepare("update  client set nom = ? , prenom = ? , tel = ? , ville_id=? where id=?;");
    $resp ->execute([$n,$p, $d,$v,$id]);
} catch (PDOException $e) {
    die("erreur update mysql: " . $e->getMessage());
}
  }
 
  function store($n,$p,$d ,$v){
    try {
    $cnx = connect();
    $resp = $cnx->prepare("insert into client(nom , prenom , tel,ville_id) values(?,?,?,?) ;");
    $resp ->execute([$n,$p,$d,$v]);
} catch (PDOException $e) {
    die("erreur store  mysql: " . $e->getMessage());
}
  }

  function store_ville($x ){
    try {
        $cnx = connect();
        $resp = $cnx->prepare("insert into ville(nom) values(?) ;");
        $resp ->execute([$x]);
    } catch (PDOException $e) {
        die("erreur store  mysql: " . $e->getMessage());
    } 
}

function update_ville($n , $id){
    try {
        $cnx = connect();
        $resp = $cnx->prepare("update  ville set nom = ? where id=?;");
        $resp ->execute([$n,$id]);
    } catch (PDOException $e) {
        die("erreur update  mysql: " . $e->getMessage());
    }
}

function all_client_ville():array{
    try {
    $cnx = connect();
    $resp = $cnx->prepare("select c.* , v.nom as vl from client c join ville v on c.ville_id = v.id order by id desc");
    $resp ->execute();
    $result = $resp->fetchAll();
    return $result;
} catch (PDOException $e) {
    die("erreur select all client_ville  mysql: " . $e->getMessage());
}
}
function demarer_session(){
    if(!isset($_SESSION)){
      session_start();
    }
}

function verifier($login, $passe ,$url_redirect=""){
    try {
        $cnx = connect();
        $resp = $cnx->prepare("select * from users where login=? and passe = ?");
        $resp ->execute([$login , $passe]);
        $result = $resp->fetch();
        if($result){
            demarer_session();
            $_SESSION["login"] = $login;
            $_SESSION["passe"] = $passe;
            $_SESSION['pseudo'] = $result['pseudo'];
            $_SESSION['id'] = $result['id'];
        }else{
            header("location:$url_redirect");
            die();
        }
        return $result;
    } catch (PDOException $e) {
        die("erreur password ou login incorrect mysql: " . $e->getMessage());
    }
}

?>
  