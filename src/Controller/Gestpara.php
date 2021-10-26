<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class Gestpara
{

    public function index(Request $req)
    {
        //$request = Request::createFromGlobals();
        $age = $req->query->get("id", 20);
        echo $age;
        dump($req);
        die();
    }
}
