<?php
namespace App\models;

use App\services\BD;

abstract class Model
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

    /**
     * Возращает пользователя с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->bd->find($this, $sql, [':id' => $id]);
}

    /**
     *
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->bd->findAll($this, $sql);
    }

    public function save()
    {
        $this->bd->save($this, $this->getTableName());
    }

    public function delete()
    {
        $this->bd->delete($this, $this->getTableName());
    }

    public function test()
    {
        $this->bd->testAdd($this);
    }
}
