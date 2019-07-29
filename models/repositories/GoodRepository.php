<?php
namespace App\models\repositories;

use App\models\entities\Good;

/**
 * Class GoodRepository
 * @package App\models
 */
class GoodRepository extends Repository
{
    protected function getTableName()
    {
        return 'products';
    }

    protected function getEntityName()
    {
        return Good::class;
    }
}