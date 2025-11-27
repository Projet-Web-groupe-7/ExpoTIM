//Permettre d'afficher les publication lorsque la page est loader

window.addEventListener("scroll", gererAffichageContenuSections);


// Appel initial pour afficher les sections visibles dès le chargement
window.addEventListener("DOMContentLoaded", gererAffichageContenuSections);

		function gererAffichageContenuSections() {
			let hauteurViewport = window.innerHeight;

			let lesContenusDesections = document.querySelectorAll(".fondu-en-bas");

			for (let unContenu of lesContenusDesections) {
				let positionHautDuContenu = unContenu.getBoundingClientRect().top;

				if(positionHautDuContenu < hauteurViewport * 0.9){
					unContenu.classList.add("active")
                    
				}
				else {
					unContenu.classList.remove("active")
				}
				
			}
		}