<?php
require_once("DB.php");

$db = new DB("localhost", "root", "root", "filmy");

if(isset($_POST["addFilm"])){
    $db->addFilm($_POST["ifFilm"], $_POST["filmName"]);
}

if(isset($_POST["addActor"])){
    $db->addActor($_POST["actorName"], $_POST["actorSurname"], $_POST["Film_idFilm"]);
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
        <?php foreach ($result["film"] as $film) { ?>
            <li><?php echo $film["idFilm"] . " " . $film["name"]; ?></li>
        <?php } ?>
    </ul>
<h1>Herci</h1>
<ul>
    <?php foreach ($result["herec"] as $herec) { ?>
        <li><?php echo $herec["name"] . " " . $herec["prijmeni"] . " (" . $herec["Film_idFilm"] . ")"; ?></li>
    <?php } ?>
</ul>

<h1>Přidat film</h1>
<form method="post">
	<input type="text" name="idFilm">
    <input type="text" name="filmName">
    <button type="submit" name="addFilm">Přidat film</button>
</form>

<h1>Přidat herce</h1>
<form method="post">
    <input type="text" name="actorName">
    <input type="text" name="actorSurname">
    <select name="filmID">
        <?php foreach ($result["film"] as $film) { ?>
            <option value="<?php echo $film["idFilm"]; ?>"><?php echo $film["name"]; ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="addActor">Přidat herce</button>
</form>
</body>
</html>
