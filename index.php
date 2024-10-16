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
			if (isset($_POST['submit'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];

				if (!empty($username) && !empty($password)) {
					if ($username == "admin") {
						require_once 'include/db.php';
						$select = $db->prepare('SELECT * FROM utilisateur WHERE usernames=? AND passwords=?');
						$select->execute([$username, $password]);
						$select->fetch();
						if ($select->rowCount() >= 1) {
							session_start();
							$_SESSION['utilisateur'] = $select->fetch();
							header('Location: dashboard.php'); 
						}else {
						?>
							<div class="alert alert-danger" role="alert">
								Nom Utilisateur ou Mot De Passe incorrecte !
							</div>
						<?php
						}
					}else {
						require_once 'include/db.php';
						$select = $db->prepare('SELECT * FROM utilisateur WHERE usernames=? AND passwords=?');
						$select->execute([$username, $password]);
						$select->fetch();
						if ($select->rowCount() >= 1) {
							session_start();
							$_SESSION['utilisateur'] = $select->fetch();
							header('Location: main.php'); 
						}else {
						?>
							<div class="alert alert-danger" role="alert">
								Nom Utilisateur ou Mot De Passe incorrecte !
							</div>
						<?php
						}
					}
				}else {
				?>
					<div class="alert alert-danger" role="alert">
   	 					Tous les champs doivent être rempli !
					</div>
				<?php
				}
			}
		?>
		<h3 id="title">CONNEXION</h3>
		<form method="POST">
			<div class="py-2">
				<label class="form-label">NOM UTILISATEUR</label>
				<input type="text" name="username" class="form-control" placeholder="DAFARALAB"/>
			</div>
			<div class="py-2">
				<label class="form-label">MOT DE PASSE</label>
				<input type="password" name="password" class="form-control" placeholder="********"/>
			</div>
			<div>
				<input type="submit" name="submit" value="CONNEXION" class="btn btn-primary"/>
			</div>
		</form>
		<div class="py-2">
			<div class="text-body-secondary"><a href="check.php">INSCRIPTION !</a></div>
		</div>

	</div>
</body>
</html>