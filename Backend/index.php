<?php

class DB {
    private $servername;
    private $username;
    private $password;
    private $db;

    public function __construct($servername, $username, $password){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        $this->db = mysqli_connect($servername, $username, $password);
        mysqli_query($this->db, "SET CHARACTER SET UTF8");
    }

    public function check(){
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }

    public function __destruct() {
        mysqli_close($this->db);
    }
}
 
$Database = new DB("localhost", "root","root");
$Database->check();

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Table</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>

	<table>
		<thead>
			<tr>
				<th>Column 1</th>
				<th>Column 2</th>
				<th>Column 3</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Value 1</td>
				<td>Value 2</td>
				<td>Value 3</td>
			</tr>
			<tr>
				<td>Value 4</td>
				<td>Value 5</td>
				<td>Value 6</td>
			</tr>
			<tr>
				<td>Value 7</td>
				<td>Value 8</td>
				<td>Value 9</td>
			</tr>
		</tbody>
	</table>

</body>
</html>
