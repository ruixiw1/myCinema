
<?php

class DBConnection
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "shopster";
	private $usertb = "user_info";
	private $producttb =  "product";

	public  $connection;

	static $db_connection = null;

	private function __construct()
	{
		$this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
	public function createUserTable()
	{
		$this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		$sql = " CREATE TABLE IF NOT EXISTS $this->usertb
                            (username VARCHAR (255) NOT NULL PRIMARY KEY,
                             password VARCHAR (255) NOT NULL,
							 email text NOT NULL
                            );";
		if (!mysqli_query($this->connection, $sql)) {
			echo "Error creating table : " . mysqli_error($this->connection);
		} else {
			return false;
		}
	}
	public function createProductTable()
	{

		$sql = " CREATE TABLE IF NOT EXISTS $this->producttb
                            (product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (255) NOT NULL,
                             price decimal (10,2),
                             image VARCHAR (100),
							 special boolean NOT NULL default 0
                            );";
		if (!mysqli_query($this->connection, $sql)) {
			echo "Error creating table : " . mysqli_error($this->connection);
		} else {
			return false;
		}
	}
	public function initialProducts()
	{
		$sql = "INSERT INTO `product`( `product_name`, `price`, `image`, `special`) VALUES 
		('aj1Blue',299,'./image/image1.webp',1),
		('aj1Red',199,'./image/image2.webp',1),
		('aj1white',399,'./image/image3.webp',1),
		('aj1Silver',699,'./image/image4.webp',1),
		('yeezy350#1',299,'./image/image5.webp',1),
		('yeezy350#2',599,'./image/image6.jpeg',1)";
		if (!mysqli_query($this->connection, $sql)) {
			echo "Error creating table : " . mysqli_error($this->connection);
		} else {
			return false;
		}
	}

	public static function get_instance()
	{
		if (is_null(self::$db_connection)) {
			self::$db_connection = new DBConnection();
		}

		return self::$db_connection;
	}


	public function get_connection()
	{
		return $this->connection;
	}

	public function getSpecialItem()
	{
		$sql = "SELECT * FROM $this->producttb where special=1";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
	}

	public function getAllItem()
	{
		$sql = "SELECT * FROM $this->producttb";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
	}

	public function getItemFilter($catId, $sortID)
	{
		$sql = '';
		if ($catId == 0 || $catId == NULL) {
			switch ($sortID) {
				case 1: {
						$sql = "SELECT * FROM $this->producttb order by date_added desc";
						break;
					}
				case 2: {
						$sql = "SELECT * FROM $this->producttb order by price desc ";
						break;
					}
				case 3: {
						$sql = "SELECT * FROM $this->producttb order by price asc";
						break;
					}
				default: {
						$sql = "SELECT * FROM $this->producttb";
					}
			}
		} else {
			switch ($sortID) {
				case 1: {
						$sql = "SELECT * FROM $this->producttb where category_id = $catId order by date_added desc";
						break;
					}
				case 2: {
						$sql = "SELECT * FROM $this->producttb where category_id = $catId order by price desc ";
						break;
					}
				case 3: {
						$sql = "SELECT * FROM $this->producttb where category_id = $catId order by price asc";
						break;
					}
				default: {
						$sql = "SELECT * FROM $this->producttb where category_id = $catId";
					}
			}
		}


		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
	}
}

?>