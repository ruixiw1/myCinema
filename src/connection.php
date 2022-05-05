
<?php
//DB connection class
class DBConnection
{	//Database parameters
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "shopster";
	private $usertb = "user_info";
	private $producttb =  "product";

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
	//method to run query on Database return item has special==1, on sale item
	public function getSpecialItem()
	{
		$sql = "SELECT * FROM $this->producttb where special=1";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
	}
	//method to run query and return all products
	public function getAllItem()
	{
		$sql = "SELECT * FROM $this->producttb";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
	}
	//run query to return products respect to the option passed from filter
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
	//get single item respect to the product ID
	public function getSingleItem($product_id)
	{
		$sql = "SELECT * FROM $this->producttb where product_id = $product_id";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			return $result;
		}
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

}	

?>