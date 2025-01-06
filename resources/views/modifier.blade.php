<?php
/*
<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/cbfbfc2c41.js" crossorigin="anonymous"></script>

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

	<title>L'Atelier Numérique | Modifier</title>

</head>

<body>

	<div class="container mt-3 mb-5">

		<div class="row mb-3">

			<div class="col-md-10 offset-md-2 mb-4">
		        <?php
		        if (isset($_GET['m'])) {
		            $atelier = App\Models\Atelier::where('jeton', $_GET['m'])->first();
		            if ($atelier == NULL OR in_array($_GET['m'], ['4WMPL6','ED23TF','GF3YPT','WVHS7Z','69ZWPJ','32QZGE','Z4BWPD','P9LGBX','REYZM4','SBVFUE','5VY9PJ','Q2HXEV','ZMDQCX','BFL2TW'])){
						?>
						<div class="col-md-12 mt-3 text-center font-monospace">
							Cet atelier n'existe pas ou ne peut pas être modifié.<br /><br />
							<a class="btn btn-secondary btn-sm font-monospace" href="/" role="button">QUITTER</a>
						</div>
						</div>
						</div>
						</div>
						</body>
						</html>
						<?php
						exit;
					} else {
						$infos_video = "
						<div><b>PeerTube</b></div>
						<ul>
						<li>ouvrir la vidéo</li>
						<li>cliquer sur <i class='fas fa-share-alt'></i></li>
						<li>facultatif : paramétrer la vidéo (début, fin, options...)</i></li>
						<li>copier le code <span class='font-monospace'>iframe</span></i></li>
						<li>coller le code sans le modifier ci-dessous</i></li>
						</ul>
						<div><b>Digiplay</b></div>
						<ul>
						<li>ouvrir la vidéo</li>
						<li>cliquer sur <i class='fas fa-share-alt'></i></li>
						<li>copier le code <span class='font-monospace'>iframe</span></i></li>
						<li>coller le code sans le modifier ci-dessous</i></li>
						</ul>
						<div><b>YouTube</b></div>
						<ul>
						<li>ouvrir la vidéo</li>
						<li>cliquer sur <i class='fas fa-share'></i></li>
						<li>cliquer sur <i class='fas fa-chevron-left'></i><i class='fas fa-chevron-right'></i></li>
						<li>facultatif : paramétrer la vidéo (début, fin, options...)</li>
						<li>copier le code <span class='font-monospace'>iframe</span></li>
						<li>coller le code sans le modifier ci-dessous</i></li>
						</ul>
						Suivre une démarche similaire pour les autres services de vidéos.
						";
		            	?>

		              	<form class="row" action="{{ route('modifier-atelier-post') }}" method="POST">

			                @csrf

	      					<div class="col-md-6">
	      						<div class="p-3 h-100" style="border:solid 1px silver;border-radius:4px">

									<div class="mb-2 text-center text-danger">PARTIE GAUCHE</div>

									<div class="mb-2">
										<input id="g_video" name="g_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="g_video" @if($atelier['gauche_type'] == 'video') checked @endif />
										<label for="g_video" class="form-check-label">Vidéo </label>	<sup data-bs-container="body" data-bs-html="true" data-bs-trigger="hover focus" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{!! $infos_video !!}"><i class="fas fa-question-circle"></i></sup>

										@if($atelier['gauche_type'] == 'video')
											<div class="ms-3">
												<textarea id="g_video_input" name="gauche" class="form-control font-monospace" rows="7" style="font-size:0.875rem;">{{ $atelier['gauche_input'] }}</textarea>
											</div>
										@else
											<div class="ms-3">
												<textarea id="g_video_input" name="gauche" class="form-control font-monospace" rows="7" style="font-size:0.875rem;display:none"></textarea>
											</div>
										@endif

									</div>

									<div class="mb-2">
										<input id="g_pdf" name="g_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="g_pdf" @if($atelier['gauche_type'] == 'pdf') checked @endif />
										<label for="g_pdf" class="form-check-label">PDF</label>

										@if($atelier['gauche_type'] == 'pdf')
											<div id="g_pdf_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:block">l'adresse doit être en https</div>
											<div class="ms-3">
												<input id="g_pdf_input" name="gauche" class="form-control form-control-sm font-monospace" type="text" value="{{ $atelier['gauche_input'] }}" />
											</div>
										@else
											<div id="g_pdf_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
											<div class="ms-3">
												<input id="g_pdf_input" name="gauche" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse du document pdf" disabled />
											</div>
										@endif

									</div>

									<div>
										<input id="g_web" name="g_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="g_web" @if($atelier['gauche_type'] == 'web') checked @endif />
										<label for="g_web" class="form-check-label">Page web</label>

										@if($atelier['gauche_type'] == 'web')
											<div id="g_web_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:block">l'adresse doit être en https</div>
											<div class="ms-3">
												<input id="g_web_input" name="gauche" class="form-control form-control-sm font-monospace" type="text" value="{{ $atelier['gauche_input'] }}" />
											</div>
										@else
											<div id="g_web_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
											<div class="ms-3">
												<input id="g_web_input" name="gauche" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse de la page" disabled />
											</div>
										@endif

	      							</div>

	      						</div>
			      			</div>

	      					<div class="col-md-6">
	      						<div class="p-3 h-100" style="border:solid 1px silver;border-radius:4px">

	                                  <div class="mb-2 text-center text-danger">PARTIE DROITE</div>

									<div class="mb-2">
									<input id="d_scratch" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_scratch" @if($atelier['droite_type'] == 'scratch') checked @endif />
									<label for="d_scratch" class="form-check-label">Scratch</label>
									</div>

									<div class="mb-2">
									<input id="d_geogebra" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_geogebra" @if($atelier['droite_type'] == 'geogebra') checked @endif />
									<label for="d_geogebra" class="form-check-label">GeoGebra</label>
									</div>

									<div class="mb-2">
									<input id="d_basthon" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_basthon" @if($atelier['droite_type'] == 'basthon') checked @endif />
									<label for="d_basthon" class="form-check-label">Basthon</label>
									</div>

									<div class="mb-2">
									<input id="d_blockscad" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_blockscad" @if($atelier['droite_type'] == 'blockscad') checked @endif />
									<label for="d_blockscad" class="form-check-label">BlocksCAD</label>
									</div>

									<div class="mb-2">
  										<input id="d_video" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_video" @if($atelier['droite_type'] == 'video') checked @endif />
  										<label for="d_video" class="form-check-label">Vidéo</label> <sup data-bs-container="body" data-bs-html="true" data-bs-trigger="hover focus" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{!! $infos_video !!}"><i class="fas fa-question-circle"></i></sup>

  										@if($atelier['droite_type'] == 'video')
  											<div class="ms-3">
  												<textarea id="d_video_input" name="droite" class="form-control font-monospace" rows="7" style="font-size:0.875rem;">{{ $atelier['droite_input'] }}</textarea>
  											</div>
  										@else
  											<div class="ms-3">
  												<textarea id="d_video_input" name="droite" class="form-control font-monospace" rows="7" style="font-size:0.875rem;display:none"></textarea>
  											</div>
  										@endif

  									</div>

  									<div class="mb-2">
  										<input id="d_pdf" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_pdf" @if($atelier['droite_type'] == 'pdf') checked @endif />
  										<label for="d_pdf" class="form-check-label">PDF</label>

  										@if($atelier['droite_type'] == 'pdf')
  											<div id="d_pdf_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:block">l'adresse doit être en https</div>
  											<div class="ms-3">
  												<input id="d_pdf_input" name="droite" class="form-control form-control-sm font-monospace" type="text" value="{{ $atelier['droite_input'] }}" />
  											</div>
  										@else
  											<div id="d_pdf_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
  											<div class="ms-3">
  												<input id="d_pdf_input" name="droite" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse du document pdf" disabled />
  											</div>
  										@endif

  									</div>

  									<div>
  										<input id="d_web" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_web" @if($atelier['droite_type'] == 'web') checked @endif />
  										<label for="d_web" class="form-check-label">Page web</label>

  										@if($atelier['droite_type'] == 'web')
  											<div id="d_web_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:block">l'adresse doit être en https</div>
  											<div class="ms-3">
  												<input id="d_web_input" name="droite" class="form-control form-control-sm font-monospace" type="text" value="{{ $atelier['droite_input'] }}" />
  											</div>
  										@else
  											<div id="d_web_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
  											<div class="ms-3">
  												<input id="d_web_input" name="droite" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse de la page" disabled />
  											</div>
  										@endif

  	      							</div>

	      						</div>
	      					</div>

	                        <div class="col-md-12">

	      						<div class="mt-3 p-3" style="border:solid 1px silver;border-radius:4px">
	                                  <p class="text-success font-monospace small">optionnel</p>
	                                  <div class="mb-3">
	                                      <label for="titre" class="form-label">Titre</label>
	                                      <input id="titre" name="titre" type="text" class="form-control" value="<?php if (isset($atelier['titre'])) echo $atelier['titre'] ?>" />
	                                  </div>
	                                  <div class="mb-3">
	                                      <label for="consignes" class="form-label">Consignes</label>
	                                      <textarea id="consignes" name="consignes" class="form-control" rows="4"><?php if (isset($atelier['consignes'])) echo $atelier['consignes'] ?></textarea>
	                                  </div>
	                                  <div class="mb-3">
	                                      <label for="lien_retour" class="form-label m-0">Lien retour</label>
	                                      <div class="text-muted small font-monospace">lien vers un site de votre choix pour le bouton retour</div>
	                                      <input id="lien_retour" name="lien_retour" type="text" class="form-control" value = "<?php if (isset($atelier['lien_retour'])) echo $atelier['lien_retour'] ?>" />
	                                  </div>
	      						</div>

	      					</div>

							<input id="jeton" name="jeton" type="hidden" value = "{{ $atelier['jeton'] }}" />

	      					<div class="col-md-12 mt-3 text-center font-monospace">
	      						<button type="submit" name="creer_lien" value="ok" class="btn btn-success btn-sm">ENREGISTRER</button>
								<a class="btn btn-light btn-sm font-monospace" href="/" role="button">QUITTER</a>
	      					</div>

		      			</form>

		            <?php
		            }
		        }
		        ?>
			</div>
		</div>

	</div>

	<script>
	function input_status(name){
		console.log(name);
		for (const element of document.getElementsByClassName("radio_input")){
			if (element.id.substring(0, 2) == name){
				console.log(element.id.substring(0, 2));
				if (element.checked == true){
			        if(document.getElementById(element.id+'_input')) document.getElementById(element.id+'_input').style.display = "block";
			        if(document.getElementById(element.id+'_info')) document.getElementById(element.id+'_info').style.display = "block";
			        if(document.getElementById(element.id+'_input')) document.getElementById(element.id+'_input').disabled = false;
				} else {
					if(document.getElementById(element.id+'_input')) document.getElementById(element.id+'_input').style.display = "none";
					if(document.getElementById(element.id+'_info')) document.getElementById(element.id+'_info').style.display = "none";
            		if(document.getElementById(element.id+'_input')) document.getElementById(element.id+'_input').disabled = true;
				}
			}
		}
	}
	</script>

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
	</script>

</body>
</html>
*/?>
