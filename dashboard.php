<?php 
    //session_start();
    //if (isset($_SESSION['users'])) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEFARA LAB'S</title>
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div>ADMINISTRATEUR</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="deconnexion.php">DECONNEXION</a>
                        </li>
            </ul>
            </div>
        </div>
    </nav>
	<div class="container">
		<h3>TABLEAU DE BORD</h3>
        <div>
            <a href="imprimer.php" class="btn btn-primary">LISTE DES COMMANDES</a>
            <a href="generateCode.php" class="btn btn-primary">GENERER CODE INSCRIPTION</a>
            <a href="#" class="btn btn-primary">STATISTIQUE MENSUEL</a>
            <a href="#" class="btn btn-primary">DETTE MENSUEL</a>
            <a href="#" class="btn btn-primary">EN ATTENTE</a>
        </div>
        
	</div>
</body>
</html>
<?php 
//} else {
    //header('Location: index.php');
//}
?>
