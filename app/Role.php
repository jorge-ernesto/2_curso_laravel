<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table      = "roles";
    protected $primaryKey = "id";
    public $timestamps    = true;
    
    protected $fillable = [
        'name', 
        'slug', 
        'description',
        'full-access'
    ];

    /* Relacion de muchos a muchos */
    public function users(){
        return $this->belongsToMany('App\User')->withTimeStamps();
    }
}
