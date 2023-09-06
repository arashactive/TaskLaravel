<?php

namespace App\Http\Controllers\web\statics;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('web.sections.static.dashboard');
    }
}
