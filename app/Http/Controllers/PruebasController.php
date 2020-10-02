<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Illuminate\Support\Facades\DB;

class PruebasController extends Controller
{
    public function User(Request $request){
        $dataUser  = App\User::all();
        $dataUser2 = DB::select('select * from users');
        $dataUser3 = DB::table('users')
                        ->get();

        foreach($dataUser as $key=>$user):        
            echo "<h1>{$user->name}</h1>";

            foreach($user->roles as $key=>$role):
                echo "<h3>{$role->name}       </h3>";            
                echo "<p> {$role->description}</p>";
                echo "<p> {$role->created_at} </p>";
                echo "<p> {$role->updated_at} </p>";
            endforeach;
            echo "<hr>";
        endforeach;
    }   
    
    public function Role(Request $request){
        //Role
        $dataUser = App\User::find(1);
        foreach($dataUser->roles as $key=>$role):
            echo $role->name;
        endforeach;
        echo "<hr>";
        
        //Otra forma
        $dataRole = App\User::find(1)->roles()->get();    
        error_log("****** dataRole ******");
        error_log(json_encode($dataRole));        
    }   
}
