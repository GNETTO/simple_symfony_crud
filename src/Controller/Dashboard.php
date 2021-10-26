<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Dashboard
{

    public function dashboard()
    {
        $request = Request::createFromGlobals();

        $age = $request->query->get("id", 20);
        echo $age;
        dump($request);
        die();
        return   new Response($request->attributes->get("age"));
    }

    public function parameter()
    {
        $request = Request::createFromGlobals();
        dump($request);
        die();
        return   new Response($request->attributes->get("age"));
    }
}
