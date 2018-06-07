<?PHP
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");
$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database<br/>");
}
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($connection->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

$sql1 = "INSERT INTO MyGuests (firstname, lastname, email) values ('Squall', 'Lionheart','mail@mail.com')";
if ($connection->query($sql1) === TRUE) {
   echo "User created successfully";
} else {
    echo "<br/>Error creating user: " . $connection->error;
}

$sql2 = "Select * from MyGuests"
if ($connection->query($sql2) === TRUE) {
   $result=mysqli_query($connection,$sq2);
   while($row = mysqli_fetch_array($result)) {
    $posts[] = $row['id'].$row['firstname'].$row['lastname'].$row['email'];
    print_r($posts);
}
} else {
    echo "<br/>Error: " . $connection->error;
}
    
$connection->close();
?>
