<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;


class Task
{
    public function runtask(Request $req)
    {

        $opt = $req->query->get("op", 50);
        dump($req);
        echo $opt;
        die();
    }
}
