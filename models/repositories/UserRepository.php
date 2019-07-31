<?php
namespace App\models\repositories;

use App\models\entities\User;

/**
 * Class UserRepository
 * @package App\models\repositories
 *
 * @method User getOne($id)
 *
 */
class UserRepository extends Repository
{
    protected function getTableName()
    {
        return 'users';
    }

    protected function getEntityName()
    {
        return User::class;
    }

    /**
     * @return User | null
     */
    protected function signIn()
    {
        return null;
    }

    /**
     * Возращает запись с указанным id
     *
     * @param string $name ID Записи таблицы
     * @return User
     */
    public function getUserByLogin($login)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login LIMIT 1";
        return $this->bd->find(
            $this->getEntityName(),
            $sql,
            [':login' => $login]);
    }
}
