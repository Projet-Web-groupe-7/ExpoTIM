<?php get_header(); ?>
    <section class="intro-expo">
        <div class="intro-expo-wrapper">

            <h1 class="intro-texte">
                <?php 
                    $intro = "Bienvenue sur le site de l'expoTIM : Les AS du TIM.";
                    $chars = preg_split('//u', $intro, -1, PREG_SPLIT_NO_EMPTY);
                    foreach ($chars as $char) {
                        if (trim($char) === '') {
                            echo "<span class='char char-space'>&nbsp;</span>";
                        } else {
                            echo "<span class='char'>{$char}</span>";
                        }
                    }
                ?>
            </h1>

            <a href="#main" class="intro-bouton">Entrer sur le site</a>

        </div>
    </section>
    <main class="main-front-page" id="main">
        <!-- Section titre et video-->
        <section class="hero">
            <div class="hero-contenu">
                <h1 class="titreLogo"><?php echo get_bloginfo('name'); ?></h1>
                <!-- Section contenant la description de l'exposition -->
                <section class="desc-expo">
                    <h2>C'est quoi l'expoTIM?</h2>
                    <p><?php echo get_theme_mod('hero_desc', __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5')); ?></p>
                </section>
            </div>
            
            <video autoplay loop muted playsinline class="video-front-page">
                <source src="<?php echo get_template_directory_uri(); ?>/video/VideoPromotionnelleWeb.mp4" type="video/mp4">
            </video> 
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