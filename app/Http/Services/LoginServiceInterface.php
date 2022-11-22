<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface LoginServiceInterface
{
    function fazerLogin(Request $request);
}