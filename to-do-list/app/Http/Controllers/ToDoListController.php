<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ToDoListRequest;
use App\Repositories\ToDoListRepository;
use Illuminate\Support\Facades\DB;
use Exception;
class ToDoListController extends Controller
{
    private ToDoListRepository $toDoListRepository;

    public function __construct(ToDoListRepository $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }
    public function index() {
        return view('to-do-list');        
    }

    public function add(ToDoListRequest $toDoListRequest) {
        $validatedData = $toDoListRequest->validated();
        DB::beginTransaction();
        try {
            $insetArray = [
                'task' => $toDoListRequest->new_task,
                'order' => 0
            ]; 
            $this->toDoListRepository->create($insetArray);
            DB:: commit();
        }catch (Exception $e) { 
            dd($e);
            DB::rollback();
        }
    }
}
