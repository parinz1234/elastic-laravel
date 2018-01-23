<?php

namespace App\Http\Controllers;

use Artisan;
use App\Http\Controllers\Controller;


class TestCommandController extends Controller
{
    public function test_command ()
    {
        // dd('test_command');
        dd(Artisan::call('test:start', []));
    }
}

