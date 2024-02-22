<?php

namespace App\Model;

use App\Model\Dao\UserDAO;
use \Illuminate\Database\Eloquent\Model;

class User extends Model implements UserDAO {

	protected $table = 'users';
	protected $fillable = ['name', 'email', 'phone'];

	public function findAll() {
        return User::all();
    }

	public function findById($id) {
        return User::find($id);
    }

    public function insert(array $data) {
        return User::create($data);
    }
	public function customUpdate($id, array $data) {
		$user = User::where('id', $id)->first();
		if ($user != null) {
			$user->update($data);
			return true;
		} else {
			throw new \Exception("El usuario no existe.");
		}
    }
	public function customDelete($id) {
		$user = User::where('id', $id)->first();
		if ($user != null) {
			$user->delete($id);
			return true;
		} else {
			throw new \Exception("El usuario no existe.");
		}
    }
}