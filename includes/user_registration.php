<?php 
    session_start();
    if(isset($_SESSION['checks'])) {
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
</head>
<body>
	<div class="container">
		<?php
			require_once 'include/db.php';
			if (isset($_POST['submit'])) {
                $prenom = $_POST['prenom'];
				$nom = $_POST['nom'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$confirm = $_POST['confirm'];

				if (!empty($prenom) && !empty($nom) && !empty($username) && !empty($password) && !empty($confirm)) {
					$select = $db->prepare('SELECT * FROM utilisateur WHERE usernames=?');
					$select->execute([$username]);
					$data = $select->fetchColumn();
					if ($data > 0) {
					?>
						<div class="alert alert-danger" role="alert">
							Le nom d'utilisateur est déjà prit !
						</div>	
					<?php
					}
					else{
						if ($password == $confirm) {
							$insert = $db->prepare('INSERT INTO utilisateur(prenom, nom, usernames, passwords) VALUES(?,?,?,?)');
							$insert->execute([$prenom, $nom, $username, $password]);
						?>
							<div class="alert alert-success" role="alert">
								Inscription réussie !
							</div>
						<?php
						}
						else{
							?>
							<div class="alert alert-danger" role="alert">
								Les deux mots de passe ne correspondent pas !
							</div>
						<?php
						}
					}		
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
		<h3 id="title">INSCRIPTION</h3>
		<form method="POST">
			<div class="py-2">
				<label class="form-label">PRENOM</label>
				<input type="text" name="prenom" class="form-control" placeholder="DAFARA" id="prenom"/>
			</div>
            <div class="py-2">
				<label class="form-label">NOM</label>
				<input type="text" name="nom" class="form-control" placeholder="LAB" id="nom"/>
			</div>
			<div class="py-2">
				<label class="form-label">NOM UTILISATEUR</label>
				<input type="text" name="username" class="form-control" readonly placeholder="Le nom d'utilisateur sera généré" id="nomutilisateur"/>
			</div>
			<div class="py-2">
				<label class="form-label">MOT DE PASSE</label>
				<input type="password" name="password" class="form-control" placeholder="********"/>
			</div>
			<div class="py-2">
				<label class="form-label">CONFIRMER MOT DE PASSE</label>
				<input type="password" name="confirm" class="form-control" placeholder="********"/>
			</div>
	
			<div class="my-2">
				<input type="submit" name="submit" value="INSCRIPTION" class="btn btn-primary"/>
			</div>
		</form>
		<p class="text-body-secondary py-2"><a href="index.php">CONNECTEZ VOUS !</a></p>
	</div>
</body>


<script>
    const prenomInput = document.getElementById('prenom');
    const nomInput = document.getElementById('nom');
    const nomUtilisateurInput = document.getElementById('nomutilisateur');

    function generateUsername() {
        const prenom = prenomInput.value.toLowerCase();
        const nom = nomInput.value.toLowerCase();
        nomUtilisateurInput.value = (prenom + '' + nom).replaceAll(' ', '');
    }

    prenomInput.addEventListener('input', generateUsername);
    nomInput.addEventListener('input', generateUsername);
</script>
</html> 
<?php 
} 
else {
    header('Location: index.php');
}
?>