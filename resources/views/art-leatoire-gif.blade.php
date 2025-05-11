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
	
	<title>L'Atelier Numérique | Projet Art-léatoire GIF</title>
	
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-1 pt-5">
				<a class="btn btn-light btn-sm" href="/art-leatoire-{{$annee}}" role="button"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>
			</div>
			<div class="col-md-10 text-center vh-100 p-5">
				<img src="{{ asset('projet-artleatoire-'.$annee.'/'.$gif) }}" class="img-fluid rounded h-100" style="object-fit: contain;"  alt="...">
			</div>
		</div>
	</div>	

</body>
</html>
