<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
	public $table = "articles";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"body"
	];

	public static $rules = [
	    "title" => "required"
	];

}
