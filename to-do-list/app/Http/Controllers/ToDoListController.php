<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskListRequest;
class ToDoListController extends Controller
{
    public function index() {
        return view('to-do-list');        
    }

    public function add(TaskListRequest $request) {
        
    }
}
