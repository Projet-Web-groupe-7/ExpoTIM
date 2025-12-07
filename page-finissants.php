<?php get_header(); ?>

    <main class="gallerie">
        <?php galerie_hero(); ?>

        <section id="gallerie-cartes">
            <div class="paquet" style="color:white;"></div>
            <?php 
                $case = 'finissants';
                $query_args = galerie_set_args($case);
                galerie_get_cartes($query_args, $case);
            ?>
        </section>
    </main>
    
    <?php get_footer(); ?>
</html>

<?php galerie_carte_css(); ?>