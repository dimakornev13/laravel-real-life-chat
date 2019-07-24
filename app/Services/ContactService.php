<?php
/**
 * Created by PhpStorm.
 * User: ema
 * Date: 7/24/19
 * Time: 10:18 AM
 */

namespace App\Services;


use App\MessageModel;
use App\User;
use Illuminate\Support\Facades\DB;

class ContactService
{
    static function getContacts(int $except){
//        $messageTable = (new MessageModel())->getTable();
//        $userTable = (new User())->getTable();

        //SELECT u.*, m.*, count(m.from) as unread FROM db.users u left join messages m on u.id = m.from where m.to = 1 and m.read = 0 and u.id <> 1 GROUP BY m.from;

//        return DB::table($userTable)
//            ->leftJoin($messageTable, $userTable.'.id', '=', $messageTable.'.from')
//            ->select($userTable.'.*', DB::raw(sprintf('count(%s.from) as unread', $messageTable)))
//            ->where($messageTable.'.to', $except)
//            ->where($messageTable.'.read', 0)
//            ->where($userTable.'.id', '<>', $except)
//            ->groupBy($userTable.'.id')
//            ->get();

        $contacts = User::where('id', '<>', $except)->get();

        $unreadMessages = MessagesService::unread($except);

        return $contacts->map(function ($contact) use ($unreadMessages){
            $contactUnread = $unreadMessages->where('from', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->unread : 0;

            return $contact;
        });


    }
}

