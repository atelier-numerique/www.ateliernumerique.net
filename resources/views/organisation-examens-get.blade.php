<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js"></script>
	<title>Organisation examens</title>
  </head>
  <body>

	
	<?php
	$csv_data = file_get_contents('https://forge.apps.education.fr/laurent.abbal/organisation-examens/-/raw/main/data_exemple.csv');
	//echo $csv_data;
	
	
// Lire les lignes du CSV
$lines = str_getcsv($csv_data, "\n");

// Vérifier le nombre de colonnes dans la première ligne (en-têtes)
$headers = str_getcsv($lines[0], ",");

// Vérifier si les en-têtes correspondent à vos critères
$expectedHeaders = ['nom', 'classe', 'matiere_1', 'matiere_2'];

if (count($headers) === count($expectedHeaders) && array_diff($headers, $expectedHeaders) === []) {
    echo "Le fichier CSV a les en-têtes attendus.\n";
    // Vous pouvez maintenant traiter le reste du fichier CSV si nécessaire
} else {
    echo "Le fichier CSV ne correspond pas aux critères.\n";
}	

$csv_data_64 = base64_encode($csv_data);
	
	
	
	$url_gsheets = '';


	// Définir le motif regex
	$pattern = '/\/d\/([^\/]+)\/edit/';

	// Rechercher la correspondance dans l'URL
	if (preg_match($pattern, $url_gsheets, $matches)) {
		// La partie que vous recherchez est dans $matches[1]
		$tableaur_id = $matches[1];
		echo "Résultat: $tableaur_id\n";
	} else {
		echo "Aucune correspondance trouvée.\n";
	}
	
	// Utiliser une expression régulière pour extraire la partie après "gid="
	$pattern = '/gid=([0-9]+)/';
	preg_match($pattern, $url_gsheets, $matches);

	// La partie après "gid=" est dans $matches[1]
	if (isset($matches[1])) {
		$feuille_id = $matches[1];
		echo "La partie après gid= : $feuille_id";
	} else {
		echo "Aucune correspondance trouvée pour gid=";
	}
	
	
	?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  </body>
</html>