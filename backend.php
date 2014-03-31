<?php


require('config.php');

class backend extends config{
    function __construct(){
        $config = new config();
        try{
            switch($_SERVER['SERVER_NAME']){
                case 'localhost':
                    $this->db = new PDO("mysql:host=localhost;dbname=italyProject", "root", "scammo");
                    break;
                default:
                    $this->db = new PDO("mysql:host=localhost;dbname=$config->dbNameName", "$config->dbNameName", "$config->dbPassword");
            }
            $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        }catch(PDOException $e) {
            //If there are any problems print an error message
            echo $e->getMessage();
        }
    }
    function new_restaurant($newData){
        $STH = $this->db->prepare(
            "INSERT INTO restaurantGuide
            (restaurantName, description, topListe, ranking, preisLeistung, geschmackRanking,locationRanking, hipsterRanking, website, googlemaps)
            value
            (:restaurantName, :description, :rangliste,:ranking, :preisleistungRanking, :geschmackRanking,:locationRanking, :hipsterRanking, :websiteLink, :googlemaps)");
        $STH->execute($newData);
    }
    function get_top_ranking($amount = 3){
        $STH = $this->db->query("SELECT * FROM restaurantGuide ORDER BY topListe LIMIT $amount ");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH;
    }
    function get_all_restaurants(){
        $STH = $this->db->query("SELECT * FROM restaurantGuide ORDER BY restaurantName");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH;
    }
    function ranking_set_up($type, $ranking_amount){
        $returnData = "";
        $ranking_amount_full_star = $ranking_amount;
        while($ranking_amount_full_star > 0){
            // $returnData .= "<img src='assets/img/star_full_16.png'/>";
            $returnData .= "<span class='full".$type."'></span>";
            $ranking_amount_full_star--;
        }
        $ranking_amount_empty = 5-$ranking_amount;
        while($ranking_amount_empty > 0){
            // $returnData .= "<img src='assets/img/star_empty_16.png'/>";
            $returnData .= "<span class='empty".$type."'></span>";
            $ranking_amount_empty--;
        }
        return $returnData;
    }
    function show_generell_ranking($ranking_amount){
        return $this->ranking_set_up('star', $ranking_amount);
    }
    function show_hipster_ranking($ranking_amount){
        return $this->ranking_set_up('dreieck', $ranking_amount);
    }
    function show_price_ranking($ranking_amount){
        return $this->ranking_set_up('money', $ranking_amount);
    }
    function show_food_ranking($ranking_amount){
        return $this->ranking_set_up('food', $ranking_amount);
    }
    function show_location_ranking($ranking_amount){
        return $this->ranking_set_up('location', $ranking_amount);
    }
} 
