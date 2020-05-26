<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description'];

    public function path()
    {
        return route('projects.show', $this);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
