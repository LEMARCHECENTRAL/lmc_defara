<?php 
    session_start();
    if(isset($_SESSION['utilisateur'])) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEFARA LAB'S</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/css/all.css">
</head>
<body>
	<div class="container">
		<h3>CODE DE CONFIRMATION</h3>
        <div class="py-2">
            <input type="text" name="code" class="form-control" id="number">
            <!-- <div id="number"></div> -->
            <button class="btn btn-primary my-2" id="generateButton">GENERATE CODE</button>
        </div>
        <table class="table table-striped table-hover my-2">
            <thead>
                <tr>
                    <th>CODE ACTUEL</th>
                    <th>OPERATION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once 'include/db.php';
                    $codes = $db->query('SELECT * FROM checks')->fetchAll(PDO::FETCH_ASSOC);
                    foreach($codes as $code){
                ?>
                <tr>
                    <td><?= $code['code'] ?></td>
                    <td>
                        <a href="modify.check.php?id=<?= $code['id'] ?>" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        <div>
            <a href="dashboard.php" class="btn btn-primary">RETOUR</a>
        </div>
	</div>
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php 
} 
else {
    header('Location: index.php');
}
?>
