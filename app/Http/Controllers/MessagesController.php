<?php

namespace App\Http\Controllers;

use App\Services\MessagesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessagesController extends Controller
{
    function conversation(int $id){
        return MessagesService::conversation(auth()->id(), $id);
    }

    function send(int $to){
        if(empty(\request('msg')))
            return response('empty msg', Response::HTTP_METHOD_NOT_ALLOWED);

        $params['msg'] = \request('msg');

        $params['from'] = auth()->id();

        $params['to'] = $to;

        return MessagesService::saveNewMessage($params);
    }
}
