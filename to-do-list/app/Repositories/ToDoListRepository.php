<?php

namespace App\Repositories;

use App\Interfaces\ToDoListInterface;
use App\Models\ToDoList;

class ToDoListRepository implements ToDoListInterface 
{
    public function all()
    {
        return ToDoList::all();
    }

    public function find($taskId) 
    {
        return ToDoList::findOrFail($taskId);
    }

    public function delete($taskId) 
    {
        ToDoList::destroy($taskId);
    }

    public function create(array $orderDetails) 
    {
        return ToDoList::create($orderDetails);
    }

    public function update($taskId, array $newDetails) 
    {
        return ToDoList::whereId($taskId)->update($newDetails);
    }
}
