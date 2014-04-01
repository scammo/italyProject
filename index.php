<?
require('backend.php');
   $backendData = new backend();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimal-ui, minimum-scale=1, maximum-scale=1">
        <title>Schüler Restaurant guide für Verona</title>
        <style>
            <? echo file_get_contents('assets/css/style.min.css'); ?>
        </style>
    </head>
    <body>
        <header>
            <h1>SchülerRestaurantGuide</h1>
            <h2>Der Guide der dich günstig durch Verona leitet</h2>
        </header>
        <section class="topRanking clearfix">
            <?
//            print_r($backendData->get_top_ranking()->fetchAll()) ;
                foreach($backendData->get_top_ranking()->fetchAll() as $restaurant){
                    $restaurantName = $restaurant->restaurantName;
                    $description = $restaurant->description;
                    $ranking = $restaurant->ranking;
                    $hipsterRanking = $restaurant->hipsterRanking;
            ?>
                <article class="clearfix">
                    <h3 class="clearfix"><?=$restaurantName?></h3>
                    <ul>
                        <li>Ranking: <?=$backendData->show_ranking($ranking)?> <!--(<?=$ranking?>/5)--></li>
                        <li>Hipster Ranking: <?=$backendData->show_ranking($hipsterRanking)?></li>
                    </ul>
                   <!-- <p class="clearfix">
                        <?=$description?>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>-->
                </article>
                <?
            }
            ?>
        </section>
        <section id="slider" class="clearfix">
            <div class="box">
                <ul class="bxslider">
                    <li><img src="http://placehold.it/300x300" title="" alt="" height="300" width="300" /></li>
                    <li><img src="http://placehold.it/300x300" title="" alt="" height="300" width="300" /></li>
                    <li><img src="http://placehold.it/300x300" title="" alt="" height="300" width="300" /></li>
                    <li><img src="http://placehold.it/300x300" title="" alt="" height="300" width="300" /></li>
                </ul>
            </div>
        </section>
        <section class="googleMaps" id="map"></section>
        <section class="allRestaurants">
            <?
            //            print_r($backendData->get_top_ranking()->fetchAll()) ;
            foreach($backendData->get_all_restaurants()->fetchAll() as $restaurant){
                $restaurantName = $restaurant->restaurantName;
                $description = $restaurant->description;
                $ranking = $restaurant->ranking;
                $hipsterRanking = $restaurant->hipsterRanking;
                $website = $restaurant->website;

                ?>
                <article class="clearfix">
                    <h3 class="clearfix"><?=$restaurantName?></h3>
                    <ul>
                        <li>Ranking: <?=$backendData->show_ranking($ranking)?> <!--(<?=$ranking?>/5)--></li>
                        <li>Hipster Ranking: <?=$backendData->show_ranking($hipsterRanking)?></li>
                    </ul>
                     <p class="clearfix">
                        <?=$description?>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </article>
            <?
            }
            ?>
        </section>

        <footer>
            <ul class="clearfix">
                <li><a href="mailto:kontakt@mif-sh.de?subject=SchülerRestaurantGuide Kontakt" title="Schreib uns eine E-Mail" target="_self">kontakt@mif-sh.de</a></li>
                <li><a href="#impressum.php?noch-in-arbeit" title="Impressum" target="_self">Impressum</a></li>
            </ul>
        </footer>
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js"></script> -->
        <script>
            <?
            echo file_get_contents('https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js');
            echo file_get_contents('assets/js/main.min.js');
            ?>
        </script>
    </body>
</html>
