<?php

namespace Cymphone\Database;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $basePath = dirname(__DIR__, 3);
            $configFile = $basePath . '/config/database.php';
            
            if (!file_exists($configFile)) {
                throw new \Exception("Database configuration file not found: {$configFile}");
            }
            
            $config = require $configFile;
            
            // Проверяем, что конфигурация существует и содержит необходимые ключи
            if (!isset($config['default']) || !isset($config['connections'])) {
                throw new \Exception("Invalid database configuration: missing 'default' or 'connections'");
            }
            
            $defaultConnection = $config['default'];
            
            // Проверяем, что выбранное соединение существует
            if (!isset($config['connections'][$defaultConnection])) {
                throw new \Exception("Database connection '{$defaultConnection}' not found in configuration");
            }
            
            $dbConfig = $config['connections'][$defaultConnection];
            
            // Проверяем, что все необходимые параметры присутствуют
            $requiredKeys = ['host', 'port', 'database', 'username', 'password', 'charset'];
            foreach ($requiredKeys as $key) {
                if (!isset($dbConfig[$key])) {
                    throw new \Exception("Missing required database configuration key: {$key}");
                }
            }

            // Используем utf8mb4 и устанавливаем charset через опции PDO вместо DSN
            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s',
                $dbConfig['host'],
                $dbConfig['port'],
                $dbConfig['database']
            );

            try {
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ];
                
                // Устанавливаем charset через INIT_COMMAND, если указан
                if (isset($dbConfig['charset']) && !empty($dbConfig['charset'])) {
                    $charset = $dbConfig['charset'];
                    // Используем безопасный способ установки charset
                    $options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES '{$charset}'";
                }
                
                self::$connection = new PDO(
                    $dsn,
                    $dbConfig['username'],
                    $dbConfig['password'],
                    $options
                );
                
                // Дополнительно устанавливаем charset после подключения
                if (isset($dbConfig['charset']) && !empty($dbConfig['charset'])) {
                    $charset = $dbConfig['charset'];
                    self::$connection->exec("SET NAMES '{$charset}'");
                }
            } catch (PDOException $e) {
                throw new \Exception("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    public static function select(string $query, array $params = []): array
    {
        $stmt = self::getConnection()->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function insert(string $query, array $params = []): bool
    {
        $stmt = self::getConnection()->prepare($query);
        return $stmt->execute($params);
    }

    public static function update(string $query, array $params = []): bool
    {
        $stmt = self::getConnection()->prepare($query);
        return $stmt->execute($params);
    }

    public static function delete(string $query, array $params = []): bool
    {
        $stmt = self::getConnection()->prepare($query);
        return $stmt->execute($params);
    }
}

