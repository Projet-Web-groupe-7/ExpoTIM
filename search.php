<?php get_header(); ?>

<main class="gallerie search-page">

    <?php
    // Retrieve search term safely
    $search_query = '';

    if (!empty(get_query_var('s'))) {
        $search_query = get_query_var('s');
    } elseif (!empty($_GET['s'])) {
        $search_query = sanitize_text_field($_GET['s']);
    } elseif (!empty($_POST['s'])) {
        $search_query = sanitize_text_field($_POST['s']);
    }
    ?>

    <h2>Résultats de recherche pour : "<?php echo esc_html($search_query); ?>"</h2>

    <section id="gallerie-cartes">

        <!-- REQUIRED FOR ANIMATION -->
        <div class="paquet"></div>

        <?php
        global $wp_query;

        if (have_posts()) {

            foreach ($wp_query->posts as $post) {

                $post_type = get_post_type($post);

                if ($post_type === 'projets-graphisme') {
                    $case = 'graphisme';
                } elseif ($post_type === 'projets-arcade') {
                    $case = 'arcade';
                } elseif ($post_type === 'projets-finissants') {
                    $case = 'finissants';
                }
                 else {
                    continue;
                }

                // Render the card
                $args = [
                    'post_type' => $post_type,
                    'p'         => $post->ID
                ];

                galerie_get_cartes($args, $case,  $search_query);
            }

        } else {
            echo '<h1>Oops! Aucun projet trouvé...</h1>';
        }
        ?>

    </section>

</main>

<?php get_footer(); ?>
<?php galerie_carte_css(); ?>