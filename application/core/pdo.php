<?
//namespace pdo;

class My_Pdo
{
	private static $_instance = null;
	private static $prepared_queries = [];
	
	private function __construct () {
		
		$this->_instance = new PDO(
			DB_DSN,
			DB_LOGIN,
			DB_PASSWORD,
	    	[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
	    );

	}

	private function __clone () {}
	private function __wakeup () 
	{
		throw new \Exception("Cannot unserialize a singleton.");
	}

	private static function db_prepare_query($query, $key)
	{
		$pdo = self::getInstance();
		self::$prepared_queries[$key] = $pdo->_instance->prepare($query);
	}

	private static function db_execute_query($key)
	{	
		self::$prepared_queries[$key]->execute();
	}

	public static function db_select_array($query, $key="temp")
	{
		self::do_query($query, $key);
		if(array_key_exists($key, self::$prepared_queries))
		{
			$query_result = self::$prepared_queries[$key];
			$result = array();
			while ($row = $query_result->fetch()) {
				$result[] = $row;
			}
			return $result;
		}
		else
		{
			throw new \Exception("Query does't exist");
		}
		
	}

	public static function db_select_row($query, $key="temp")
	{
		self::do_query($query, $key);
		if(array_key_exists($key, self::$prepared_queries))
		{
			$query_result = self::$prepared_queries[$key];
			$result = array();
			while ($row = $query_result->fetch()) {
				$result = $row;
			}
			return $result;
		}
		else
		{
			throw new \Exception("Query does't exist");
		}
		
	}

	public static function do_query($query, $key)
	{
		self::db_prepare_query($query, $key);
		self::db_execute_query($key);
	}


	public static function getInstance()
	{
		if (self::$_instance != null) {
			return self::$_instance;
		}

		return new self;
	}
}