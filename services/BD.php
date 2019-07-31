<?php
namespace App\services;
use App\traits\TSingleton;
class BD
{
    use TSingleton;

    private $config = [
        'user' => 'root',
        'pass' => '',
        'driver' => 'mysql',
        'bd' => 'lessons',
        'host' => 'localhost',
        'charset' => 'UTF8',
    ];

    /**
     * @var \PDO|null
     */
    protected $connect = null;

    /**
     * Возвращает только один коннект с базой - объект PDO
     * @return \PDO|null
     */
    protected function getConnect()
    {
        if (empty($this->connect)) {
            $this->connect = new \PDO(
                $this->getDSN(),
                $this->config['user'],
                $this->config['pass']
            );
            $this->connect->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_INTO
            );
        }
        return $this->connect;
    }

    /**
     * Создание строки - настройки для подключения
     * @return string
     */
    private function getDSN()
    {
        //'mysql:host=localhost;dbname=DB;charset=UTF8'
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['bd'],
            $this->config['charset']
        );
    }

    /**
     * Выполнение запроса
     *
     * @param string $sql 'SELECT * FROM users WHERE id = :id'
     * @param array $params [':id' => 123]
     * @return \PDOStatement
     */
    private function query(string $sql, array $params = [])
    {
        $PDOStatement = $this->getConnect()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    public function find(string $class, string $sql,array $params = [])
    {
        $PDOStatement = $this->query($sql, $params);
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetch();
    }

    /**
     * Получение всех строк
     * @param string $class
     * @param string $sql
     * @param array $params
     * @return mixed
     */
    public function findAll(string $class, string $sql, array $params = [])
    {
        $PDOStatement = $this->query($sql, $params);
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetchAll();
    }


    /**
     * Выполнение безответного запроса
     *
     * @param string $sql
     * @param array $params
     *
     */
    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params);
    }

    public function lastID()
    {
        return $this->getConnect()->lastInsertId();
    }
}