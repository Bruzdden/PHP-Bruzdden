<?php
require_once("DB.php");

$db = new DB("localhost", "root", "root", "filmy");

if(isset($_POST["addFilm"])){
    $db->addFilm($_POST["filmName"], $_POST["herecID"]);
}

if(isset($_POST["addActor"])){
    $db->addActor($_POST["actorName"], $_POST["actorSurname"]);
}


$result = $db->getFilmsAndActors();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Filmy a herci</title>
</head>
<body>
    <h1>Filmy</h1>
    <ul>
        <?php foreach ($result["film"] as $film ) { ?>
            <li><?php echo $film["jmeno"] . " " . $db->Select($film["Herec_idHerec"]); ?></li>
        <?php } ?>
    </ul>
    <h1>Herci</h1>
    <ul>
        <?php foreach ($result["herec"] as $herec) { ?>
            <li><?php echo $herec["jmeno"] . " " . $herec["prijmeni"]; ?></li>
        <?php } ?>
    </ul>

<h1>Přidat film</h1>
<form method="post">
    <input type="text" name="filmName">
    <select name="herecID">
        <?php foreach ($result["herec"] as $herec) { ?>
            <option value="<?php echo $herec["idHerec"]; ?>"><?php echo $herec["jmeno"] . " " . $herec["prijmeni"]; ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="addFilm">Přidat film</button>
</form>

<h1>Přidat herce</h1>
<form method="post">
    <input type="text" name="actorName">
    <input type="text" name="actorSurname">
    
    <button type="submit" name="addActor">Přidat herce</button>
</form>
</body>
</html>
