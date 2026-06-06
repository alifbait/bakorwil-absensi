<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Test extends Controller
{
    public function db()
    {
        $db = \Config\Database::connect();

        if ($db) {

            echo 'Database Connected';

        } else {

            echo 'Database Failed';

        }
    }
}