<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'department', 'very_happy', 'happy', 'content', 'unhappy', 'very_unhappy', 'created_at', 'updated_at',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'happiness_chart';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

}