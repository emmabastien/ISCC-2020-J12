<form action="index.php?page=4" method="post" enctype="multipart/form-data">
    <input type="file" accept="image/png, image/jpg, image/jpeg" name="file" required>
    <input type="text" name="title" placeholder="Titre">
    <input type="text" name="desc" placeholder="Description">
    <input type="submit" name="submit" value="Upload">
    <input type="text" name="login" placeholder="login"/>
    <input type="text" name="password" placeholder="password"/>
    <input type = "submit" value = "Envoyer">
</form>

<?php
if (empty($_FILES['file']))
    echo("<p>En attente de fichier</p>");
else {
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $destination = "./";

    if (strlen(substr($filename, 0, (strrpos($filename, ".")))) < 4)
        echo("<p>Erreur dans le fichier: valeur ['name']</p>");
    elseif ($filesize > 2097152)
        echo("<p>Erreur dans le fichier: valeur ['size']</p>");
    else {
        if (!empty($_POST['title']))
            $_SESSION['title'] = $_POST['title'];
        if (!empty($_POST['desc']))
            $_SESSION['desc'] = $_POST['desc'];
        $_SESSION['image'] = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $_SESSION['image']);
        header("Location: index.php?page=1");
    }
}



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


$login = $_POST['login'];
$password = $_POST['login'];
$imgpath = $_FILES['file']['name'];
$titre = $_POST['title'];

$user = $pdo->query("SELECT * FROM utilisateurs WHERE login = '$login'")->fetch();

if(empty($user['login'])){
$update = $pdo->prepare ("UPDATE utilisateurs(password, 'title') VALUES (?,?)");
$update->execute(array($password, $title));}

else {

$stmt = $pdo->prepare('INSERT INTO utilisateurs (login,password, img-path) VALUES (?,?,?)');
$stmt->execute(array($login, $password, $imgpath));

}



$img=$pdo->query("UPDATE `utilisateurs` SET `password`,`title` = 1 WHERE `id` = 4");


echo '<img src = $_POST["img-path"];?>';


?>

