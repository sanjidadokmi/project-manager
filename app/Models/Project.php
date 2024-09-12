<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name', 'project_description', 'status'
    ];
    
    const STATUSES = [
        'todo' => 'To Do',
        'processing' => 'Processing',
        'on_hold' => 'On Hold',
        'done' => 'Completed',
    ];

    public static function getStatuses(){
        return self::STATUSES;
    }
}
