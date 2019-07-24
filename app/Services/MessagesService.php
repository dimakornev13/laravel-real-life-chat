<?php
/**
 * Created by PhpStorm.
 * User: ema
 * Date: 7/24/19
 * Time: 6:11 PM
 */

namespace App\Services;


use App\Events\NewMessage;
use App\MessageModel;
use Illuminate\Support\Facades\DB;

class MessagesService
{
    static function conversation(int $from, int $to){
        MessageModel::where('from', $to)->where('to', $from)->update(['read' => true]);

        return MessageModel::where(function ($q) use ($from, $to){
            $q->where('from', $from)->where('to', $to);
        })->orWhere(function ($q) use ($from, $to){
            $q->where('from', $to)->where('to', $from);
        })->get();
    }

    static function saveNewMessage(array $params){
        $message = MessageModel::create([
            'from' => $params['from'],
            'to' => $params['to'],
            'msg' => $params['msg'],
        ]);

        broadcast(new NewMessage($message));

        return $message;
    }

    static function unread(int $for){
        return MessageModel::select(DB::raw('count(`from`) as unread, `from`'))
            ->where('to', $for)
            ->where('read', false)
            ->groupBy('from')
            ->get();
    }
}