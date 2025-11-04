<?php 
get_header(); 
$post_type = get_post_type();



switch ($post_type){
    case 'projets-arcade':
        get_template_part('template-parts/projet-arcade');
    break;
    
}


?>