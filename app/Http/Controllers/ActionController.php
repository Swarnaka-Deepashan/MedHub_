<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
{
    $actionlogs = ActionLog::all(); // Retrieve all logs from the database
    return view('actionlogsIndex', compact('actionlogs')); // Pass the logs to the view
}
}
