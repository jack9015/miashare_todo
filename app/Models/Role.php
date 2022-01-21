<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 'admin';
    public const USER = 'user';

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
