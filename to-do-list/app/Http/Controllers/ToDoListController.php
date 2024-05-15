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
        return view('pages/home');        
    }

    public function add(ToDoListRequest $toDoListRequest) {
        $validatedData = $toDoListRequest->validated();
        DB::beginTransaction();
        try {
            $insertArray = [
                'task' => $toDoListRequest->new_task,
                'order' => 0
            ]; 
            $this->toDoListRepository->create($insertArray);
            DB:: commit();
            if ($toDoListRequest->ajax()) {
                return array('status' => 'success', 'message' => trans('custom.succ_course_registration'));
            }
        }catch (Exception $e) { 
            dd($e);
            DB::rollback();
            if ($toDoListRequest->ajax()) {  //dd($e->getMessage());
                return array('status' => 'fail', 'message' => trans('custom.error_msg'));
            }else{
                return back()->with('error', trans('custom.error_msg'));
            }
        }
    }

    public function list() {
        try {
            $list = $this->toDoListRepository->all();
            if(!empty($list)){
                return array('status' => 'success', 'data' => $list);
            }
        }catch (Exception $e) { 
            dd($e);
            return back()->with('error', trans('custom.error_msg'));
        }
    }

    public function update(ToDoListRequest $toDoListRequest) {
        $validatedData = $toDoListRequest->validated();
        DB::beginTransaction();
        try {
            $id = $toDoListRequest->id;
            $updateArray = [
                'task' => $toDoListRequest->new_task,
                'order' => 0
            ]; 
            $this->toDoListRepository->update($id, $updateArray);
            DB:: commit();
            if ($toDoListRequest->ajax()) {
                return array('status' => 'success', 'message' => trans('custom.succ_course_registration'));
            }
        }catch (Exception $e) { 
            dd($e);
            DB::rollback();
            if ($toDoListRequest->ajax()) {  //dd($e->getMessage());
                return array('status' => 'fail', 'message' => trans('custom.error_msg'));
            }else{
                return back()->with('error', trans('custom.error_msg'));
            }
        }
    }

    public function delete(Request $request) {
        DB::beginTransaction();
        try {
            $id = $request->id;
            $this->toDoListRepository->delete($id);
            DB:: commit();
            if ($request->ajax()) {
                return array('status' => 'success', 'message' => trans('custom.succ_course_registration'));
            }
        }catch (Exception $e) { 
            dd($e);
            DB::rollback();
            if ($request->ajax()) {  //dd($e->getMessage());
                return array('status' => 'fail', 'message' => trans('custom.error_msg'));
            }else{
                return back()->with('error', trans('custom.error_msg'));
            }
        }
    }
}
