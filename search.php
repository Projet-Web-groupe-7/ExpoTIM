<?php get_header(); ?>

<main class="gallerie search-page">
    <?php
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
        <?php
        global $wp_query;

        if ( have_posts() ) {
            $args = array(
                'post_type'      => array('projets-arcade', 'projets-graphisme'),
                'post__in'       => wp_list_pluck($wp_query->posts, 'ID'),
                'posts_per_page' => -1,
                'orderby'        => 'post__in',
            );

            galerie_get_cartes($args); 
        } else {
            echo '<h1>Oops! Aucun projet trouvé...</h1>';
        }
        ?>
    </section>
</main>
<?php get_footer(); ?>
<?php galerie_carte_css(); ?>
