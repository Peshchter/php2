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
    abstract protected static function getTableName();

    /**
     * Возращает пользователя с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return BD::getInstance()->find(
            get_called_class(),
            $sql,
            [':id' => $id]);

}

    /**
     *
     */
    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return BD::getInstance()->findAll(get_called_class(), $sql);
    }

    public function delete()
    {
        $table = static::getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $this->bd->execute($sql, [':id' => $this->id]);
    }

    public function test()
    {
        $names = "";
        $values = "";
        foreach ($this as $name => $value ){
            if($name != 'id') {
                $names .= $name.", ";
                $values.= "'{$value}', ";}
        }
        $names  = substr($names, 0, -2);
        $values  = substr($values, 0, -2);
        $sql = "INSERT INTO users ({$names}) VALUES ({$values})";
        $this->bd->execute($sql);
    }

    public function save()
    {
        $table = static::getTableName();
        $temp = $this->bd->execute("SELECT * FROM {$table} WHERE name = :name", [':name'=>$this->name]);
        $temp->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        if($temp->fetch())
        {
            $this->update($this, $table);
            //          echo "updating";

        }else {
            $this->insert($this, $table);
            //          echo "inserting";
        }

    }

    private function update($obj, $table)
    {
        $string = '';
        foreach ($obj as $name => $value ){
            if($name != 'id' && $name!='bd') {
                $string .= "{$name}='{$value}', ";
            }
        }
        $string  = substr($string, 0, -2);
        $sql = "UPDATE {$table} SET {$string} WHERE id = {$obj->id}";
        $this->bd->execute($sql);
    }
    private function insert($obj, $table)
    {
        $names = "";
        $values = "";
        foreach ($obj as $name => $value ){
            if($name != 'id' && $name!='bd') {
                $names .= $name.", ";
                $values.= "'{$value}', ";}
        }
        $names  = substr($names, 0, -2);
        $values  = substr($values, 0, -2);
        $sql = "INSERT INTO {$table} ({$names}) VALUES ({$values})";
        $this->bd->execute($sql);
    }
}
