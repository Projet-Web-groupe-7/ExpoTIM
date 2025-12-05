<!DOCTYPE html>
<html lang="fr-ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <title>EXPO-TIM</title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="curseur"></div>

    <header>
        <div class="entete">
            <figure class="entete-logo">
                    <?php  
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                    ?>
            </figure>
            <input type="checkbox" id="maCheckbox" aria-label="menu-burger">
           
            <div class="entete-navigation">
                <?php wp_nav_menu(array(
                    "menu" => "principal",
                    'container' => 'nav',
                    'container_class' => 'entete-menu'
                )); ?>
            </div>
            <div class="entete-recherche">
                    <?php get_search_form(); ?>
            </div>
            <label for="maCheckbox" class="boutons">
                <div class="trait"></div>
                <div class="trait"></div>
                <div class="trait"></div>
            </label>
        </div>
    </header>