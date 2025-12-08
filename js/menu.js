       // permettre au menu de glisser vers le haut lors du défilement vers le bas et de revenir 
        
        let lastScrollTop = 0; // position du scroll précédente
        // Saisir l'entete
        let header = document.querySelector("header");

        // Lui associer un écouteur d'évènement
        window.addEventListener("scroll", gererLeDefilement);

        // Fonction de l'évènement
        function gererLeDefilement(_event) {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
	    if(currentScroll > lastScrollTop) {
		    // On scroll vers le bas et cache le header
            // En rajouter au header un style qui est le translate 
            header.style.transform = 'translateY(-100%)';
	    }
	    else{
		    // On scroll vers le haut et montrer le header
            // On change le style translate a 0
            header.style.transform = 'translateY(0)';
	    }
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // éviter les valeurs négatives
       }

       // Mesurer automatiquement la hauteur du header et l'appliquer au body
       function ajusterHauteurContenu() {
              const headerHeight = header.offsetHeight;
              document.body.style.paddingTop = headerHeight + "px";
       }

       // Ajuster au chargement
       window.addEventListener("DOMContentLoaded", ajusterHauteurContenu);

       // Ajuster si on redimensionne la fenêtre
       window.addEventListener("resize", ajusterHauteurContenu);


        