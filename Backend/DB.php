<?php

class DB {
    private $servername;
    private $username;
    private $password;
    private $DBname;
    private $db;

    public function __construct($servername, $username, $password, $DBname){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->DBname = $DBname;

        $this->db = mysqli_connect($servername, $username, $password, $DBname);
        mysqli_query($this->db, "SET CHARACTER SET UTF8");
    }

    public function check(){
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }

    public function addFilm($filmName, $herecID) {
        $filmName = mysqli_real_escape_string($this->db, $filmName);
        $herecID = mysqli_real_escape_string($this->db, $herecID);
        $sql = "INSERT INTO `film` (`idFilm`, `jmeno`, `Herec_idHerec`) VALUES (NULL, '$filmName', '$herecID')";
        if (mysqli_query($this->db, $sql)) {
            echo "Film přídán úspěšně";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
    }

    public function addActor($actorName, $actorSurname) {
        $actorName = mysqli_real_escape_string($this->db, $actorName);
        $actorSurname = mysqli_real_escape_string($this->db, $actorSurname);
        $sql = "INSERT INTO `herec` (`idHerec`, `jmeno`, `prijmeni`) VALUES (NULL, '$actorName', '$actorSurname')";
        if (mysqli_query($this->db, $sql)) {
            echo "Herec přidán úspěšně";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
    }

    public function getFilmsAndActors(){
        $films_query = "SELECT * FROM `film`";
        $actors_query = "SELECT * FROM `herec`";

        $films_result = mysqli_query($this->db, $films_query);
        $actors_result = mysqli_query($this->db, $actors_query);

        $films = array();
        while ($row = mysqli_fetch_assoc($films_result)) {
            $films[] = $row;
        }

        $actors = array();
        while ($row = mysqli_fetch_assoc($actors_result)) {
            $actors[] = $row;
        }

        $result = array("film" => $films, "herec" => $actors);

        return $result;
    }
    public function Select($film){
        $tohle = mysqli_query($this->db, "SELECT `herec`.`jmeno`, `herec`.`prijmeni` FROM `herec` JOIN `film` ON `herec`.`idHerec` = `film`.`$film`");
        return $tohle;
    }

    public function __destruct() {
        mysqli_close($this->db);
    }
}
