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
                <div class="carte">
                    <div class="container">
                        <div class="front"><h2>projet</h2><h3>1</h3></div>
                        <div class="back"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php get_footer(); ?>
</body>
</html>

<style>
    body{
        background: linear-gradient(180deg,rgba(101, 126, 212, 1) 6%, rgba(178, 95, 126, 1) 61%, rgba(255, 56, 61, 1) 96%);
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
    
</style>
