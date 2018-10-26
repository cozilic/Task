<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id', 'title', 'text', 'status', 'district', 'category'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function view()
    {
        return $this->belongsToMany(Task::class);
    }
}
