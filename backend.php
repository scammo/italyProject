<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 25.03.14
 * Time: 11:02
 */

require('config.php');

class backend extends config{
    function __construct(){
        $config = new config();
        try{
            switch($_SERVER['SERVER_NAME']){
                case 'localhost':
                    $this->db = new PDO("mysql:host=localhost;dbname=mifSchedule", "root", "scammo");
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
            (restaurantName, description, topListe, ranking, hipsterRanking, website, googlemaps)
            value
            (:restaurantName, :description, :rangliste,:ranking, :hipsterRanking, :websiteLink, :googlemaps)");
        $STH->execute($newData);
    }
    function get_top_ranking($amount = 3){
        $STH = $this->db->query("SELECT * FROM restaurantGuide ORDER BY topListe LIMIT $amount ");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH;
    }
    function show_ranking($ranking_amount){
        $returnData = "";
        $ranking_amount_full_star = $ranking_amount;
        while($ranking_amount_full_star > 0){
            $returnData .= "<img src='assets/img/star_full_16.png'/>";
            $ranking_amount_full_star--;
        }
        $ranking_amount_empty = 5-$ranking_amount;
        while($ranking_amount_empty > 0){
            $returnData .= "<img src='assets/img/star_empty_16.png'/>";
            $ranking_amount_empty--;
        }
        return $returnData;
    }
} 