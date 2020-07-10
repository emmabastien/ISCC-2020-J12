<?php
session_start();
?>

<!DOCTYPE html> 

<html> 
<head> 
<title>mini-site-routing</title> 
</head> 


<nav>
    <ul>
        <li><a href="mini-site-routing.php?page=1">Accueil</a></li>
        <li><a href="mini-site-routing.php?page=2">Page 2</a></li>
        <li><a href="mini-site-routing.php?page=3">Page 3</a></li>
        <li><a href="mini-site-routing.php?page=connexion">Connexion</a></li>
        <li><a href="mini-site-routing.php?page=admin">admin</a></li>
    </ul>
</nav> 

<?php



function routing (){
if ($_GET ['page'] == 1 ){
    echo "<h1> Accueil</h1>";}

if ($_GET ['page'] == 2 ){
    echo "<h1> Page 2</h1>";}

if ($_GET ['page'] == 3 ){
    echo "<h1> Page 3</h1>";}

}

if ($_GET ['page'] == 'connexion' ){
    include ("connexion.php");
}


routing ();


if (isset($_SESSION["id"])) {
    echo "<p>Login: ".$_SESSION["id"]."</p>";
}

else {
    if (isset ($_COOKIE['id'])){
        $_SESSION['id']=$_COOKIE['id'];
    }
    else header ("Location: mini-site-routing.php?page=connexion");
    }


if (isset ($_SESSION['id'])){
    echo '<a href="mini-site-routing.php?page=admin">admin</a>';
}
else 




?>

</body>
</html>

