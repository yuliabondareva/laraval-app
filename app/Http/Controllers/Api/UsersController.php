<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\UsersMessages;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUsers (Request $request) {
        $user = User::where('api_token', $request->token)->first();

        if ($user && !empty($request->token)) {
            $users = User::where('email', '!=', $user->email)->get(['name', 'email'])->toArray();
            return response($users, 200);
        } else {
            $response = 'You must input correct token. Please, login in system';
            return response($response, 422);
        }
    }

    public function writeMessage (Request $request) {
        if (empty($request->recipient_email)) {
            $response = 'Please, enter recipient email';
            return response($response, 422);
        }

        if (empty($request->message)) {
            $response = 'Please, enter message';
            return response($response, 422);
        }

        $user = User::where('api_token', $request->token)->first();
        $recipient = User::where('email', $request->recipient_email)->first();

        if (!$recipient) {
            $response = 'Recipient of the letter not register';
            return response($response, 422);
        }

        if ($user && !empty($request->token)) {
            $usersMassagesTable = new UsersMessages;
            $usersMassagesTable->id_sender_letter = $user->id;
            $usersMassagesTable->id_recipient_letter = $recipient->id;
            $usersMassagesTable->message = $request->message;
            $usersMassagesTable->save();

            $response = 'Your email has been sent successfully';
            return response($response, 200);
        } else {
            $response = 'You must input correct token. Please, login in system';
            return response($response, 422);
        }
    }

    public function getMessagesFromUser (Request $request) {
        if (empty($request->sender_email)) {
            $response = 'Please, enter sender email' ;
            return response($response, 422);
        }

        $user = User::where('api_token', $request->token)->first();
        $sender = User::where('email', $request->sender_email)->first();

        if (!$sender) {
            $response = 'Sender of the letter not register';
            return response($response, 422);
        }

        if ($user && !empty($request->token)) {
            $massages = UsersMessages::where('id_sender_letter', $sender->id)
                ->where('id_recipient_letter', $user->id)
                ->get('message')->toArray();

            if ($massages) {
                return response($massages, 200);
            } else {
                $response = 'no letters from this sender';
                return response($response, 400);
            }
        } else {
            $response = 'You must input correct token. Please, login in system';
            return response($response, 422);
        }
    }
}
