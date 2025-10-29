<?php get_header(); ?>
    <main class="main-front-page">
        <!-- Section contenant le logo, la vidéo et la description -->
        <section class="hero">
                <div class="desc-expo">
                <h2>C'est quoi l'expo TIM?</h2>
                <p><?php echo get_theme_mod('hero_desc', __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5')); ?></p>
                <div class="fondCarteAS"></div>
                <div class="motifs">
                    <img src="../images/cartes/clubs.png" alt="motifs">
                    <img src="../images/cartes/diamonds.png" alt="motifs">
                    <img src="../images/cartes/spades.png" alt="motifs">
                    <img src="../images/cartes/hearts.png" alt="motifs">
                </div>
            </div>
            
        </section>
        <section class="projet-random">
            <h2>Choisis un projet au hasard</h2>
            <img src=".images/cartes/carteDosR" alt="Carte">
        </section>
        <section class="decks">
            <h2>Nos decks de carte d’expositions</h2>
            <details>
                <summary>Finissants</summary>
                <img src="" alt="">
            </details>
            <details>
                <summary>Arcade</summary>
                <img src="" alt="">
            </details>
            <details>
                <summary>Jour de la terre</summary>
                <img src="" alt="">
            </details>
            <div class="deckBox"></div>
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
