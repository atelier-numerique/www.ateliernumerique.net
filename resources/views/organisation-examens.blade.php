<!doctype html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('img/oe-favicon.png') }}">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/cbfbfc2c41.js" crossorigin="anonymous"></script>
	
	<!-- custom.css -->
	<link href="css/custom.css" rel="stylesheet">

	<title>Organisation examens</title>
</head>
<body>
	
	<div id="examens" class="container">

		<div class="row font-monospace mt-2 mb-4">
			<div class="col-md-8 offset-md-2">
				<div class="text-center mt-3 mb-4"><img src="{{ asset('img/oe-logo.png') }}" width="100" /></div>
				<h1>Optimisation des créneaux d'examens en fonction de la répartition des matières des élèves<br />& création automatique des listes</h1>
				<div class="text-muted mt-1" style="font-size:90%;text-align:justify;">
					Exemple: minimiser le nombre de créneaux et optimiser la répartition des élèves pour un bac blanc de spécialités en Terminale. Le système utilise le principe de la <a href="https://fr.wikipedia.org/wiki/Coloration_de_graphe" target="_blank">coloration des graphes</a>. Le code Python est hébergé sur la <a href="https://forge.apps.education.fr/laurent.abbal/organisation-examens" target="_blank">forge du ministère de l'Éducation Nationale</a>.
				</div>
			</div>
		</div>
	
	
		<div class="row">
			<div class="col-md-7 mb-5">
				<h2>Mode d'emploi</h2>
				<div style="text-align:justify">
					Pour obtenir automatiquement les créneaux et les listes, il suffit de fournir la liste des élèves et de leurs matières. Les données doivent être au format CSV sur quatre colonnes et les en-têtes des colonnes doivent être nommés ainsi: 'nom', 'classe', 'matiere_1' et 'matiere_2'.
					<br />
					Exemple:
				</div>
<pre class="rounded mt-1 mb-2" style="background-color:#f1f1f1;padding:10px 10px 10px 20px;">nom,classe,matiere_1,matiere_2
eleve01,TA,SC. ECONO.& SOCIALES,MATHEMATIQUES
eleve02,TA,MATHEMATIQUES,NUMERIQUE SC.INFORM.
eleve03,TA,PHYSIQUE-CHIMIE,NUMERIQUE SC.INFORM.
...</pre>
				<div style="text-align:justify">Si les données sont dans un tableur, ce tableaur doit être exporté au format CSV. Il peut alors être ouvert avec un éditeur de texte.</div>
				<div>Deux possibilités pour fournir les données:</div>
				<ul class="mb-1">
					<li>indiquer le lien vers le fichier CSV si celui-ci est hébergé sur internet (site, forge, dépôt...)</li>
					<li>copier-coller les données au format CSV</li>
				</ul>
				<div>Les liens vers des fichiers Google Sheets partagés sont aussi acceptés.</div>
				<div class="text-break">Format:&nbsp;<span class="font-monospace small">https://docs.google.com/spreadsheets/d/1sgMPeFv5mZZbmJGLOgMnZhq_QGx90MFI4CZw7Wc/edit#gid=4135555</span></div>

				<h2 class="mt-3">Remarques</h2>
				<ul class="mb-1" style="text-align:justify">
					<li>Le système fournit une optimisation du nombre de créneaux en fonction des données. Il ne propose pas automatiquement un découpage des matières (création de plusieurs sujets) pour réduire le nombre de créneaux. Ce travail doit être fait à la main. Cependant, cela se fait facilement en étudiant le graphe obtenu et les liens d'incompatibilité entre les matières. Si une matière présente de nombreuses incompatibilités avec d'autres matières, il est possible de donner deux noms à la matière afin de simuler la création de deux sujets ('mathématiques1' et 'mathématiques2' par exemple). En répartissant ces deux noms en fonction des liens d'incompatibilité, le nombre de créneaux peut être réduit.</li>
					<li >Si vous ne souhaitez pas utiliser ce site parce que vous préférez travailler en local, vous pouvez récupérer le programme Python (fichier Python ou format <i>notebook</i>) qui est hébergé sur la <a href="https://forge.apps.education.fr/laurent.abbal/organisation-examens" target="_blank">forge du ministère de l'Éducation Nationale</a>.</li>
				</ul>
				<div class="mt-3">En cas de problème ou de question, vous pouvez écrire à <spann class="font-monospace">labbal@lfitokyo.org</span></div>
			</div>

			<div class="col-md-5">

				<form class="mb-4" action="{{ route('organisation-examens-post') }}" method="POST">
					@csrf
					<input type="hidden" name="type" value="url" />
					<div class="mb-1">
						<div class="fw-bold ms-1">Liens vers le fichier CSV</div>
						<div class="font-monospace ms-1" style="color:silver;font-size:80%;">Aucune donnée n'est concervée sur le serveur</div>
						<table>
							<tr>
								<td style="vertical-align:top;width:100%;padding-right:10px;">
									<input type="text" name="url" class="form-control font-monospace small @error('url') is-invalid @enderror" value="{{ old('url') }}" style="font-size:80%;">
									@error('url')
										<span class="invalid-feedback ms-1 font-monospace" style="font-size:75%;" role="alert">{{ $message }}</span>
									@enderror
								</td>
								<td style="vertical-align:top;"><button type="submit" class="btn btn-dark btn-sm"><i class="far fa-paper-plane"></i></button></td>
							</tr>
						</table>
						<div class="font-monospace mt-1 ms-1 fst-italic" style="color:silver;font-size:70%;">Exemple: https://www.ateliernumerique.net/data/csv_exemple.csv</div>
					</div>
				</form>

				<form class="mb-5" action="{{ route('organisation-examens-post') }}" method="POST">
					@csrf
					<input type="hidden" name="type" value="data" />
					<div class="mb-1">
						<div class="fw-bold ms-1">Copier-coller les données au format CSV</div>
						<div class="font-monospace ms-1" style="color:silver;font-size:80%;">Aucune donnée n'est concervée sur le serveur</div>
						<table>
							<tr>
								<td style="vertical-align:top;width:100%;padding-right:10px;">
									<textarea class="form-control font-monospace @error('csv_data') is-invalid @enderror" name="csv_data"  style="font-size:80%;min-height:500px;"></textarea>
									@error('csv_data')
										<span class="invalid-feedback ms-1 font-monospace" style="font-size:75%;" role="alert">{{ $message }}</span>
									@enderror
								</td>
								<td style="vertical-align:top;"><button type="submit" class="btn btn-dark btn-sm"><i class="far fa-paper-plane"></i></button></td>
							</tr>
						</table>
					</div>
				</form>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  </body>
</html>