<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.png">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/cbfbfc2c41.js" crossorigin="anonymous"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<!-- custom.css -->
	<link href="css/custom.css" rel="stylesheet">

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

    <title>Atelier Scratch</title>

    <style>
        html,body {
          height: 100%;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 10px 1fr;
            height:100%;
        }
        .gutter-col {
            grid-row: 1/-1;
            cursor: col-resize;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAeCAYAAADkftS9AAAAIklEQVQoU2M4c+bMfxAGAgYYmwGrIIiDjrELjpo5aiZeMwF+yNnOs5KSvgAAAABJRU5ErkJggg==');
            background-color: rgb(229, 231, 235);
            background-repeat: no-repeat;
            background-position: 50%;
        }
        .gutter-col-1 {
            grid-column: 2;
        }
        .video {
          aspect-ratio: 16 / 9;
          width: 100%;
        }
    </style>

</head>

<body>
	<?php
	$atelier = App\Models\Atelier::where('jeton', $jeton)->first();
	$lien_retour = ($atelier['lien_retour'] !== "") ? trim($atelier['lien_retour']) : '/';

	if ($atelier['gauche_type'] == 'video') {
		$gauche_iframe = preg_replace('/width\s*=\s*".*?"/', "", $atelier['gauche_input']);
		$gauche_iframe = preg_replace('/height\s*=\s*".*?"/', "", $gauche_iframe);
		$gauche_iframe = preg_replace('/class\s*=\s*".*?"/', "", $gauche_iframe);
		$gauche_iframe = preg_replace('/\s+/', " ", $gauche_iframe);
		$gauche_iframe = preg_replace('/<\s*iframe/', "<iframe class=\"video\"", $gauche_iframe);
	}
	if ($atelier['gauche_type'] == 'pdf') {
		$gauche_iframe = '<iframe src="https://docs.google.com/gview?url=' . $atelier['gauche_input'] . '&embedded=true" style="width:100%;height:100%;" frameborder="0"></iframe>';
	}
	if ($atelier['gauche_type'] == 'web') {
		$gauche_iframe = '<iframe src="' . $atelier['gauche_input'] . '" style="width:100%;height:100%;" frameborder="0"></iframe>';
	}

	// DROITE
	if ($atelier['droite_type'] == 'scratch') {
		$droite_iframe = '<iframe src="https://nuitducode.github.io/scratch/master/" style="border:none;width:100%;height:99%"></iframe>';
	}
	if ($atelier['droite_type'] == 'geogebra') {
		$droite_iframe = '<iframe src="https://www.geogebra.org/classic?lang=fr" style="border:none;width:100%;height:99%"></iframe>';
	}
	if ($atelier['droite_type'] == 'basthon') {
		$droite_iframe = '<iframe src="https://basthon.fr" style="border:none;width:100%;height:99%"></iframe>';
	}
	if ($atelier['droite_type'] == 'blockscad') {
		$droite_iframe = '<iframe src="https://www.blockscad3d.com/editor/" style="border:none;width:100%;height:99%" title="blockscad"></iframe>';
	}
	if ($atelier['droite_type'] == 'video') {
		$droite_iframe = preg_replace('/width\s*=\s*".*?"/', "", $atelier['droite_input']);
		$droite_iframe = preg_replace('/height\s*=\s*".*?"/', "", $droite_iframe);
		$droite_iframe = preg_replace('/class\s*=\s*".*?"/', "", $droite_iframe);
		$droite_iframe = preg_replace('/\s+/', " ", $droite_iframe);
		$droite_iframe = preg_replace('/<\s*iframe/', "<iframe class=\"video\"", $droite_iframe);
	}
	if ($atelier['droite_type'] == 'pdf') {
		$droite_iframe = '<iframe id="tuto_iframe" src="https://docs.google.com/gview?url=' . $atelier['droite_input'] . '&embedded=true" style="width:100%;height:100%" frameborder="0"></iframe>';
	}
	if ($atelier['droite_type'] == 'web') {
		$droite_iframe = '<iframe id="tuto_iframe" src="' . $atelier['droite_input'] . '" style="width:100%;height:100%;" frameborder="0"></iframe>';
	}
	?>
    <div class="grid">
        <div style="overflow-y:hidden;">
            <div id="gauche" style="height:100%;">

                <div id="gauche_description" class="container mt-4 mb-3">
                	<div class="row">
                		<div class="col-md-12 text-left">
							<a class="btn btn-download btn-xs" href="{{ $lien_retour }}" role="button"><i class="fas fa-arrow-left"></i></a>
							@if(trim($atelier['titre']) !== "")
							<div class="mt-3">{{ strtoupper(trim($atelier['titre'])) }}</div>
							@endif
							@if(trim($atelier['consignes']) !== "")
							<div class="mt-2 p-3" style="background-color:white;border:solid 1px silver;border-radius:4px">
								{!! trim($atelier['consignes']) !!}
							</div>
							@endif
                		</div>
                	</div>
                </div>

				<div id="gauche_content">{!! $gauche_iframe !!}</div>

            </div>
        </div>

        <div id="poignee" class="gutter-col gutter-col-1"></div>

        <div style="overflow-y:hidden;">{!! $droite_iframe !!}</div>
    </div>

    <script src="https://unpkg.com/split-grid/dist/split-grid.js"></script>
    <script>
	    Split({
	        minSize: 200,
	        columnGutters: [{
	            track: 1,
	            element: document.querySelector('.gutter-col-1'),
	        }],
	    })
    </script>

    <script>
		var gauche_h = document.getElementById('gauche').offsetHeight;
		var gauche_description_h = document.getElementById('gauche_description').offsetHeight;
		var gauche_content_h = gauche_h - gauche_description_h - 40;
		document.getElementById('gauche_content').setAttribute("style","overflow-y:hidden;height:"+gauche_content_h+"px");
		document.getElementById('poignee').addEventListener("mouseover",  function() {
			var gauche_h = document.getElementById('gauche').offsetHeight;
			var gauche_description_h = document.getElementById('gauche_description').offsetHeight;
			var gauche_content_h = gauche_h - gauche_description_h - 40;
			document.getElementById('gauche_content').setAttribute("style","overflow-y:hidden;height:"+gauche_content_h+"px");
		});
    </script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	</script>

</body>
</html>
