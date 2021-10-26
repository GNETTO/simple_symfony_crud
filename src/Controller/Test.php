<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Test
{

    public function Test()
    {
        $request = Request::createFromGlobals();
        //echo  $request->query->get("age", 0);
        return new  Response("<h1>Hello response..</h1>");
    }
}
