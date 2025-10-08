<p>front-page.php</p>
<?php get_header(); ?>
    <main>
        <section class="hero">
            <h1><?php echo get_bloginfo('name'); ?></h1>
            <video src="">
                
            </video>
            <h2>C'est quoi l'expo TIM?</h2>
            <p><?php echo get_theme_mod('hero_desc', __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5')); ?></p>
        </section>
        <section class="projet-random">

        </section>
        <section class="decks">

        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
