<?php
session_start();
?>

<!DOCTYPE html> 

<html> 
<head> 
<title>securite</title> 
</head> 

<body>

<?php


function connect_to_database(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $databasename = "base-site-routing";
        
        try {
            $pdo = new PDO ("mysql:host=$servername;dbname=$databasename", $username);
            
        
            echo "Connected successfully";
            return $pdo;
        } catch (PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
}
        
connect_to_database();
        
$pdo =connect_to_database();

 
    // on vérifie que le champ "login" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['login'])) {
        echo "Le champ login est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['password'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            $login = $_POST['login'];
                //requête dans la base de données pour rechercher si ces données existent et correspondent
                $user = $pdo->query("SELECT * FROM utilisateurs WHERE login = '$login'");
                $users = $user -> fetch();
                if ($users['login'] == $_POST['login']) {
                    if ($users['password'] == $_POST['password']){
                        echo "Vous êtes connecté";
                        $_SESSION['id'] = $_POST['login'];
                        setcookie('id', $_POST['login']);
                        $_SESSION['img-path'] = $value ['img-path'];
                        setcookie('img-path', $value['img-path']);
                        header ('Location: mini-site-routing.php?page=1');
                        exit;
                    }
                    else {
                        echo "Mauvais couple identifiant / mot de passe.";
                        echo '<a href="mini-site-routing.php?page=connexion"> connexion </a>'; 
                    }
                }
                else {
                    echo "Mauvais couple identifiant / mot de passe.";
                    echo '<a href="mini-site-routing.php?page=connexion"> connexion </a>';
                }
            }
        }
 

isset($_COOKIE['login']);
      $_SESSION['login']=$_COOKIE['login'];


isset($_COOKIE['img-path']);
    $_SESSION['img-path']=$_COOKIE['img-path'];


?>
    </body>
</html>