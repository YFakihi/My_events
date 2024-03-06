<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = ['title', 'description', 'address', 'date', 'capacity', 'category_id'];

    // protected $dates = ['date']; 

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
