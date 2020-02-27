<?php
namespace Application\Core;

use \PDO;

class MyPdo
{
    private static $instance = null;
    private static $prepared_queries = [];

    private function __construct()
    {
        $this->instance = new PDO(
            DB_DSN,
            DB_LOGIN,
            DB_PASSWORD,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
        throw new \Exception('Cannot unserialize a singleton.');
    }

    private static function dbPrepareQuery($query, $key)
    {
        $pdo = self::getInstance();
        self::$prepared_queries[$key] = $pdo->instance->prepare($query);
    }

    private static function dbExecuteQuery($key)
    {
        self::$prepared_queries[$key]->execute();
    }

    public static function dbSelectArray($query, $key = 'temp')
    {
        self::dbQuery($query, $key);
        if (array_key_exists($key, self::$prepared_queries)) {
            $query_result = self::$prepared_queries[$key];
            $result = [];
            while ($row = $query_result->fetch()) {
                $result[] = $row;
            }

            return $result;
        }

        return 'Ошибка с запросом';
    }

    public static function dbSelectRow($query, $key = 'temp')
    {
        self::dbQuery($query, $key);
        if (array_key_exists($key, self::$prepared_queries)) {
            $query_result = self::$prepared_queries[$key];
            $result = [];
            while ($row = $query_result->fetch()) {
                $result = $row;
            }

            return $result;
        }

        return 'Ошибка с запросом';
    }

    public static function dbQuery($query, $key = 'temp')
    {
        self::dbPrepareQuery($query, $key);
        self::dbExecuteQuery($key);
    }

    public static function getInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        }

        return new self;
    }
}
