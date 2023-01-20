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

    <script src="https://cdn.jsdelivr.net/pyodide/v0.21.3/full/pyodide.js"></script>
	
	<title>L'Atelier Numérique</title>

</head>

<body>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><img src="{{ asset('img/ateliernumerique.svg') }}" width="400" alt="ATELIER NUMERIQUE" /></h1>
                <div class="mt-4 col-md-12 text-center font-monospace">PROJET ARLÉATOIRE</div>
                <div class="mt-1 col-md-12 text-center font-monospace text-muted small">Première NSI du Lycée Français International de Tokyo</div>
			</div>
		</div>
	</div>

	<div class="container mb-5">
		
		<div class="row mt-5 mb-5">
            <?php
            $files = glob(public_path()."/projet-arleatoire/*");

            /*
            foreach (glob(public_path()."/projet-arleatoire/*") as $filename) {
                $code = file_get_contents($filename);
                echo $code;
            }
            */

            $code = file_get_contents(public_path()."/projet-arleatoire/BL.py");
            //echo '<pre>';
            //echo $code;
            //echo '</pre>';


            ?>

            <pre id="output"></pre>
            <div id="output_upload_pillow1"></div>
            <div id="output_upload_pillow2"></div>


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

<script>
// https://jeff.glass/post/pyscript-image-upload/
const output = document.getElementById("output");



function addToOutput(s) {
//output.innerText += ">>>" + code.value + "\n" + s + "\n";
output.innerText = ""
if (typeof(s) !== 'undefined'){
output.innerText = s
}
}




async function main(){



let pyodide = await loadPyodide();
await pyodide.loadPackage("pillow");

pyodide.runPython(`
from js import document, console, Uint8Array, window, File
import io
{!!$code!!}
#Convert Pillow object array back into File type that createObjectURL will take
my_stream = io.BytesIO()
image.save(my_stream, format="PNG")
image_file = File.new([Uint8Array.new(my_stream.getvalue())], "new_image_file.png", {type: "image/png"})
#Create new tag and insert into page
new_image = document.createElement('img')
new_image.src = window.URL.createObjectURL(image_file)
new_image.style.width = "400px"
new_image.style.borderRadius = "5px"
console.log(new_image)
image_container = document.getElementById("output_upload_pillow1")
image_container.innerHTML = ""
image_container.appendChild(new_image)
`);

pyodide.runPython(`
from js import document, console, Uint8Array, window, File
import io
{!!$code!!}
#Convert Pillow object array back into File type that createObjectURL will take
my_stream = io.BytesIO()
image.save(my_stream, format="PNG")
image_file = File.new([Uint8Array.new(my_stream.getvalue())], "new_image_file.png", {type: "image/png"})
#Create new tag and insert into page
new_image = document.createElement('img')
new_image.src = window.URL.createObjectURL(image_file)
new_image.style.width = "400px"
new_image.style.borderRadius = "5px"
console.log(new_image)
image_container = document.getElementById("output_upload_pillow2")
image_container.innerHTML = ""
image_container.appendChild(new_image)
`);
//addToOutput(output);
};

/*
window.setInterval(function(){
  main();
}, 5000);
*/
main();



</script>    

</body>
</html>
