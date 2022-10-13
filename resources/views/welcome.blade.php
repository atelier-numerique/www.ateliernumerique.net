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

	<title>L'Atelier Numérique</title>

</head>

<body>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><img src="{{ asset('img/ateliernumerique.svg') }}" width="400" alt="ATELIER NUMERIQUE" /></h1>
				<div class="mt-2">
					<a href="https://github.com/atelier-numerique/www.ateliernumerique.net/discussions" target="_blank" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="discussions"><svg viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill="#3674a9" d="M1.5 2.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-3.5a.75.75 0 00-.53.22L3.5 11.44V9.25a.75.75 0 00-.75-.75h-1a.25.25 0 01-.25-.25v-5.5zM1.75 1A1.75 1.75 0 000 2.75v5.5C0 9.216.784 10 1.75 10H2v1.543a1.457 1.457 0 002.487 1.03L7.061 10h3.189A1.75 1.75 0 0012 8.25v-5.5A1.75 1.75 0 0010.25 1h-8.5zM14.5 4.75a.25.25 0 00-.25-.25h-.5a.75.75 0 110-1.5h.5c.966 0 1.75.784 1.75 1.75v5.5A1.75 1.75 0 0114.25 12H14v1.543a1.457 1.457 0 01-2.487 1.03L9.22 12.28a.75.75 0 111.06-1.06l2.22 2.22v-2.19a.75.75 0 01.75-.75h1a.25.25 0 00.25-.25v-5.5z"></path></svg></a>
					<a href="https://github.com/atelier-numerique/www.ateliernumerique.net/issues" target="_blank" class="ms-2"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="signalement de bogue"><svg viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill="#3674a9" d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill="#3674a9" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg></a>
				</div>
			</div>
		</div>
	</div>

    <?php

    // SUMMARY
    if (isset($_GET['j'])) {
        $atelier = App\Models\Atelier::where('jeton', $_GET['j'])->first();
        ?>
        <div class="container mb-5">

    		<div class="row mt-5">
    			<div class="col-md-6 offset-md-3">
                    <div class="font-monospace small text-muted">copier-coller les données ci-dessous afin de les conserver</div>
                    <div class="p-3 mb-3" style="background-color:white;border:solid 1px silver;border-radius:4px">

                        @if (isset($atelier['titre']))
                        <div class="mb-3">
                            <div class="text-danger font-monospace small lh-1">Titre</div>
                            <p>{{$atelier['titre']}}</p>
                        </div>
                        @endif

                        @if (isset($atelier['consignes']))
                        <div class="mb-3">
                            <div class="text-danger font-monospace small lh-1">Consignes</div>
                            <div class="p-3 text-break" style="border-radius:4px;background-color:#fbfbfb">{!! nl2br($atelier['consignes']) !!}</div>
                        </div>
                        @endif

                        @if (isset($atelier['lien_retour']))
                        <div class="mb-3">
                            <div class="text-danger font-monospace small lh-1">Lien retour</div>
                            <p><a href=">{{ $atelier['lien_retour'] }}" target="_blank" class="font-monospace">{{ $atelier['lien_retour'] }}</a></p>
                        </div>
                        @endif

                        <div class="text-danger font-monospace small lh-1">Partie gauche</div>
                        <ul>
                            <li>Type: {{ strtoupper($atelier['gauche_type']) }}</li>
                            <li>
								Données
								<div class="p-3 font-monospace small text-muted text-break" style="border-radius:4px;background-color:#fbfbfb">{{ $atelier['gauche_input'] }}</div>
							</li>
                        </ul>
                        <div class="text-danger font-monospace small lh-1">Partie droite</div>
                        <ul>
                            <li>Type: {{ strtoupper($atelier['droite_type']) }}</li>
                            @if (!in_array($atelier['droite_type'], ['scratch','basthon', 'geogebra', 'blockscad']))
                            <li>
								Données
								<div class="p-3 font-monospace small text-muted text-break" style="border-radius:4px;background-color:#fbfbfb">{{ $atelier['droite_input'] }}</div>
							</li>
                            @endif
                        </ul>
                        <div>
                            <span class="text-danger font-monospace small">Lien à partager :</span> <kbd><a href="https://www.ateliernumerique.net/{{ strtoupper($atelier['jeton']) }}" target="_blank" class="font-monospace text-white">ateliernumerique.net/{{ strtoupper($atelier['jeton']) }}</a></kbd>
                        </div>

    			    </div>

                    <div class="text-center">
						<a class="btn btn-secondary btn-sm font-monospace" href="/" role="button">QUITTER</a>
						<a class="btn btn-light btn-sm font-monospace" href="/modifier?m={{ $atelier['jeton'] }}" role="button">MODIFIER</a>
					</div>

    			</div>
    		</div>
        </div>
        </body>
        </html>
        <?php
        exit;
    }
    ?>

	<div class="container mb-5">

		<div class="row mt-3">
			<div class="col-md-6 offset-md-3 mb-4" style="text-align:justify;">
				Les ateliers permettent d'avoir, côte à côte, un document de travail (cours, tutoriel, exercices...) et un environnement de création (Scratch, Geogebra, Basthon, BlocksCAD...). Formats possibles pour les documents de travail : vidéo, PDF, page web... Afin de faciliter la lecture et/ou l'utilisation des outils, les espaces peuvent être redimensionnés dynamiquement.<br />
				Il suffit de partager un lien avec les élèves pour qu'ils puissent accéder directement à un atelier  préparé par l'enseignant.
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 offset-md-5 text-center" style="text-align:justify;">
				<div class="d-grid gap-2">
				  	<button class="btn btn-creer btn-sm font-monospace" type="button" data-bs-toggle="collapse" href="#collapse_lien" role="button" aria-expanded="false" aria-controls="collapse_lien">créer un atelier</button>
				  	<button class="btn btn-link font-monospace" style="font-size:75%;" type="button" data-bs-toggle="modal" data-bs-target="#modifierModal">modifier un atelier</button>

					<!-- MODAL -->
					<div class="modal fade" id="modifierModal" tabindex="-1" aria-labelledby="modifierModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<div class="form-floating mb-3">
										<input id="code_input" type="text" class="form-control" />
										<label for="code_input">code de l'atelier</label>
									</div>
									<a id="modifier_lien" href="" class="btn btn-secondary btn-sm font-monospace" role="button">modifier</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /MODAL -->

				</div>

			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-8 offset-md-2 mb-4">


				<?php
				$collapse = "";
				if (session('message')) {
					$collapse = "show";
				    echo '<div class="mt-3 mb-2 text-center text-danger font-monospace"><i class="fas fa-exclamation-triangle"></i> '.session('message').'</div>';
				}

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

				<form id="collapse_lien" class="row collapse {{ $collapse }} mt-3" action="{{ route('creer-atelier-post') }}" method="POST">

                    @csrf

					<div class="col-md-6">

						<div class="p-3 h-100" style="border:solid 1px silver;border-radius:4px">

                            <div class="mb-2 text-center text-danger">PARTIE GAUCHE</div>

                            <div class="mb-2">
                                <input id="g_video" name="g_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="g_video" />
    						    <label for="g_video" class="form-check-label">Vidéo</label> <sup data-bs-container="body" data-bs-html="true" data-bs-trigger="hover focus" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{!! $infos_video !!}"><i class="fas fa-question-circle"></i></sup>
    							<div class="ms-3">
									<textarea id="g_video_input" name="gauche" class="form-control font-monospace" rows="7" style="font-size:0.875rem;display:none"></textarea>
								</div>
                            </div>

                            <div class="mb-2">
    							<input id="g_pdf" name="g_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="g_pdf" />
    						    <label for="g_pdf" class="form-check-label">PDF</label>
                                <div id="g_pdf_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
    							<div class="ms-3">
									<input id="g_pdf_input" name="gauche" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse du document pdf" disabled />
								</div>
                            </div>

                            <div>
    							<input id="g_web" name="g_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="g_web" />
    						    <label for="g_web" class="form-check-label">Page web</label>
                                <div id="g_web_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
    							<div class="ms-3">
									<input id="g_web_input" name="gauche" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse de la page" disabled />
								</div>
                            </div>

						</div>

					</div>

					<div class="col-md-6">
						<div class="p-3 h-100" style="border:solid 1px silver;border-radius:4px">

                            <div class="mb-2 text-center text-danger">PARTIE DROITE</div>

                            <div class="mb-2">
                                <input id="d_scratch" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_scratch" />
    						    <label for="d_scratch" class="form-check-label">Scratch</label>
                            </div>

                            <div class="mb-2">
    							<input id="d_geogebra" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_geogebra" />
    						    <label for="d_geogebra" class="form-check-label">GeoGebra</label>
                            </div>

                            <div class="mb-2">
    							<input id="d_basthon" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_basthon" />
    						    <label for="d_basthon" class="form-check-label">Basthon</label>
                            </div>

                            <div class="mb-2">
    							<input id="d_blockscad" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_blockscad" />
    						    <label for="d_blockscad" class="form-check-label">BlocksCAD</label>
                            </div>

                            <div class="mb-2">
    							<input id="d_video" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_video" />
    						    <label for="d_video" class="form-check-label">Vidéo</label> <sup data-bs-container="body" data-bs-html="true" data-bs-trigger="hover focus" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{!! $infos_video !!}"><i class="fas fa-question-circle"></i></sup>
								<div class="ms-3">
									<textarea id="d_video_input" name="droite" class="form-control" rows="7" style="display:none"></textarea>
								</div>
                            </div>

                            <div class="mb-2">
    							<input id="d_pdf" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_pdf" />
    						    <label for="d_pdf" class="form-check-label">PDF</label>
                                <div id="d_pdf_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
    							<div class="ms-3">
									<input id="d_pdf_input" name="droite" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse du document pdf" disabled />
								</div>
                            </div>

                            <div>
    							<input id="d_web" name="d_" class="radio_input form-check-input" type="radio" onclick="input_status(this.name)" value="d_web" />
    						    <label for="d_web" class="form-check-label">Page web</label>
                                <div id="d_web_info" class="ms-3 mb-1 text-warning font-monospace" style="font-size:70%;display:none">l'adresse doit être en https</div>
    							<div class="ms-3">
									<input id="d_web_input" name="droite" class="form-control form-control-sm font-monospace" style="display:none" type="text" placeholder="adresse de la page" disabled />
								</div>
                            </div>

						</div>
					</div>

                    <div class="col-md-12">

						<div class="mt-3 p-3" style="border:solid 1px silver;border-radius:4px">
                            <p class="text-success font-monospace small">optionnel</p>
                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <input id="titre" name="titre" type="text" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="consignes" class="form-label">Consignes</label>
                                <textarea id="consignes" name="consignes" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lien_retour" class="form-label m-0">Lien retour</label>
                                <div class="text-muted small font-monospace">lien vers un site de votre choix pour le bouton retour</div>
                                <input id="lien_retour" name="lien_retour" type="text" class="form-control" />
                            </div>

						</div>

					</div>

					<div class="col-md-12 mt-3 text-center font-monospace">
						<button type="submit" name="creer_lien" value="ok" class="btn btn-success btn-sm">CRÉER</button>
					</div>

				</form>

			</div>
		</div>


		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="ratio ratio-16x9">
					<video autoplay muted loop>
				  		<source src="{{ asset('demo.mp4') }}" type="video/mp4">
					</video>
				</div>
				<div class="font-monospace text-center" style="font-size:70%;color:silver">exemple avec une vidéo et scratch</a>
			</div>
		</div>


		<div class="row mt-2">
			<div class="col-md-10 offset-md-1">

				<h3 class="mt-5 mb-2">ATELIERS PRÊTS À L'EMPLOI</h3>

				<div class="row row-cols-1 row-cols-md-2 g-2">

					<div class="col">
						<div class="card h-100 p-2">
							<div class="text-danger">Coder un jeu avec Scratch</div>
							<ul>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/4WMPL6" target="_blank">Episode 1 : Déplacer un lutin avec les touches du clavier (méthode 1)</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/4WMPL6</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/ED23TF" target="_blank">Episode 2 : Déplacer un lutin avec les touches du clavier (méthode 2)</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/ED23TF</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/GF3YPT" target="_blank">Episode 3 : Bien commencer son programme : l'initialisation</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/GF3YPT</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/WVHS7Z" target="_blank">Episode 4 : Déplacer un lutin automatiquement vers un autre lutin</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/WVHS7Z</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/69ZWPJ" target="_blank">Episode 5 : Obtenir des déplacements plus fluides</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/69ZWPJ</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/32QZGE" target="_blank">Episode 6 : Ajouter des interactions entre lutins</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/32QZGE</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="col">
						<div class="card h-100 p-2">
							<div class="text-danger">Tutoriels GeoGebra</div>
							<ul>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/Z4BWPD" target="_blank">Construction d'un parallélogramme</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/Z4BWPD</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/P9LGBX" target="_blank">Construction d'un rectangle de mesures données</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/P9LGBX</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/REYZM4" target="_blank">Construction d'un rectangle</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/REYZM4</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/SBVFUE" target="_blank">Construction d'un triangle de mesures données</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/SBVFUE</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/5VY9PJ" target="_blank">Construction d'un triangle rectangle</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/5VY9PJ</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/Q2HXEV" target="_blank">Construction d'un triangle de mesures variables (1/3)</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/Q2HXEV</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/ZMDQCX" target="_blank">Construction d'un triangle de mesures variables (2/3)</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/ZMDQCX</div>
								</li>
								<li class="mt-2">
									<a href="https://www.ateliernumerique.net/BFL2TW" target="_blank">Construction d'un triangle de mesures variables (3/3)</a>
									<div class="font-monospace text-muted small"><i class="fas fa-caret-right"></i> ateliernumerique.net/BFL2TW</div>
								</li>
							</ul>
						</div>
					</div>

				</div>

			</div>
		</div>

		<div class="row mt-2 mb-5">
			<div class="col-md-10 offset-md-1">

				<h3 class="mt-5 mb-2">AUTRES OUTILS</h3>

				<div class="row row-cols-1 row-cols-md-5 g-2">

                    <div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-2">
								<h4><img src="https://www.pyxelstudio.net/favicon.png" width="18" class="me-2" />Pyxel Studio</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.pyxelstudio.net" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-2">
								<h4><img src="https://www.codepuzzle.io/img/favicon.png" width="18" class="me-2" />Code Puzzle</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.codepuzzle.io" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><img src="https://www.mon-oral.net/img/favicon.png" width="20" class="me-2" />mon-oral.net</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.mon-oral.net" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><img src="https://www.edupyter.net/images/favicon.png" width="18" class="me-2" />Edupyter</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.edupyter.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><img src="https://www.txtpuzzle.net/img/favicon.png" width="18" class="me-2" />Texte Puzzle</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.txtpuzzle.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><img src="https://www.dozo.app/img/favicon.png" width="18" class="me-2" />DOZO</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.dozo.app/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><i class="fas fa-cash-register me-2 text-primary"></i>Machine de Turing</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://mdt.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><i class="fas fa-unlock me-2 text-danger"></i>Chiffrement RSA</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://rsa.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><i class="fas fa-key me-2 text-success"></i>Clés RSA</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://rsa-cles.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-1">
								<h4><i class="fas fa-search me-2 text-info"></i>Boyer-Moore</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://boyer-moore.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

			</div>
		</div>


		<div class="row mt-5">
			<div class="col text-center font-monospace text-muted">
				<div class="small" style="color:silver;opacity:0.6">code sous <a href="https://www.gnu.org/licenses/gpl-3.0.fr.html" target="_blank">GPLv3</a> et contenu sous <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">CC BY-NC-SA</a></div>
				<p class="mt-1"><a href="https://twitter.com/laurentabbal" class="me-3" target="_blank"><i class="fab fa-twitter fa-lg"></i></a><a href="https://github.com/atelier-numerique/www.ateliernumerique.net" class="mr-3" target="_blank"><i class="fab fa-github-alt fa-lg"></i></a></p>
			</div>
		</div>

	</div>

	<script>
	document.getElementById("code_input").onchange = function(){
		document.getElementById("modifier_lien").href="/modifier?m="+document.getElementById("code_input").value;
	};
	</script>

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
