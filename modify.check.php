<?php 
    //session_start();
    //if(isset($_SESSION['utilisateur'])) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEFARA LAB'S</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
</head>
<body>
	<div class="container">
        <?php
            require_once 'include/db.php';	
            $select = $db->prepare('SELECT * FROM checks WHERE id=?');
            $id = $_GET['id'];
            $select->execute([$id]);
            $codes = $select->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['modifier'])) {

                $numero = $_POST['code'];

                if (!empty($numero)) {
                    $insert = $db->prepare('UPDATE checks
                    SET code=? WHERE id=?');
                    $insert->execute([$numero, $id]);
                    header('Location: generateCode.php');	
                }
                else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        Tous les champs doivent être rempli !
                    </div>
                <?php
                }
            }

        

        ?>
		<h3>MODIFIER CODE DE CONFIRMATION</h3>
        <form method="post">
            <div class="py-2">
                <label class="form-label">CODE DE CONFIRMATION</label>
                <input type="text" name="code" class="form-control" value="<?= $codes['code'] ?>">
            </div>
            <div class="py-2">
                <input type="submit" name="modifier" value="MODIFIER CODE DE CONFIRMATION" class="btn btn-primary"/>
            </div>
        </form>
	</div>
</body>
</html>
<?php 
//} 
//else {
    //header('Location: index.php');
//}
?>
