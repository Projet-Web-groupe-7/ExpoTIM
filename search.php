<?php if ( have_posts() ) : ?>
    <?php
    $display_query = get_query_var('custom_search_display') ?: get_search_query();
    ?>
    <h2>Search Results for: "<?php echo esc_html($display_query); ?>"</h2>
    <ul>
        <?php while ( have_posts() ) : the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <!-- Optional: show excerpt or matching member here -->
            </li>
        <?php endwhile; ?>
    </ul>
<?php else : ?>
    <p>No results found.</p>
<?php endif; ?>
<p>
<?php 
    $members = [];
    for ($i = 1; $i <= 5; $i++) {
        $member_field = "projet-" . get_post_field('post_name', get_the_ID()) . "_membre-$i";
        $member_name = get_post_meta(get_the_ID(), $member_field, true);
        if ($member_name) $members[] = $member_name;
    }
    if (!empty($members)) {
        echo 'Members: ' . implode(', ', $members);
    }
?>
</p>
