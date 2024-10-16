<?php
    require_once 'include/db.php';
    $id = $_GET['id'];
    $delete = $db->prepare('DELETE FROM detail_commande WHERE id=?');
    $deleteData = $delete->execute([$id]);
    header('Location: main.php');
    /*if($deleteData){
        header('Location: main.php');
    }else {
        echo 'Erreur de Base de Donnée';
    }*/
