<!DOCTYPE html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

	<!-- Font Awesome -->
	<link href="{{ asset('lib/fontawesome/css/all.min.css') }}" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- custom.css -->
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

	<!-- Open Graph -->
	<meta property="og:title" content="L'Atelier Numérique" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="Outils Numériques pour les élèves et les enseignants" />
	<meta property="og:url" content="https://www.ateliernumerique.net/" />
	<meta property="og:image" content="https://www.ateliernumerique.net/img/opengraph.png" />
	<meta property="og:image:alt" content="L'Atelier Numérique" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@lateliernum">
	<meta name="twitter:creator" content="@lateliernum">
	<meta name="twitter:title" content="L'Atelier Numérique">
	<meta name="twitter:description" content="Outils Numériques pour les élèves et les enseignants">
	<meta name="twitter:image" content="https://www.ateliernumerique.net/img/opengraph.png">
	
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

	<title>L'Atelier Numérique</title>

</head>

<body>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><img src="{{ asset('img/ateliernumerique.svg') }}" width="400" alt="ATELIER NUMERIQUE" /></h1>
			</div>
		</div>
	</div>

	<div class="container mb-5">
		
		<div class="row mt-3 mb-5">
			<div class="col-md-12 text-center font-monospace text-muted">
				Projets bricodés par <a tabindex="0" class="" style="color:#c83737" role="button" data-bs-container="body" data-bs-trigger="click" data-bs-html="true" data-bs-sanitize="false" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="
				<ul class='fa-ul font-monospace small m-0 ms-4'>
					<li><span class='fa-li pe-3' style='color:#c83737'><i class='fa-brands fa-twitter'></i></span><a href='https://twitter.com/laurentabbal' target='_blank'>@laurentabbal</a></li>
					<li><span class='fa-li pe-3'style='color:#c83737'><i class='fa-brands fa-mastodon'></i></span><a href='https://mastodon.social/@laurentabbal' target='_blank'>@laurentabbal@mastodon.social</a></li>
					<li><span class='fa-li pe-3' style='color:#c83737'><i class='fa-brands fa-github-alt'></i></span><a href='https://github.com/laurentabbal' target='_blank'>www.github.com/laurentabbal</a></li>
					<li><span class='fa-li pe-3' style='color:#c83737'><i class='fa-brands fa-gitlab'></i></span><a href='https://forge.aeif.fr/laurentabbal' target='_blank'>forge.aeif.fr/laurentabbal</a></li>
				</ul>
				"><i class="fas fa-user-astronaut"></i></a>
				
			</div>
		</div>
		
		<div class="row mt-5 mb-5">
			<div class="col-md-12">

				<div class="row row-cols-1 row-cols-md-6 g-2">

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.mon-oral.net/img/favicon.png" width="20" class="mb-1" /><br />mon-oral.net</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.mon-oral.net" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>		

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.nuitducode.net/img/favicon.svg" width="20" class="mb-1" /><br />Nuit du c0de</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.nuitducode.net" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>						
				
                    <div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.pyxelstudio.net/img/favicon.png" width="18" class="mb-1" /><br />Pyxel Studio</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.pyxelstudio.net" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.codepuzzle.io/img/favicon.png" width="18" class="mb-1" /><br />Code Puzzle</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.codepuzzle.io" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.edupyter.net/images/favicon.png" width="18" class="mb-1" /><br />Edupyter</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.edupyter.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>
					
                    <div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.cahiernum.net/img/favicon.png" width="18" class="mb-1" /><br />Cahier Numérique</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.cahiernum.net" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>						

                    <div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.ateliernumerique.net/img/oe-favicon.png" width="18" class="mb-1" /><br />Organisation d'examens</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.ateliernumerique.net/organisation-examens" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>	

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.txtpuzzle.net/img/favicon.png" width="18" class="mb-1" /><br />Texte Puzzle</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.txtpuzzle.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><img src="https://www.dozo.app/img/favicon.png" width="18" class="mb-1" /><br />DOZO</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://www.dozo.app/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<!--
					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><i class="fas fa-cash-register mb-1 text-primary"></i><br />Machine de Turing</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://mdt.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>
					-->

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><i class="fas fa-unlock mb-1 text-danger"></i><br />Chiffrement RSA</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://rsa.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><i class="fas fa-key mb-1 text-success"></i><br />Clés RSA</h4>
							</div>
							<div class="card-footer text-center">
					          	<a class="btn btn-download btn-sm" href="https://rsa-cles.codekodo.net/" role="button" target="_blank"><i class="fas fa-paper-plane"></i></a>
					        </div>
						</div>
					</div>

					<div class="col">
						<div class="card h-100">
							<div class="card-body font-monospace pb-0">
								<h4 class="text-center"><i class="fas fa-search mb-1 text-info"></i><br />Boyer-Moore</h4>
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
				<?php
				/*
				<div class="small" style="color:silver;opacity:0.6">code sous <a href="https://www.gnu.org/licenses/gpl-3.0.fr.html" target="_blank">GPLv3</a> et contenu sous <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">CC BY-NC-SA</a></div>
				*/
				?>
				<p class="mt-1"><a href="https://twitter.com/laurentabbal" class="me-3" target="_blank"><i class="fab fa-twitter fa-lg"></i></a><a href="https://github.com/atelier-numerique/www.ateliernumerique.net" class="mr-3" target="_blank"><i class="fab fa-github-alt fa-lg"></i></a></p>
			</div>
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
