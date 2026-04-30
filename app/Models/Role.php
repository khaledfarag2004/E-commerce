<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    protected $fillable = [
        'name',
        'permission',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permission()
    {
        $this->belongsTo(Permission::class);
    }
}
