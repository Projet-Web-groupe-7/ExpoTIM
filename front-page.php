<?php get_header(); ?>
    <main class="main-front-page">
        <!-- Section titre et video-->
        <section class="hero">

            <h1 class="titreLogo"><?php echo get_bloginfo('name'); ?></h1>
            
            <div class="contenuVideo">
                <video autoplay loop muted playsinline class="video-front-page">
                    <source src="<?php echo get_template_directory_uri(); ?>/video/VideoPromotionnelleWeb.mp4" type="video/mp4">
                </video> 
            </div> 
        </section>
        <!-- Section contenant la description de l'exposition -->
        <section class="desc-expo fondu-en-bas">
            <h2>C'est quoi l'expo TIM?</h2>
            <p><?php echo get_theme_mod('hero_desc', __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5')); ?></p>
        </section>
        <?php get_template_part('template-parts/division'); ?>
        <!-- Section contenant la sélection d'un projet aléatoire -->
        <?php section_projet_random(); ?>
        <?php get_template_part('template-parts/division'); ?>
        <section class="decks-expo fondu-en-bas">
            <h2>Nos decks de cartes d’expositions</h2>
            <!--  Boîte décorative -->
            <div class="expo-deck">
                <span class="expo-boite"></span>
                <?php 
                    wp_nav_menu(array(
                        'menu' => 'exposition',
                        'container' => 'nav',
                        'container_class' => 'expo-menu',
                        'menu_class' => 'deck-cartes', // Classe CSS pour l'élément <ul>
                    )); 
                ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>