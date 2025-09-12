<?php 

namespace List\Model\Connection;
use PDO;

class ConnectionFactory
{
    private static ?PDO $instance = null;
    private static string $dsn = "pgsql:host=localhost;dbname=to_do;port=5432";
    private static string $username = "postgres";
    private static string $password = "moon";

    private function __construct()
    {
        self::$instance = new PDO(self::$dsn, self::$username, self::$password);
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(self::$dsn, self::$username, self::$password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Erro ao conectar ao banco: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}