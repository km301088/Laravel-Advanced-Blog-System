<?php

namespace App\Http\Controllers;

use App\Models\UserActivityLog;

class UserActivityLogController extends Controller
{
    public function index()
    {
        $logs = UserActivityLog::with('user')->get();
        return view('logs.index', compact('logs'));
    }
}

