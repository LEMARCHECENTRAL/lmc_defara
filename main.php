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
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand txt" href="#">NOM EMPLOYE</a>
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
		<h3>GESTION DES COMMANDES</h3>
        <div>
            <a href="detail.php" class="btn btn-primary">AJOUTER UNE COMMANDE</a>
        </div>
        <table class="table table-striped table-hover my-2">
            <thead>
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>DATE</th>
                    <th>NOM CLIENT</th>
                    <th>DESCRIPTION COMMANDE</th>
                    <th>MONTANT</th>
                    <th>AVANCE</th>
                    <th>RESTE</th>
                    <th>REMARQUE</th>
                    <th colspan="2">OPERATIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php
                require_once 'include/db.php';
                $commandes = $db->query('SELECT * FROM detail_commande')->fetchAll(PDO::FETCH_ASSOC);  
                foreach($commandes as $commande){
                ?>
                <tr>
                    <td><?= $commande['numero'] ?></td>
                    <td><?= $commande['dates'] ?></td>
                    <td><?= $commande['nom_client'] ?></td>
                    <td><?= $commande['descriptions'] ?></td>
                    <td><?= $commande['montant'] ?></td>
                    <td><?= $commande['avance'] ?></td>
                    <td><?= $commande['reste'] ?></td>
                    <td><?= $commande['remarque'] ?></td>
                    <td>
                        <a href="modify.detail.php?id=<?= $commande['id'] ?>" class="btn btn-primary">Modifier</a>
                    </td>
                    <td>
                        <a href="delete.cmd.php?id=<?= $commande['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la commande de <?= $commande['nom_client'] ?> ?')" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr> 
                <?php
                }
            ?>
            </tbody>
        </table>
        <div>
			<!-- <input type="submit" name="imprimer" value="IMPRIMER" class="btn btn-primary"/> -->
            <a href="imprimer.php" class="btn btn-primary">IMPRIMER LA LISTE</a>
		</div>
	</div>
</body>
</html>
<?php 
} 
else {
    header('Location: index.php');
}
?>
