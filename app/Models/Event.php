<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = ['title', 'description', 'address', 'date', 'capacity', 'category_id', 'available_place', 'validation_method', 'price', 'status', 'user_id'];


    // protected $dates = ['date']; 

    public function category(){
        return $this->belongsTo(Categorie::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
