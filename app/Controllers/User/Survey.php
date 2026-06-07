<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Survey extends BaseController
{
    public function index()
    {
        return view(
            'user/survey/index',
            [
                'title' => 'Survey Kepuasan'
            ]
        );
    }
}