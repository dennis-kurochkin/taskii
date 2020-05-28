<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project that owns the task.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get comments that belongs to the task
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Check if task overdue
     */
    public function isOverdue()
    {
        return $this->due_date < Carbon::today()->toDateString();
    }

    /**
     * Check if task overdue
     */
    public function isCompleted()
    {
        return !is_null($this->completed_at);
    }
}
