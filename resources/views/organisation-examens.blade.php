<!doctype html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('img/oe-favicon.png') }}">

	<!-- Bootstrap -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="{{ asset('lib/fontawesome/css/all.min.css') }}" rel="stylesheet">
	
	<!-- custom.css -->
	<link href="css/custom.css" rel="stylesheet">

	<!-- Open Graph -->
	<meta property="og:title" content="Organisation d'examens" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="Optimisation des créneaux d'examens en fonction de la répartition des matières des élèves & création automatique des listes" />
	<meta property="og:url" content="https://www.ateliernumerique.net/organisation-examens/" />
	<meta property="og:image" content="https://www.ateliernumerique.net/img/oe-opengraph.png" />
	<meta property="og:image:alt" content="L'Atelier Numérique" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@lateliernum">
	<meta name="twitter:creator" content="@lateliernum">
	<meta name="twitter:title" content="Organisation d'examens">
	<meta name="twitter:description" content="Optimisation des créneaux d'examens en fonction de la répartition des matières des élèves & création automatique des listes">
	<meta name="twitter:image" content="https://www.ateliernumerique.net/img/oe-opengraph.png">	

	<!-- Matomo -->
	<script>
	  var _paq = window._paq = window._paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
		var u="//www.awame.net/matomo/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '11']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<!-- End Matomo Code -->	

	<title>Organisation examens</title>
</head>
<body>
	
	<div id="examens" class="container">

		<div class="text-center mt-3 mb-5"><a href="/organisation-examens"><img src="{{ asset('img/oe-logo.png') }}" width="100" /></a></div>

		<div class="row font-monospace mt-2 mb-4">
			<div class="col-md-8 offset-md-2">
				<h1>Optimisation des créneaux d'examens en fonction de la répartition des matières des élèves & création automatique des listes</h1>
				<div class="text-muted mt-1" style="font-size:90%;text-align:justify;">
					Exemple: minimiser le nombre de créneaux et optimiser la répartition des élèves pour un bac blanc de spécialités en Terminale. Le système utilise le principe de la <a href="https://fr.wikipedia.org/wiki/Coloration_de_graphe" target="_blank">coloration des graphes</a>. Le code Python est hébergé sur la <a href="https://forge.apps.education.fr/laurent.abbal/organisation-examens" target="_blank">forge du ministère de l'Éducation Nationale</a>.
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-7 mb-5">
				<h2>Mode d'emploi</h2>
				<h3>Formatage des données</h3>
				<div style="text-align:justify">
					Pour obtenir automatiquement les créneaux et les listes, il suffit de fournir la liste des élèves et de leurs matières. Les données doivent être sur quatre colonnes et les en-têtes des colonnes doivent être nommés ainsi: 'nom', 'classe', 'matiere_1' et 'matiere_2'.
				</div>
				<div style="text-align:justify">
					Si les données sont dans un tableur, ce tableaur doit être exporté au format CSV. Il peut alors être ouvert avec un éditeur de texte.
					<br />
					Exemple:
				</div>
<pre class="rounded mt-1 mb-2" style="background-color:#f1f1f1;padding:10px 10px 10px 20px;">nom,classe,matiere_1,matiere_2
eleve01,TA,SC. ECONO.& SOCIALES,MATHEMATIQUES
eleve02,TA,MATHEMATIQUES,NUMERIQUE SC.INFORM.
eleve03,TA,PHYSIQUE-CHIMIE,NUMERIQUE SC.INFORM.
...</pre>
				
				<h3 class="mt-3">Tableurs en ligne</h3>
				<div style="text-align:justify">Il est possible d'utiliser des tableurs en ligne comme <a href="https://framacalc.org" target="_blank">Framacalc</a>, <a href="https://ethercalc.net" target="_blank">Ethercalc</a> ou <a href="https://doc.new/" target="_blank">Google Sheets</a>. Cette solution est la plus souple car la convertion en CSV est automatique. De plus, elle permet de faire des modifications et de relancer l'analyse des données en un clic ("recharger le fichier").</div>
				<h3 class="mt-3">Données</h3>
				<div>Deux possibilités donc pour fournir les données:</div>
				<ul class="mb-1">
					<li>indiquer l'adresse du tableur en ligne (copier-coller l'adresse qui est dans la barre d'adresse) ou le lien vers le fichier CSV si celui-ci est hébergé sur internet (site, forge, dépôt...)</li>
					<li>copier-coller les données au format CSV</li>
				</ul>
				<h3 class="mt-3">Remarques</h3>
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
						<div class="fw-bold ms-1">Liens le tableur en ligne ou le fichier CSV</div>
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
						<div class="font-monospace mt-1 ms-1 fst-italic" style="color:silver;font-size:70%;">Exemple de fichier CSV: https://www.ateliernumerique.net/data/csv_exemple.csv</div>
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

	<script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
	
  </body>
</html>