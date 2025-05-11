<?php
$p11 = "Événements clés de l'histoire de l'informatique.";
$p21 = "Écriture d'un entier positif dans une base b>=2.";
$p22 = "Représentation binaire d'un entier relatif.";
$p23 = "Représentation approximative des nombres réels: notion de nombre flottant.";
$p24 = "Valeurs booléennes. Opérateurs booléens. Expressions booléennes.";
$p25 = "Représentation d'un texte en machine. Encodages ASCII, ISO-8859-1, Unicode.";
$p31 = "p-uplets, p-uplets nommés.";
$p32 = "Tableau indexé, tableau donné en compréhension.";
$p33 = "Dictionnaires par clés et valeurs.";
$p41 = "Indexation de tables.";
$p42 = "Recherche dans une table.";
$p43 = "Tri d'une table.";
$p44 = "Fusion de tables.";
$p51 = "Modalités de l'interaction entre l'homme et la machine. Événements.";
$p52 = "Interaction avec l'utilisateur dans une page Web.";
$p53 = "Interaction client-serveur. Requêtes HTTP, réponses du serveur.";
$p54 = "Formulaire d'une page Web.";
$p61 = "Modèle d'architecture séquentielle (von Neumann).";
$p62 = "Transmission de données dans un réseau: protocoles et architecture.";
$p63 = "Systèmes d'exploitation.";
$p64 = "Périphériques d'entrée et de sortie. Interface Homme-Machine (IHM).";
$p71 = "Constructions élémentaires.";
$p72 = "Diversité et unité des langages de programmation.";
$p73 = "Spécification.";
$p74 = "Mise au point de programmes.";
$p75 = "Utilisation de bibliothèques.";
$p81 = "Parcours séquentiel d'un tableau.";
$p82 = "Tris par insertion, par sélection.";
$p83 = "Algorithme des k plus proches voisins.";
$p84 = "Recherche dichotomique dans un tableau trié.";
$p85 = "Algorithmes gloutons.";
?>
<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/cc5dff2db9.js" crossorigin="anonymous"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<!-- custom.css -->
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

	<!-- Open Graph -->
	<meta property="og:title" content="L'Atelier Numérique" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="Outils Numériques pour les élèves et les enseignants" />
	<meta property="og:url" content="https://www.ateliernumerique.net/" />
	<meta property="og:image" content="https://www.ateliernumerique.net/img/opengraph_1200x630.png" />
	<meta property="og:image:alt" content="mon-oral.net" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@laurentabbal">
	<meta name="twitter:creator" content="@laurentabbal">
	<meta name="twitter:title" content="L'Atelier Numérique">
	<meta name="twitter:description" content="Outils Numériques pour les élèves et les enseignants">
	<meta name="twitter:image" content="https://www.ateliernumerique.net/img/opengraph_1200x630.png">
	
	<title>L'Atelier Numérique | Projet Art-léatoire 2022-2023</title>

</head>

