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

    public function addFilm($filmID, $filmName) {
        $filmID = mysqli_real_escape_string($this->db, $filmID);
        $filmName = mysqli_real_escape_string($this->db, $filmName);
        $sql = "INSERT INTO film (idFilm, jmeno) VALUES ('$filmID','$filmName')";
        if (mysqli_query($this->db, $sql)) {
            echo "Film přídán úspěšně";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
    }

    public function addActor($actorName, $actorSurname, $filmID) {
        $actorName = mysqli_real_escape_string($this->db, $actorName);
        $actorSurname = mysqli_real_escape_string($this->db, $actorSurname);
        $filmID = mysqli_real_escape_string($this->db, $filmID);
        $sql = "INSERT INTO herec (jmeno, prijmeni, Film_idFilm) VALUES ('$actorName', '$actorSurname', '$filmID')";
        if (mysqli_query($this->db, $sql)) {
            echo "Herec přidán úspěšně";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
    }

    public function getFilmsAndActors(){
        $films_query = "SELECT idFilm, jmeno FROM film";
        $actors_query = "SELECT jmeno, prijmeni, Film_idFilm FROM herec";

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

    public function __destruct() {
        mysqli_close($this->db);
    }
}
