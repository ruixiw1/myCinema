
<?php
//DB connection class
class DBConnection
{	//Database parameters
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "mycinema";
	private $usertb = "user_info";
	private $movietb = "all_movie";

	public  $connection;

	static $db_connection = null;
	//mysql connection
	private function __construct()
	{
		$this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}

	//return instance of DB connection
	public static function get_instance()
	{
		if (is_null(self::$db_connection)) {
			self::$db_connection = new DBConnection();
		}

		return self::$db_connection;
	}

	//return connection variable of DBConnection
	public function get_connection()
	{
		return $this->connection;
	}
	//check on if email is existing
	public function emailNotExist($email){
		$sql1 = "SELECT * FROM $this->usertb where `email` = '".$email."' ";
		$result1 = mysqli_query($this->connection, $sql1);

		if (mysqli_num_rows($result1) > 0 ) {
			return false;
		}
		return true;
	}
	//check on if username is existing
	public function usernameNotExist($username){
		$sql2 = "SELECT * FROM $this->usertb where `username` = '".$username."' ";
		$result2 = mysqli_query($this->connection, $sql2);
		if (mysqli_num_rows($result2) > 0 ) {
			return false;
		}
		return true;
	}
	public function userInfo($userName)
	{
		$sql = "SELECT * FROM $this->usertb where `username` = '".$userName."' ";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
	}

	public function findDate($date)
	{
		$sql = "SELECT * FROM $this->movietb where `date` = '".$date."' ";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return true;
		}
		return false;
	}

}	

?>