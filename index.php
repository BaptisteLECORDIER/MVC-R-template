<?php  

    include ('./modules/controllers/datas/datas_site.php')           ;
    include ($path_to_controllers.'/datas/datas_sql_connection.php') ;
    include ($path_to_models.'/classes/database.php')                ;
    include ($path_to_controllers.'/classes/links.php')              ;

    $links    = new Links ($router, $page_home, $page_error404, $path_to_controllers.'/pages/', $path_to_views, $page_for_nav) ;
    $database = new DataBase ($dbhost , $db_username, $db_password, $db_name) ;

    $links -> createRouter () ;
    
?>





