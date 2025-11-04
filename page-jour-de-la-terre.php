<?php get_header(); ?>

    <main class="gallerie">
        <?php galerie_hero(); ?>

        <section id="gallerie-cartes">
            <?php 
                $query_args = galerie_set_args('jour de la terre');
                galerie_get_cartes($query_args);
            ?>
        </section>
    </main>
    
    <?php get_footer(); ?>
</body>
</html>

<?php galerie_carte_css(); ?>