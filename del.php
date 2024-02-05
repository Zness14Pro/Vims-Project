<?php
    var_dump($id = $_GET['Id']);
    if ($id = $_GET['Id'])
    {
        include_once "connexion.php";
        $req = mysqli_query($connexion, "DELETE FROM mails WHERE Id = $id");
        header("location:messages.php");
    }

?>