<?php get_header(); ?>

    <main class="gallerie">
<<<<<<< HEAD
        <?php galerie_hero(true); ?>
=======
        <?php galerie_hero(); ?>
>>>>>>> Erik_Sprint3

        <section id="gallerie-cartes">
            <div class="paquet" style="color:white;"></div>
            <?php 
<<<<<<< HEAD
                $case = 'arcade';
=======
                $case = 'finissants';
>>>>>>> Erik_Sprint3
                $query_args = galerie_set_args($case);
                galerie_get_cartes($query_args, $case);
            ?>
        </section>
    </main>
    
    <?php get_footer(); ?>
<<<<<<< HEAD
=======
</html>
>>>>>>> Erik_Sprint3

<?php galerie_carte_css(); ?>