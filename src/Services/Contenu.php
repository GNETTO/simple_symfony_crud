<?php

namespace App\Services;

class Contenu
{

    public function __construct()
    {
    }

    public function home_temple($html)
    {
        $h_template = "
        <html>
            <head>
                <link href='assets/bootstrap.min.css' rel='stylesheet'>
                <link rel='stylesheet' href=''>
            </head>
            <body>
                <div class='container'>" . $html . " </div>
                <script src='assets/popper.min.js'></script>
                <script src='assets/bootstrap.min.js'></script>
                <div class='container'>  </div>
                <script src='assets/query-3.2.1.slim.min.js'></script>
            </body>
        </html>
        ";
    }
}
