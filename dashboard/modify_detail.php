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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container">
		<?php
			require_once 'include/db.php';
			
			$select = $db->prepare('SELECT * FROM detail_commande WHERE id=?');
			$id = $_GET['id'];
			$select->execute([$id]);
			 
			$command = $select->fetch(PDO::FETCH_ASSOC);
				if (isset($_POST['modifier'])) {

					$numero = $_POST['numero'];
					$date = $_POST['date'];
					$nom = $_POST['nom_client'];
					$descriptions = $_POST['descriptions'];
					$montant = $_POST['montant'];
					$avance = $_POST['avance'];
					$reste = $_POST['reste'];
					$remarque = $_POST['remarque'];

					if (!empty($numero) && !empty($date) && !empty($nom) && !empty($descriptions) && !empty($montant) && !empty($avance) && !empty($reste) && !empty($remarque)) {
						$insert = $db->prepare('UPDATE detail_commande
						SET numero=?, dates=?, nom_client=?, descriptions=?, montant=?, avance=?, reste=?, remarque=? WHERE id=?');
						$insert->execute([$numero, $date, $nom, $descriptions, $montant, $avance, $reste, $remarque, $id]);
						header('Location: main.php');	
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
		<h3 id="title">MODIFIER COMMANDE</h3>
		<form method="POST">
			<div class="py-2">
				<label class="form-label">NUMERO</label>
				<input type="text" name="numero" class="form-control" value="<?= $command['numero'] ?>"/>
			</div>
            <div class="py-2">
				<label class="form-label">DATE</label>
				<input type="date" name="date" class="form-control" value="<?= $command['dates'] ?>"/>
			</div>
			<div class="py-2">
				<label class="form-label">NOM CLIENT</label>
				<input type="text" name="nom_client" class="form-control" value="<?= $command['nom_client'] ?>"/>
			</div>
			<div class="py-2">
				<label class="form-label">DESCRIPTION COMMANDE</label>
				<textarea name="descriptions" class="form-control"><?= $command['descriptions'] ?></textarea>
			</div>
            <div id="groups">
                <div class="py-2">
                    <label class="form-label">MONTANT</label>
                    <input type="text" name="montant" class="form-control" value="<?= $command['montant'] ?>"/>
                </div>
                <div class="py-2">
                    <label class="form-label">AVANCE</label>
                    <input type="text" name="avance" class="form-control" value="<?= $command['avance'] ?>"/>
                </div>
                <div class="py-2">
                    <label class="form-label">RESTE</label>
                    <input type="text" name="reste" class="form-control" value="<?= $command['reste'] ?>"/>
                </div>
            </div>
            <div class="py-2">
				<label class="form-label">REMARQUE</label>
				<input type="text" name="remarque" class="form-control" value="<?= $command['remarque'] ?>"/>
			</div>
	
			<div class="my-2">
				<input type="submit" name="modifier" value="MODIFIER COMMANDE" class="btn btn-primary"/>
				<a href="main.php" class="btn btn-primary">RETOUR</a>
			</div>
		</form>
	</div>
</body>
</html> 
<?php 
} 
else {
    header('Location: index.php');
}
?>