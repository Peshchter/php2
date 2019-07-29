<?php

namespace App\models\repositories;

use App\models\entities\Entity;
use App\services\BD;

/**
 * Class Model
 * @package App\models
 *
 * @property int $id
 */
abstract class Repository
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->bd = BD::getInstance();
    }

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected function getTableName();

    abstract protected function getEntityName();

    /**
     * Возращает запись с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return BD::getInstance()->find(
            get_called_class(),
            $sql,
            [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return $this->bd->findAll($this->getEntityName(), $sql);
    }

    //INSERT INTO users(fio, login, password) VALUES (:fio, :login, :password)

    protected function insert($entity)
    {
        $columns = [];
        $params = [];
        $values = [];

        foreach ($entity as $key => $value) {
            if ($key == 'bd' || $key == 'id') {
                continue;
            }
            $columns[] = $key;
            $params[":{$key}"] = $value;
            $values[] = $value;
        }

        $columnsString = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        $valuestring = implode(', ', $values);
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columnsString}) VALUES ({$valuestring})";
        $this->bd->execute($sql, $params);
        //$this->id = $this->bd->lastInsertId();
    }

    protected function update($entity)
    {
        $string = '';
        $table = $this->getTableName();
        foreach ($entity as $name => $value ){
            if($name != 'id' && $name!='bd') {
                $string .= "{$name}='{$value}', ";
            }
        }
        $string  = substr($string, 0, -2);
        $sql = "UPDATE {$table} SET {$string} WHERE id = {$entity->id}";
        $this->bd->execute($sql);
    }

    public function save($entity)
    {
        $table = $this->getTableName();
        $temp = $this->bd->execute("SELECT * FROM {$table} WHERE id = :id", [':id' => $entity->id]);
        $temp->setFetchMode(\PDO::FETCH_CLASS, get_class($entity));

        if ($temp->fetch()) {
            $this->update($entity);
            return;
        } else {
            $this->insert($entity);
            return;
        }
    }

    public function delete($entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id ";
        $this->bd->execute($sql, [':id' => $entity->id]);
    }
}
