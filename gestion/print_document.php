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
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css"> -->
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        } 
        a{
            text-decoration: none;
        }
        h3{
            text-align: center;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
        .btn {
            transition: none;
        }
        }

        .btn:hover {
            color: #212529;
            text-decoration: none;
        }

        .btn:focus, .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn.disabled, .btn:disabled {
        opacity: 0.65;
        }
        a.btn.disabled,
        fieldset:disabled a.btn {
        pointer-events: none;
        }

        .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        }

        .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
        }

        .btn-primary:focus, .btn-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .btn-primary.disabled, .btn-primary:disabled {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #0062cc;
        border-color: #005cbf;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
    </style>
</head>
<body>
	<div class="container">
		<h3>LISTE DES COMMANDES</h3>
        <table border="1">
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
                </tr> 
                <?php
                }
            ?>
            </tbody>
        </table>
        <br>
        <div>
            <a href="genpdf.php" class="btn btn-primary">IMPRIMER</a>
            <!-- <a href="dashboard.php" class="btn btn-primary">RETOUR</a> -->
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
