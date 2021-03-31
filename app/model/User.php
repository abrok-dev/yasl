<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Question extends Model {
     
    protected $table = "users";
    protected $fillable = ["login" , "email" , "password"];
}
?>