<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table      = "permissions";
    protected $primaryKey = "id";
    public $timestamps    = true;
    
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    /* RELACION DE MUCHOS A MUCHOS */
    //Un permiso puede tener muchos roles
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
