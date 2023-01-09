<?php
namespace App\Interfaces; 

interface TaskRepositoryInterface 
{
    public function getTaskByCreatedAtDate(string $date);
}