<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ToDoListRequest;
class ToDoListController extends Controller
{
    public function index() {
        return view('to-do-list');        
    }

    public function add(ToDoListRequest $request) {
        
    }
}
