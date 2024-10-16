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
			if (isset($_POST['submit'])) {
				$numero = $_POST['numero'];
				$date = $_POST['date'];
				$nom = $_POST['nom_client'];
				$descriptions = $_POST['descriptions'];
				$montant = $_POST['montant'];
				$avance = $_POST['avance'];
				$reste = $_POST['reste'];
				$remarque = $_POST['remarque'];

				if (!empty($numero) && !empty($date) && !empty($nom) && !empty($descriptions) && !empty($montant) && !empty($avance) && !empty($reste) && !empty($remarque)) {
					$insert = $db->prepare('INSERT INTO detail_commande(numero, dates, nom_client, descriptions, montant, avance, reste, remarque) 
					VALUES(?,?,?,?,?,?,?,?)');
					$insert->execute([$numero, $date, $nom, $descriptions, $montant, $avance, $reste, $remarque]);
				?>
					<div class="alert alert-success" role="alert">
						La commande de <?= $nom ?> a bien été enregistrer !
					</div>
				<?php		
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
		<h3 id="title">AJOUTER COMMANDE</h3>
		<form method="POST">
			<div class="py-2">
				<label class="form-label">NUMERO</label>
				<input type="text" name="numero" class="form-control"/>
			</div>
            <div class="py-2">
				<label class="form-label">DATE</label>
				<input type="date" name="date" class="form-control"/>
			</div>
			<div class="py-2">
				<label class="form-label">NOM CLIENT</label>
				<input type="text" name="nom_client" class="form-control"/>
			</div>
			<div class="py-2">
				<label class="form-label">DESCRIPTION COMMANDE</label>
				<textarea name="descriptions" class="form-control"></textarea>
			</div>
            <div id="groups">
                <div class="py-2">
                    <label class="form-label">MONTANT</label>
                    <input type="text" name="montant" class="form-control" placeholder="00"/>
                </div>
                <div class="py-2">
                    <label class="form-label">AVANCE</label>
                    <input type="text" name="avance" class="form-control" placeholder="00"/>
                </div>
                <div class="py-2">
                    <label class="form-label">RESTE</label>
                    <input type="text" name="reste" class="form-control" placeholder="00"/>
                </div>
            </div>
            <div class="py-2">
				<label class="form-label">REMARQUE</label>
				<input type="text" name="remarque" class="form-control"/>
			</div>
	
			<div class="my-2">
				<input type="submit" name="submit" value="AJOUTER COMMANDE" class="btn btn-primary"/>
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