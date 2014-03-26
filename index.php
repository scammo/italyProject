<?
require('backend.php');
$backendData = new backend();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Schüler Restaurant guide für Verona</title>
        <style>
            <?
            //Der Style wird direkt in die seite geladen für einen besseren Pagespeed
            echo file_get_contents('assets/css/style.min.css');
            ?>
        </style>
    </head>
    <body>
        <header>
            <h1>SchülerRestaurantGuide </h1>
            <h2>Der Guide der dich günstig durch Verona leitet</h2>
        </header>
        <section class="topRanking">
            <?
//            print_r($backendData->get_top_ranking()->fetchAll()) ;
                foreach($backendData->get_top_ranking()->fetchAll() as $data){
                    $restaurantName = $data->restaurantName;
                    $description = $data->description;
                    $ranking = $data->ranking;
                    $hipsterRanking = $data->hipsterRanking;
            ?>
                <article>
                    <h3><?=$restaurantName?></h3>
                    <aside>
                        Ranking: <?=$backendData->show_ranking($ranking)?> (<?=$ranking?>/5)<br/>
                        Hipster Ranking: <?=$backendData->show_ranking($hipsterRanking)?>
                    </aside>
                    <p>
                        <?=$description?>
                    </p>
                </article>
                <?
            }
            ?>
        </section>
        <footer>
            <ul class="clearfix">
                <li><a href="#" title="" target="_self">kontakt@mif.de</a></li>
                <li><a href="#" title="" target="_self">Impressum</a></li>
            </ul>
        </footer>
        <script>
            <?
            //Der Style wird direkt in die seite geladen für einen besseren Pagespeed
            echo file_get_contents('assets/js/main.js');
            ?>
        </script>
    </body>
</html>