<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    function contacts(){
        $except = auth()->id();

        return ContactService::getContacts($except);
    }
}
