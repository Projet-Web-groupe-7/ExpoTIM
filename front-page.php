<?php get_header(); ?>
    <main class="main-front-page">
        <!-- Section contenant le logo, la vidéo et la description -->
        <section class="hero">
            <h1 class="titreLogo"><?php echo get_bloginfo('name'); ?></h1>
            <figure class="entete__logo">
                <?php 
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }; 
                ?>
            </figure>
            <video class="video-front-page" src="">
                
            </video>
            <div class="desc-expo">
                <h2>C'est quoi l'expo TIM?</h2>
                <p><?php echo get_theme_mod('hero_desc', __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5')); ?></p>
            </div>
            
        </section>
        <section class="projet-random">
            <h2>Choisis un projet au hasard</h2>
        </section>
        <section class="decks">
            <h2>Nos decks de carte d’expositions</h2>
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
