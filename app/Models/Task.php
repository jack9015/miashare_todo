<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const ACTIVE = 0;
    public const COMPLETED = 1;
    public const REMOVED = 2;

    protected $fillable = [
        'task_name', 
        'task_details',
        'user_id',
        'task_status'
    ];

    public function checkOffTask(){
        if ($this->task_status === Task::ACTIVE) {
            $this->task_status = Task::COMPLETED;
        } else if ($this->task_status === Task::COMPLETED) {
            $this->task_status = Task::ACTIVE;
        }
        $this->save();
    }

    public function isCompleted(){
        return $this->task_status === Task::COMPLETED;
    }

    public function isRemoved(){
        return $this->task_status === Task::REMOVED;
    }
}
