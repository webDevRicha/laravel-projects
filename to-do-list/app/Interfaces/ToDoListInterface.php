<?php

namespace App\Interfaces;

interface ToDoListInterface
{
    public function all();
    public function find($orderId);
    public function delete($orderId);
    public function create(array $orderDetails);
    public function update($orderId, array $newDetails);
}