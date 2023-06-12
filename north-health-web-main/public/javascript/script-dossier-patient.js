// Fonction qui permet de changer d'onglet
function openTab(evt, tabName) {
	// Déclarations des variables
	var i, tabcontent, tablinks;

	// Récupération des éléments avec la classe "tabcontent"
	tabcontent = document.getElementsByClassName("tabcontent");

	// Parcours tous les éléments avec la classe "tabcontent" et les cache
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	// Récupération des éléments avec la classe "tablinks"
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}

	// Parcours tous les éléments avec la classe "tablinks" et les marque comme inactifs
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}

	// Affiche le contenu de l'onglet sélectionné et marque le bouton comme actif
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
}
// Fonction qui permet de basculer l'état "disabled" des champs d'un formulaire
function toggleDisabled(idForm) {
var form = document.getElementById(idForm);
var inputs = form.getElementsByTagName("input");

for (var i = 0; i < inputs.length; i++) {
	if (inputs[i].disabled) {
		inputs[i].disabled = false;
	} else {
		inputs[i].disabled = true;
	}
}
}

// Par défaut, on affiche le contenu de l'onglet "Informations personnelles" et on le marque comme actif
document.getElementById("info-perso").style.display = "block";
document.getElementsByClassName("tablinks")[0].className += " active";