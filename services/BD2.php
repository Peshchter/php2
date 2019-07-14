<?php
namespace App\services;

use App\models\CalcRows;

class BD2 implements IBD, IBD2
{
    use CalcRows;

    public function find(string $sql)
    {
        echo $sql;
    }

    public function findAll(string $sql)
    {
        return $sql;
    }
}