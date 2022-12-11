<?php 

    include ('./modules/controllers/datas/datas_site.php') ;
    include ($path_to_controllers.'/classes/title_page.php') ;

    $title = new Title_page () ;

?>

<!DOCTYPE html>
<html lang="<?php echo $language ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/output.css">
    <title>
        <?php echo $title -> getTitlePage ($name_site, $name_page) ; ?>
    </title>
</head>