<?php
/**
 * Created by PhpStorm.
 * User: ema
 * Date: 7/24/19
 * Time: 10:18 AM
 */

namespace App\Services;


use App\User;

class ContactService
{
    static function getContacts(){
        return User::all();
    }
}