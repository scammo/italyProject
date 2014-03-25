<?
require('backend.php');
$backendData = new backend();
?>
<!DOCYTPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Schüler Restaurant guide für Verona</title>
        <style>
            <?
            //Der Style wird direkt in die seite geladen für einen besseren Pagespeed
            echo file_get_contents('assets/css/style.css');
            ?>
        </style>
    </head>
    <body>
        <header>
            <h1>Schüler Restaurant guide für Verona</h1>
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
                    <header>
                        <h2><?=$restaurantName?></h2>
                    </header>
                    <aside>
                        Ranking: <?=$backendData->show_ranking($ranking)?> (<?=$ranking?>/5)
                        Hipster Ranking: <?=$backendData->show_ranking($hipsterRanking)?>
                    </aside>
                    <p>
                        <?=$description?>
                    </p>
                </article>
                <?
            }
            ?>
            <article></article>
        </section>
        <script>
            <?
            //Der Style wird direkt in die seite geladen für einen besseren Pagespeed
            echo file_get_contents('assets/js/script.css');
            ?>
        </script>
    </body>
</html>