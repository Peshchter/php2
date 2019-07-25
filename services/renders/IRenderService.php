<?php

namespace App\services\renders;


interface IRenderService
{
    public function renderTmpl($template, $params = []);
}