<?php
if (!Session::has('url') AND !Session::has('data')) {
	echo 'adresse incorrecte';
	exit();
}
$bouton_1 = '<a class="btn btn-light btn-xs" href="/organisation-examens" role="button"><i class="fas fa-arrow-left"></i></a>';
if (Session::has('url')) {
	try {
		$url = Crypt::decryptString(Session::get('url'));
		$csv_data = file_get_contents($url);
		$csv_data_64 = base64_encode($csv_data);
	} catch (\RuntimeException $e) {
		echo 'adresse incorrecte';
		exit();
	}
	$bouton_2 = '<a class="btn btn-light btn-xs" href="/organisation-examens-resultats" role="button">recharger le fichier</a>';
}
if (Session::has('data')) {
	try {
		$csv_data_64 = Crypt::decryptString(Session::get('data'));
	} catch (\RuntimeException $e) {
		echo 'données incorrectes';
		exit();
	}
	$bouton_2 = '<a class="btn btn-light btn-xs" href="/organisation-examens" role="button">charger de nouvelles données</a>';
}

?>
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

	<!-- pyodide -->
	<script src="https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js"></script>

	<style>
		.coef_chromatique {
			color:#dc3545;
			font-weight:bold;
		}
		table {
			font-size:80%;
		}
		td {
			padding:1px 6px 1px 6px !important;
		}
	</style>

	<title>Organisation examens</title>
</head>
<body>

	<div id="examens" class="container">
 
		<div class="text-center mt-4 mb-5"><a href="/organisation-examens"><img src="{{ asset('img/oe-logo.png') }}" width="100" /></a></div>

		<div id="boutons" class="mt-4 mb-5" style="display:none;">
			<div  class="row font-monospace">
				<div class="col-md-2">{!! $bouton_1 !!}</div>
				<div class="col-md-8 text-center">{!! $bouton_2 !!}</div>
			</div>		
		</div>		

		<div id="resultats" class="row">
			<div class="col-md-6 offset-md-3">
				<div id="loading" class="mb-3 text-center font-monospace mt-5" style="color:silver;font-size:70%;">
					<i class="fa-solid fa-circle-notch fa-spin fa-6x mb-2"></i>
					<br />
					traitement<br />des données<br />~ 10/20s ~
				</div>
				<div id="donnees" class="mb-1 ms-1" style="display:none"><div class="fw-bold text-danger font-monospace">DONNÉES</div></div>
				<div id="matieres_eleves" class="mb-2 font-monospace ps-1"></div>
				<div id="combinaisons_eleves" class="mb-2 font-monospace ps-1"></div>
				<div id="creneaux" class="pt-3 mb-1 ms-1" style="display:none"><div class="fw-bold text-danger font-monospace">CRÉNEAUX</div></div>
				<div id="nb_creneaux" class="mb-2 font-monospace ps-1"></div>
				<div id="graphe" class="mb-3 rounded p-3 bg-white border border-light-subtle" style="display:none"></div>
				<div id="liste1" class="mb-3" style="display:none"><div class="fw-bold text-danger font-monospace">Créneaux et matières</div></div>
				<div id="liste2" class="mb-5" style="display:none"><div class="fw-bold text-danger font-monospace">Créneaux et matières et élèves</div></div>
			</div>
		</div>
	</div>


