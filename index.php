<p>front-page.php</p>
<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content() ?>
            </article>
    <?php endwhile; endif; ?>
    <main>
        <section class="projet-random">

        </section>
        <section class="decks">

        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>