<?php get_header(); ?>

    <main class="gallerie">
        <?php galerie_hero(); ?>

        <section id="gallerie-cartes">
            <?php 
                $case = 'graphisme';
                $query_args = galerie_set_args($case);
                galerie_get_cartes($query_args, $case);
            ?>
        </section>
    </main>
    
    <?php get_footer(); ?>
</body>
</html>

<?php galerie_carte_css(); ?>