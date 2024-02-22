<?php

namespace App\Controller;

use League\Plates\Engine;

class StartController
{
    public function index()
    {
        $templates = new Engine(__DIR__ . '/../../app/View');
        echo $templates->render('index');
    }
}

