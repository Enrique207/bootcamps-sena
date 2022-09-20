<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
            //fillable: permite realizar 
    //insertar varias instancias al tiempo
    protected $fillable=[   'title', 
                            'text',
                            'bootcamp_id',
                            'user_id' 
                        ];

}
