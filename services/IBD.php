<?php
namespace App\services;

use App\models\Model;

interface IBD
{
    public function find(Model $obj, string $sql, array $params = [] );
    public function findAll(Model $obj, string $sql, array $params = []);
}