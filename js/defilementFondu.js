//Permettre d'afficher les publication lorsque la page est loader

//window.addEventListener("scroll", gererAffichageContenuSections);


// Appel initial pour afficher les sections visibles dès le chargement
//window.addEventListener("DOMContentLoaded", gererAffichageContenuSections);

//		function gererAffichageContenuSections() {
	//		let hauteurViewport = window.innerHeight;

		//	let lesContenusDesections = document.querySelectorAll(".fondu-en-bas");

	//		for (let unContenu of lesContenusDesections) {
		//		let positionHautDuContenu = unContenu.getBoundingClientRect().top;

			//	if(positionHautDuContenu < hauteurViewport * 0.9){
				//	unContenu.classList.add("active")
                    
				//}
				//else {
					//unContenu.classList.remove("active")
				//}
				
			//}
		//}

document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll(".fondu-en-bas");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                observer.unobserve(entry.target);
            }
        });
    }, { 
        threshold: 0.9 
    });

    elements.forEach(el => observer.observe(el));
});