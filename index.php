<!DOCTYPE html>
<head>
	<title>PHP - Calculate Electricity Bill</title>
</head>

<?php
//creation de la variable pour recuperer le resultat du calcul de la facture
$resultat_string = $resultat = '';
if (isset($_POST['submit'])) {
    //creation d'une variable $unités pour recuperer  le name de l'unité de facture rentrer par l'utilisateur
    $unités = $_POST['unités'];
    //ici on verifi si l'unité n'est pas vide et on recupère le resultat du calcul dans la fonction calculer_bill($unités);
    if (!empty($unités)) {
        $resultat = calculer_bill($unités);
        $resultat_string = 'Montant total de ' . $unités . ' : ' . $resultat;
    }
}
/**
 *  calcule de  la facture d'électricité selon le coût unitaire
 */
function calculer_bill($unités){
    $premier_coût_unitaire = 3.50;
    $second_cout_unitaire= 4.00;
    $troisième_cout_unitaire = 5.20;
    $quartrième_cout_unitaire = 6.50;

    if($unités <= 50) {
        $facture = $unités * $premier_coût_unitaire;
    }
    else if($unités > 50 && $unités <= 100) {
        $temp = 50 * $premier_coût_unitaire;
        $runités_restantes = $unités - 50;
        $facture = $temp + ($runités_restantes * $second_cout_unitaire);
    }
    else if($unités > 100 && $unités <= 200) {
        $temp = (50 * 3.5) + (100 * $second_cout_unitaire);
        $runités_restantes = $unités - 150;
        $facture = $temp + ($runités_restantes * $troisième_cout_unitaire);
    }
    else {
        $temp = (50 * 3.5) + (100 * $second_cout_unitaire) + (100 * $troisième_cout_unitaire);
        $runités_restantes = $unités - 250;
        $facture = $temp + ($runités_restantes * $quartrième_cout_unitaire);
    }
    return number_format((float)$facture, 2, '.', '');
}

?>

<body>

	<div id="page-wrap">
		<h1>Php - Calculate Electricity Bill</h1>

		<form action="" method="post" id="quiz-form">
            	<input type="number" name="unités" id="unités"  />
            	<input type="submit" name="submit" id="submit" value="Submit" />
		</form>

		<div>
		    <?php echo '<br />' . $resultat_string; ?>
		</div>
	</div>
</body>
</html>