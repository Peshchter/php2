<?php

namespace App\models\repositories;

use App\main\App;
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
        $this->bd = App::call()->bd;
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
        return $this->bd->find(
            $this->getEntityName(),
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
        foreach ($entity as $key => $value) {
            if ($key == 'bd' || $key == 'id') {
                continue;
            }
            $columns[] = $key;
            $params[":{$key}"] = $value ?: 'null';
        }
        $columnsString = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columnsString}) VALUES ({$placeholders})";
        $this->bd->execute($sql, $params);
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
