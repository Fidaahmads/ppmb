<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['group_id', 'quizz', 'opsi1', 'opsi2', 'opsi3', 'opsi4', 'answer'];

    
}
