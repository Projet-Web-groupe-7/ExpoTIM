<?php get_header(); ?>

<main class="gallerie search-page">
    <h2>Résultats de recherche pour : "<?php echo esc_html(get_search_query()); ?>"</h2>
    <section id="gallerie-cartes">
        <?php
        global $wp_query;

        // Collect all matching posts
        if ( have_posts() ) {
            // Build arguments compatible with galerie_get_cartes()
            $args = array(
                'post_type'      => array('projets-arcade', 'projets-jour-terre'),
                'post__in'       => wp_list_pluck($wp_query->posts, 'ID'),
                'posts_per_page' => -1,
                'orderby'        => 'post__in',
            );

            galerie_get_cartes($args); // reuse your existing card layout
        } else {
            echo '<h1>Oops! Aucun projet trouvé...</h1>';
        }
        ?>
    </section>
</main>
<?php get_footer(); ?>
<?php galerie_carte_css(); ?>
