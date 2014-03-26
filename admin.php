<?
if(isset($_POST['submit'])){
    require('backend.php');
    $backend = new Backend;
    $newRestaurantData = array(
        "restaurantName" => mysql_real_escape_string($_POST["nameRestaurant"]),
        "rangliste" => mysql_real_escape_string($_POST["rangliste"]),
        "hipsterRanking" => mysql_real_escape_string($_POST["hipsterRanking"]),
        "ranking" => mysql_real_escape_string($_POST["ranking"]),
        "description" => mysql_real_escape_string($_POST["describtion"]),
        "googlemaps" => mysql_real_escape_string($_POST["googlemaps"]),
        "websiteLink" => mysql_real_escape_string($_POST["websiteLink"])
    );
    $backend->new_restaurant((array)$newRestaurantData);

    echo "New Restaurant<br/>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="">
            <h3>Neues Restaurant</h3>
            <input autofocus type="text" name="nameRestaurant" placeholder="Restaurant Name">
            <textarea name="describtion" placeholder="Kleine Beschreibung mit ergänzungen etc..." cols="40" rows="10"></textarea><br/>
            <input type="number" name="rangliste" placeholder="Rangliste">
            <input type="number" name="ranking" placeholder="Ranking">
            <input type="number" name="hipsterRanking" placeholder="Hipster Ranking">
            <br/>

            <input type="text" name="websiteLink" placeholder="Website Link">
            <input type="text" name="googlemaps" placeholder="Google Maps code">

            <br/>
            <input type="submit" value="Speichern" name="submit">
        </form>
    </body>
</html>