<?php 

    $links = new Links ("index", $page_home, $page_error404, $path_to_controllers.'/pages/', $path_to_views, $page_for_nav) ; 

?>
<nav>
    <ul>
        <?php echo $links -> getNavLinks ("active", "li", "", $page_for_nav) ?>
    </ul>
</nav>
