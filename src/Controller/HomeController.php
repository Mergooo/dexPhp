<?php

namespace App\Controller;

class HomeController extends BaseController
{

    public function index(): void
    {
        parent::loadView('home');
    }

}
