<?php
namespace Docker;

class Importer {
	public static function Show(){
		$users = User::all();
		foreach ($users  as $user) {
    		echo $user->name. "<br>";
    	}
	} 
}