<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    public function group()
    {
        return $this->belongsTo(group::class);
    }
}