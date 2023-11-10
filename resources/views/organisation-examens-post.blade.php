<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js"></script>
	<title>Organisation examens</title>
  </head>
  <body>

	
	<?php
	$csv_data = file_get_contents('https://forge.apps.education.fr/laurent.abbal/organisation-examens/-/raw/main/data_exemple.csv');
	//echo $csv_data;
	
	
// Lire les lignes du CSV
$lines = str_getcsv($csv_data, "\n");

// Vérifier le nombre de colonnes dans la première ligne (en-têtes)
$headers = str_getcsv($lines[0], ",");

// Vérifier si les en-têtes correspondent à vos critères
$expectedHeaders = ['nom', 'classe', 'matiere_1', 'matiere_2'];

if (count($headers) === count($expectedHeaders) && array_diff($headers, $expectedHeaders) === []) {
    echo "Le fichier CSV a les en-têtes attendus.\n";
    // Vous pouvez maintenant traiter le reste du fichier CSV si nécessaire
} else {
    echo "Le fichier CSV ne correspond pas aux critères.\n";
}	

$csv_data_64 = base64_encode($csv_data);
	
	
	
	$url_gsheets = '';


	// Définir le motif regex
	$pattern = '/\/d\/([^\/]+)\/edit/';

	// Rechercher la correspondance dans l'URL
	if (preg_match($pattern, $url_gsheets, $matches)) {
		// La partie que vous recherchez est dans $matches[1]
		$tableaur_id = $matches[1];
		echo "Résultat: $tableaur_id\n";
	} else {
		echo "Aucune correspondance trouvée.\n";
	}
	
	// Utiliser une expression régulière pour extraire la partie après "gid="
	$pattern = '/gid=([0-9]+)/';
	preg_match($pattern, $url_gsheets, $matches);

	// La partie après "gid=" est dans $matches[1]
	if (isset($matches[1])) {
		$feuille_id = $matches[1];
		echo "La partie après gid= : $feuille_id";
	} else {
		echo "Aucune correspondance trouvée pour gid=";
	}
	
	
	?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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
div = js.document.createElement("div")
div.innerHTML = "Nombre minimum de créneaux: " + str(coef_chromatique)
js.document.body.appendChild(div)

# graphe et couleurs
couleurs = ["#2a9d8f","#a1c65d","#fac723","#f29222","#e95e50","#936fac"]
couleurs_noeuds = [couleurs[coloration[node]] for node in G]
image_graph = nx.draw(G, node_color=couleurs_noeuds, with_labels=True,  font_size=7, pos=nx.kamada_kawai_layout(G), font_weight='bold', node_size=1000, node_shape="o", font_color="black", edgecolors='#3A3F58', edge_color='#3A3F58', width=2, linewidths=2)
#plt.savefig("graphe.png")
image_stream = BytesIO()
plt.savefig(image_stream, format='png')
plt.close()
image_base64 = base64.b64encode(image_stream.getvalue()).decode('utf-8')
imgElement = js.document.createElement('img')
imgElement.src = 'data:image/png;base64,'+image_base64
js.document.body.appendChild(imgElement);

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
js.document.body.appendChild(table_1);

# tableau 2
table_2 = js.document.createElement('table');
table_2.classList.add('table', 'table-bordered', 'table-sm')
n = 0
for creneau in creneaux:
	eleves_creneau = [eleve for eleve in liste_eleves for m in creneaux[creneau] if m in eleve]
	row = table_2.insertRow(n)
	row.classList.add('fw-bold', 'text-primary')
	cell = row.insertCell(0)
	cell.textContent = str(creneau + 1) + ' - ' + str(len(eleves_creneau)) + ' élèves'
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
js.document.body.appendChild(table_2);
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