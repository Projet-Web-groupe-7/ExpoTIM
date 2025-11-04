<?php get_header(); ?>

    <main class="gallerie">
        <?php galerie_hero(); ?>

        <section id="gallerie-cartes">
            <?php galerie_get_cartes(); ?>
        </section>
    </main>
    
    <?php get_footer(); ?>
</body>
</html>

<?php galerie_carte_css(); ?>