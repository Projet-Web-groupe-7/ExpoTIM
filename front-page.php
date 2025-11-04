<h1 class="titreLogo"><?php echo get_bloginfo('name'); ?></h1>
<video class="video-front-page" src="">
                
</video>
<?php get_header(); ?>
    <main class="main-front-page">
        <!-- Section contenant la description de l'exposition -->
        <section class="desc-expo">
            <h2>C'est quoi l'expo TIM?</h2>
            <p><?php echo get_theme_mod('hero_desc', __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5')); ?></p>
            <div class="fondCarteAS"></div>
            <div class="motifs">
                <!-- <img src="../images/cartes/clubs.png" alt="motifs">
                <img src="../images/cartes/diamonds.png" alt="motifs">
                <img src="../images/cartes/spades.png" alt="motifs">
                <img src="../images/cartes/hearts.png" alt="motifs"> -->
            </div>
        </section>
        <!-- Section contenant la sélection d'un projet aléatoire -->
        <section class="projet-random">
            <h2>Choisis un projet au hasard</h2>
            <img src=".images/cartes/carteDosR" alt="Carte">
        </section>
        <section class="decks-expo">
            <h2>Nos decks de cartes d’expositions</h2>
            <?php wp_nav_menu(array(
                "menu" => "exposition",
                'container' => 'nav',
                'container_class' => 'expo-menu'
            )); ?>      
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
