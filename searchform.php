<form class="recherche" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input class="recherche-input" type="search" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" />
    <button class="recherche-bouton" type="submit">
        <img class="recherche-img"  src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=ffffff" width="16" height="16">
    </button>
</form>