<body>

	<div class="container mt-4">
		<div class="row">
			<div class="col-md-2">
				<a class="btn btn-light btn-sm" href="/" role="button"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>
				<a class="mt-2 btn btn-light btn-sm font-monospace" href="/art-leatoire-2023" role="button" style="display:block;width:100px;--bs-btn-padding-y:.2rem;--bs-btn-padding-x:.6rem;--bs-btn-font-size:.7rem;">édition 2023</a>
				<a class="mt-1 btn btn-light btn-sm font-monospace" href="/art-leatoire-2024" role="button" style="display:block;width:100px;--bs-btn-padding-y:.2rem;--bs-btn-padding-x:.6rem;--bs-btn-font-size:.7rem;">édition 2024</a>
				<a class="mt-1 btn btn-light btn-sm font-monospace" href="/art-leatoire-2025" role="button" style="display:block;width:100px;--bs-btn-padding-y:.2rem;--bs-btn-padding-x:.6rem;--bs-btn-font-size:.7rem;">édition 2025</a>
			</div>
			<div class="col-md-8 text-center">
				<h1><img src="{{ asset('img/ateliernumerique.svg') }}" width="400" alt="ATELIER NUMERIQUE" /></h1>
                <div class="mt-4 col-md-12 text-center font-monospace">PROJET ART-LÉATOIRE 2022-2023</div>
                <div class="col-md-12 text-center font-monospace small text-muted">Python + Pillow + Random</div>

				<span class="badge i24 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p24 ?>">2.4</span>
				<span class="badge i31 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p31 ?>">3.1</span>
				<span class="badge i32 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p32 ?>">3.2</span>
				<span class="badge i33 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p33 ?>">3.3</span>
				<span class="badge i71 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p71 ?>">7.1</span>
				<span class="badge i74 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p74 ?>">7.4</span>
				<span class="badge i75 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p75 ?>">7.5</span>
				<span class="badge i81 font-monospace" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $p81 ?>">8.1</span>

                <div class="mt-1 col-md-12 text-center font-monospace small" style="color:silver;">Première NSI du Lycée Français International de Tokyo</div>
			</div>
		</div>
	</div>

	<div class="container mb-5">
		
		<div class="row mb-5">

			<div class="row row-cols-1 row-cols-md-4 g-4">
				@php
					$gifs = glob(public_path()."/projet-artleatoire-2023/*.gif");
					shuffle($gifs);
				@endphp
				@foreach ($gifs as $gif)
				<div class="col">
					<div class="card h-100">
						<a href="/art-leatoire/2023/{{basename($gif)}}"><img src="{{ asset('projet-artleatoire-2023/'.basename($gif)) }}" class="card-img-top" alt="..."></a>
						<div class="card-body p-1 ps-2">
							<p class="card-text font-monospace small text-muted">{{ basename($gif, ".gif") }}</p>
						</div>
					</div>
				</div> 
				@endforeach  
			</div>

		</div>

		<div class="row mt-5">
			<div class="font-monospace">PROGRAMME</div>
			<div class="col-md-6">	

				<table class="font-monospace text-muted small" style="border-collapse:separate; border-spacing:2px;">
	
					<tr><td colspan="2" class="fw-bold">1. Histoire de l'informatique</td></tr>
					<tr><td><span class="item i11">1.1</span></td><td>{{$p11}}</td></tr>
					
					<tr><td colspan="2" class="fw-bold pt-2">2. Représentation des données: types et valeurs de base</td></tr>
					<tr><td><span class="item i21">2.1</span></td><td>{{ $p21 }}</td></tr>
					<tr><td><span class="item i22">2.2</span></td><td>{{ $p22 }}</td></tr>
					<tr><td><span class="item i23">2.3</span></td><td>{{ $p23 }}</td></tr>
					<tr><td><span class="item i24">2.4</span></td><td>{{ $p24 }}</td></tr>
					<tr><td><span class="item i25">2.5</span></td><td>{{ $p25 }}</td></tr>
					
					<tr><td colspan="2" class="fw-bold pt-2">3. Représentation des données: types construits</td></tr>
					<tr><td><span class="item i31">3.1</span></td><td>{{ $p31 }}</td></tr>
					<tr><td><span class="item i32">3.2</span></td><td>{{ $p32 }}</td></tr>
					<tr><td><span class="item i33">3.3</span></td><td>{{ $p33 }}</td></tr>
					
					<tr><td colspan="2" class="fw-bold pt-2">4. Traitement de données en tables</td></tr>
					<tr><td><span class="item i41">4.1</span></td><td>{{ $p41 }}</td></tr>
					<tr><td><span class="item i42">4.2</span></td><td>{{ $p42 }}</td></tr>
					<tr><td><span class="item i43">4.3</span></td><td>{{ $p43 }}</td></tr>
					<tr><td><span class="item i44">4.4</span></td><td>{{ $p44 }}</td></tr>	

					<tr><td colspan="2" class="fw-bold pt-2">5. Interactions entre l'homme et la machine sur le Web</td></tr>
					<tr><td><span class="item i51">5.1</span></td><td>{{ $p51 }}</td></tr>
					<tr><td><span class="item i52">5.2</span></td><td>{{ $p52 }}</td></tr>
					<tr><td><span class="item i53">5.3</span></td><td>{{ $p53 }}</td></tr>
					<tr><td><span class="item i54">5.4</span></td><td>{{ $p54 }}</td></tr>	

				</table>					

			</div>
			<div class="col-md-6">	

				<table class="font-monospace text-muted small" style="border-collapse:separate; border-spacing:2px;">

					<tr><td colspan="2" class="fw-bold pt-2">6. Architectures matérielles et systèmes d'exploitation</td></tr>
					<tr><td><span class="item i61">6.1</span></td><td>{{ $p61 }}</td></tr>
					<tr><td><span class="item i62">6.2</span></td><td>{{ $p62 }}</td></tr>
					<tr><td><span class="item i63">6.3</span></td><td>{{ $p63 }}</td></tr>
					<tr><td><span class="item i64">6.4</span></td><td>{{ $p64 }}</td></tr>

					<tr><td colspan="2" class="fw-bold pt-2">7. Langages et programmation</td></tr>
					<tr><td><span class="item i71">7.1</span></td><td>{{ $p71 }}</td></tr>
					<tr><td><span class="item i72">7.2</span></td><td>{{ $p72 }}</td></tr>
					<tr><td><span class="item i73">7.3</span></td><td>{{ $p73 }}</td></tr>
					<tr><td><span class="item i74">7.4</span></td><td>{{ $p74 }}</td></tr>
					<tr><td><span class="item i75">7.5</span></td><td>{{ $p75 }}</td></tr>


					<tr><td colspan="2" class="fw-bold pt-2">8. Algorithmique</td></tr>
					<tr><td><span class="item i81">8.1</span></td><td>{{ $p81 }}</td></tr>
					<tr><td><span class="item i82">8.2</span></td><td>{{ $p82 }}</td></tr>
					<tr><td><span class="item i83">8.3</span></td><td>{{ $p83 }}</td></tr>
					<tr><td><span class="item i84">8.4</span></td><td>{{ $p84 }}</td></tr>						
					<tr><td><span class="item i85">8.5</span></td><td>{{ $p85 }}</td></tr>	

				</table>

			</td>
		</div>		

	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		  return new bootstrap.Popover(popoverTriggerEl)
		})
		const myDefaultAllowList = bootstrap.Tooltip.Default.allowList
		// To allow table elements
		myDefaultAllowList.span = ['style']
	</script>

</body>
</html>
