<?php

    use Dompdf\Dompdf; 
    use Dompdf\Options;

    require_once 'include/db.php';

    $select = $db->query('SELECT * FROM detail_commande');

    $data = $select->fetchAll();

    ob_start();
    require_once 'imprimer.php';
    $html = ob_get_contents();
    ob_end_clean();

    require_once 'dompdf/autoload.inc.php';
    
    $options = new Options();
    $options->set('defaultFont', 'Courier');

    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $fichier = 'liste-des-commandes.pdf';

    $dompdf->stream($fichier);

    header('Location: main.php');

?>