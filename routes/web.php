<?php

use Illuminate\Support\Facades\Route;

Route::view('/{path?}', 'app')->where('path', '.+'); // This is for react router
