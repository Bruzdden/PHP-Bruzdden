<?php


class mySql implements IDB
{
    private $db;
    
    public function connect(string $host = "", string $username = "", string $password = "", string $database = ""): ?static
    {
        $this->db = mysqli_connect($host, $username, $password, $database);
        if (!$this->db) {
            return null;
        }
        return $this;
    }

    function select(string $query): array
    {
        $result = mysqli_query($this->db, $query);
        if (!$result) {
            return [];
        }
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function insert(string $table, array $data): bool
    {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        return (bool) mysqli_query($this->db, $sql);
    }

    function update(string $table, int $id, array $data): bool
    {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $set = implode(',', $updates);
        $sql = "UPDATE $table SET $set WHERE id = $id";
        return (bool) mysqli_query($this->db, $sql);
    }

    function delete(string $table, int $id): bool
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        return (bool) mysqli_query($this->db, $sql);
    }
}

?>
