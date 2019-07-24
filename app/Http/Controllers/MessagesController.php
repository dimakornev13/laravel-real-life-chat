<?php

namespace App\Http\Controllers;

use App\Services\MessagesService;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    function conversation(int $id){
        return MessagesService::conversation(auth()->id(), $id);
    }
}
