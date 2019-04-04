<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash,
    Session,
    DB;

class User extends Model {

    static public function verify_user($userName, $password) {
        $valid = false;
        $sql = "SELECT * FROM admin a "
                . "WHERE a.user_name = ?";

        if ($user = DB::select($sql, [$userName])) {
            $user = $user[0];
            if (Hash::check($password, $user->password)) {
                $valid = true;
                Session::put('user_name', $user->name);
                Session::put('user_id', $user->id);
                Session::flash('sm', $user->name . ' welcome back!');
            }
        }
        return $valid;
    }

    

}
