<p>page-gallerie.php</p>
<?php get_header(); ?>

    <main class="gallerie">
        <div class="hero">
            <h2>Gallerie projets Jour de la Terre - 1ère année</h2>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum officia possimus
                eius esse voluptatum sequi totam illo adipisci explicabo numquam aperiam exercitationem 
                praesentium nemo tempore ea maxime culpa, consequuntur nam cum voluptatem 
                repellendus tenetur. Perferendis porro iste hic? Molestias inventore sunt perferendis 
                doloremque possimus quod debitis fuga eius qui unde?
            </h3>

            <a href="gallerieFinissants">Finissants</a>
            <a href="gallerieArcade">Arcade</a>
            <a href="gallerieTerre">Jour de la Terre</a>
        </div>

        <section id="gallerie-cartes">
            <div class="paquet" style="color:white;">
                
            </div>
            <div class="carte heart">
                    <div class="container">
                        <div class="front">
                            <div class="premier-etage">
                                <p>Nom du projet</p>
                                <div class="symbole"></div>
                            </div>
                            <img src="" alt="image du projet">
                            <div class="symbole"></div>
                        </div>


                        <div class="back"></div>
                    </div>
                </div>
        </section>
    </main>
    
    <?php get_footer(); ?>
</body>
</html>

<style>
    body{
        /* background: linear-gradient(180deg,rgba(101, 126, 212, 1) 6%, rgba(178, 95, 126, 1) 61%, rgba(255, 56, 61, 1) 96%); */
    }
    main.gallerie{
        padding: 0 50px;
        background: none;
    }

    .gallerie .hero{
        color: var(--texte-couleur-secondaire);
    }
    .gallerie .hero h2,h3{
        color: var(--texte-couleur-secondaire);
    }
</style>

<!-- style pour les cartes -->
<style>
.paquet{
    width: 259px;
    height: 388px;
    border: 5px solid red;
    background-color: rgb(0, 52, 108);

    z-index: 999;
}


.carte{
    width: 259px;
    height: 388px;
    margin: 20px;
    /* transition pour le déplacement */
    transition: transform .7s;
}
/* le container est ce qui tourne */
.carte .container{
    width: 100%;
    height: 100%;

    transform-style: preserve-3d;
    transform: rotate3d(0, 0, 0, 180deg);
    transition: transform .7s;
}
.carte:hover .container{
    transform: rotate3d(0, 1, 0, 180deg);
}
.carte.turned .container{
    transform: rotate3d(0, 1, 0, 180deg);
}



/* /////////////////////////////////////////////////////// design de la carte */
/* devant et arriere de la carte */
.carte .back,.front{
    width: 100%;
    height: 100%;
    border: 6px solid red;
    border-radius: 20px;

    backface-visibility: hidden;
    position: absolute;
}
.carte .back{
    background-color: rgb(138, 28, 21);
    /* background-image: url("images/cartes/carteDosR.png"); */
}
.carte .front{
    display: flex;
    flex-flow: column nowrap;
    justify-content: space-between;
    align-items: center;
    font-family: var(--main-paragraphe-font);

    background-color: var(--carte-couleur-fond);

    transform: rotate3d(0, 1, 0, 180deg);
}
.carte .front .premier-etage{
    width: 100%;
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items: center;
    margin: 0;
}
.carte .front .premier-etage p,div{
    margin: 20px 20px 0 20px;
}
.carte .front img{
    width: 233px;
    height: 292px;
    margin: 0 20px;
    border-radius: 10px;
    background-color: #D9D9D9;
}
.front .symbole{
    width: 22px;
    height: 24px;
    background-size: contain;
    background-position: center;


    /* background-image: url("hearts.png"); */
    background-color:green;
}
.front .symbole:nth-of-type(2){
    margin: 0 15px 15px 15px;
    align-self: flex-start;
}
.carte.heart .container .front{
    border: 6px solid rgb(255, 51, 31);
}



/* classes nécéssaires pour fonctoinement du code */
.carte.hidden{
    position: absolute;
    opacity: 0;
}
.carte-no-transit{
    transition: none;
}
</style>