<script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
<script>     
const code = `
# on importe les bibliotheques
import pandas as pd
import networkx as nx
import js
import matplotlib.pyplot as plt
from io import BytesIO
import base64

eleves = pd.read_csv("csv_file.csv")

# on calcule le nombre d'eleves par matiere
matieres = eleves["matiere_1"].tolist() + eleves["matiere_2"].tolist()
matieres_eleves = {}
for matiere in matieres:
    if matiere in matieres_eleves:
        matieres_eleves[matiere] += 1
    else:
        matieres_eleves[matiere] = 1

# on calcules le nombre d'eleves par combinaison de matieres
combinaisons_matieres = [tuple(sorted([m1, m2])) for m1, m2 in zip(eleves["matiere_1"], eleves["matiere_2"])]
combinaisons_eleves = {}
for combinaison in combinaisons_matieres:
    if combinaison in combinaisons_eleves:
        combinaisons_eleves[combinaison] += 1
    else:
        combinaisons_eleves[combinaison] = 1

# on trie les resultats
matieres_eleves = sorted(matieres_eleves.items(), key=lambda item: item[1], reverse=True)
combinaisons_eleves = sorted(combinaisons_eleves.items(), key=lambda item: item[1], reverse=True)

# on affiche les informations pour les matieres
table_matieres = js.document.createElement('table');
table_matieres.classList.add('table', 'table-bordered', 'table-sm');
n = 0
for matiere_eleves in matieres_eleves:
	row = table_matieres.insertRow(n)
	cell = row.insertCell(0)
	cell.style.width = '100%'
	cell.textContent = matiere_eleves[0]
	cell = row.insertCell(1)
	cell.textContent = matiere_eleves[1]
	n += 1
js.document.getElementById("donnees").style.display = 'block';
js.document.getElementById("matieres_eleves").appendChild(table_matieres);

# on affiche les informations pour les combinaisons
table_combinaisons = js.document.createElement('table');
table_combinaisons.classList.add('table', 'table-bordered', 'table-sm');
n = 0
for combinaison_eleves in combinaisons_eleves:
	row = table_combinaisons.insertRow(n)
	cell = row.insertCell(0)
	cell.style.width = '100%'
	cell.textContent = combinaison_eleves[0][0] + ' - ' + combinaison_eleves[0][1]
	cell = row.insertCell(1)
	cell.textContent = combinaison_eleves[1]
	n += 1
js.document.getElementById("combinaisons_eleves").appendChild(table_combinaisons);

# on cree le graphe et la liste des eleves
graphe = {}
liste_eleves = []
for i in eleves.index:
    matiere_1 = eleves.iloc[i]['matiere_1']
    matiere_2 = eleves.iloc[i]['matiere_2']
    liste_eleves.append([eleves.iloc[i]['nom'], eleves.iloc[i]['classe'], matiere_1, matiere_2])
    if matiere_1 not in graphe:
        graphe[matiere_1] = {matiere_2}
    else:
        graphe[matiere_1].add(matiere_2)
    if matiere_2 not in graphe:
        graphe[matiere_2] = {matiere_1}
    else:
        graphe[matiere_2].add(matiere_1)

# on cree le graphe networkx
G = nx.Graph()
for spe in graphe:
    G.add_node(spe)

for matiere_1 in graphe:
    for matiere_2 in graphe[matiere_1]:
        G.add_edge(matiere_1, matiere_2)

# on essaye toutes les strategies et on garde la meilleure
coloration = {}
coef_chromatique = 1000
strategies = ["largest_first", "random_sequential", "smallest_last", "independent_set", "connected_sequential_bfs", "connected_sequential_dfs", "connected_sequential", "DSATUR"]
for strategie in strategies:
    strategie_coloration = nx.greedy_color(G, strategy=strategie)
    strategie_coef_chromatique = max(strategie_coloration[spe] for spe in strategie_coloration) + 1
    if strategie_coef_chromatique < coef_chromatique:
        coloration = strategie_coloration
        coef_chromatique = strategie_coef_chromatique

# nombre minimum de créneaux
div = js.document.createElement("div");
div.innerHTML = "Nombre minimum de créneaux: <span class='coef_chromatique'>" + str(coef_chromatique) + "</span>";
js.document.getElementById("loading").style.display = 'none';
js.document.getElementById("boutons").style.display = 'block';
js.document.getElementById("creneaux").style.display = 'block';
js.document.getElementById("nb_creneaux").style.display = 'block';
js.document.getElementById("nb_creneaux").appendChild(div);

# graphe et couleurs
couleurs = ["#2a9d8f","#a1c65d","#fac723","#f29222","#e95e50","#936fac"]
couleurs_noeuds = [couleurs[coloration[node]] for node in G]
image_graph = nx.draw(G, node_color=couleurs_noeuds, with_labels=True,  font_size=6, pos=nx.kamada_kawai_layout(G), font_weight='bold', node_size=1000, node_shape="o", font_color="black", edgecolors='#3A3F58', edge_color='#3A3F58', width=2, linewidths=2)
#plt.savefig("graphe.png")
image_stream = BytesIO()
plt.savefig(image_stream, format='png')
plt.close()
image_base64 = base64.b64encode(image_stream.getvalue()).decode('utf-8')
imgElement = js.document.createElement('img')
imgElement.style.width = '100%'
imgElement.src = 'data:image/png;base64,'+image_base64
js.document.getElementById("graphe").style.display = 'block';
js.document.getElementById("graphe").appendChild(imgElement);

# tableau 1
coloration_matieres = dict(sorted(coloration.items(), key=lambda item: item[1]))
creneaux = {}
for i, v in coloration_matieres.items():
	creneaux[v] = [i] if v not in creneaux.keys() else creneaux[v] + [i]
table_1 = js.document.createElement('table');
table_1.classList.add('table', 'table-bordered', 'table-sm');
n = 0
for creneau in creneaux:
	eleves_creneau = [eleve for eleve in liste_eleves for m in creneaux[creneau] if m in eleve]
	row = table_1.insertRow(n)
	row.classList.add('fw-bold', 'text-primary');
	cell = row.insertCell(0)
	cell.style.width = '100%'
	cell.textContent = 'CRÉNEAU ' + str(creneau + 1)
	cell = row.insertCell(1)
	cell.textContent = str(len(eleves_creneau))
	n += 1
	for matiere in creneaux[creneau]:
		eleves_matiere = [eleve for eleve in liste_eleves if matiere in eleve]
		row = table_1.insertRow(n)
		cell = row.insertCell(0)
		cell.textContent = matiere
		cell = row.insertCell(1)
		cell.textContent = str(len(eleves_matiere))
		n += 1
js.document.getElementById("liste1").style.display = 'block';
js.document.getElementById("liste1").appendChild(table_1);

# tableau 2
table_2 = js.document.createElement('table');
table_2.classList.add('table', 'table-bordered', 'table-sm')
n = 0
for creneau in creneaux:
	eleves_creneau = [eleve for eleve in liste_eleves for m in creneaux[creneau] if m in eleve]
	row = table_2.insertRow(n)
	row.classList.add('fw-bold', 'text-primary')
	cell = row.insertCell(0)
	cell.textContent = 'CRÉNEAU ' + str(creneau + 1) + ' - ' + str(len(eleves_creneau)) + ' élèves'
	cell = row.insertCell(1)
	cell.textContent = ''
	cell = row.insertCell(2)
	cell.textContent = ''
	cell = row.insertCell(3)
	cell.textContent = ''	
	n += 1
	for matiere in creneaux[creneau]:
		eleves_matiere = [eleve for eleve in liste_eleves if matiere in eleve]
		row = table_2.insertRow(n)
		row.classList.add('fw-bold', 'text-dark')
		cell = row.insertCell(0)
		cell.textContent = matiere + ' - ' + str(len(eleves_matiere)) + ' élèves'
		cell = row.insertCell(1)
		cell.textContent = ''
		cell = row.insertCell(2)
		cell.textContent = ''
		cell = row.insertCell(3)
		cell.textContent = ''			
		n += 1
		for eleve_matiere in eleves_matiere:
			row = table_2.insertRow(n)
			cell = row.insertCell(0)
			cell.textContent = eleve_matiere[0]
			cell = row.insertCell(1)
			cell.textContent = eleve_matiere[1]
			cell = row.insertCell(2)
			cell.textContent = eleve_matiere[2]
			cell = row.insertCell(3)
			cell.textContent = eleve_matiere[3]
			n += 1
js.document.getElementById("liste2").style.display = 'block';
js.document.getElementById("liste2").appendChild(table_2);
`
      console.log("Initializing...");
      // init Pyodide
      async function main() {
        let pyodide = await loadPyodide();
        console.log("Ready!");
        return pyodide;
      }
      let pyodideReadyPromise = main();
	  	
      async function evaluatePython() {
        let pyodide = await pyodideReadyPromise;
		pyodide.FS.writeFile("csv_file.csv", atob("<?php echo $csv_data_64 ?>"), { encoding: "utf8" });	  		
        await pyodide.loadPackage(["networkx", "numpy", "pandas", "scipy"]);
        try {
          pyodide.runPython(code);
        } catch (err) {
          console.log(err);
        }

      }
      evaluatePython();
    </script>
  </body>
</html>