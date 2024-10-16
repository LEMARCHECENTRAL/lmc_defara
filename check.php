<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEFARA LAB'S</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<?php 
			if (isset($_POST['submit'])) {
				$check = $_POST['code'];

				if (!empty($check)) {
					require_once 'include/db.php';
					$select = $db->prepare('SELECT * FROM checks WHERE code=?');
					$select->execute([$check]);
					$select->fetch();
					if ($select->rowCount() >= 1) {
						session_start();
						$_SESSION['checks'] = $select->fetch();
						header('Location: register.php'); 
					}else {
					?>
						<div class="alert alert-danger" role="alert">
   	 						Le Code de confirmation est incorrecte !
						</div>
					<?php
					}
				}else {
				?>
					<div class="alert alert-danger" role="alert">
   	 					Le champ Code doit être rempli !
					</div>
				<?php
				}
			}
		?>
		<h3 id="title">CONFIRMER INSCRIPTION</h3>
		<form method="POST">
			<div class="py-2">
				<label class="form-label">CODE DE CONFIRMATION</label>
				<input type="text" name="code" class="form-control" placeholder="0000000000LAB"/>
			</div>
			<div>
				<input type="submit" name="submit" value="CONFIRMER" class="btn btn-primary"/>
			</div>
		</form>
	</div>
</body>
</html>