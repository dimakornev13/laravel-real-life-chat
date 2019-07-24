<?php
/**
 * Created by PhpStorm.
 * User: ema
 * Date: 7/24/19
 * Time: 6:11 PM
 */

namespace App\Services;


use App\MessageModel;

class MessagesService
{
    static function conversation(int $from, int $to){
        return MessageModel::where(function ($q) use ($from, $to){
            return $q->where('from', $from)->where('to', $to);
        })->orWhere(function ($q) use ($from, $to){
            return $q->where('from', $to)->where('to', $from);
        })->get();
    }
}