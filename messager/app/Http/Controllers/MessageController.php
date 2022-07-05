<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;
use phpDocumentor\Reflection\Types\Integer;

class MessageController extends Controller
{
    public function submit(MessageRequest $req){
        $message = new Message();
        $message -> text =  $req->input('message');
        $message ->  user_id =  Auth::user()->id;
        $message -> date =  Carbon::now();
        $message -> author =  Auth::user() -> name;
        $message -> save();
        return redirect()->route('wall');

    }
    public function show(Request $req){
        $messages = Message::paginate(2);
        return view('wall', compact('messages'));
    }
    public function delete(Request $req, $id){
        $message = Message::find($id);

        if(Carbon::now()->diffInDays($message->date)<1) {
            Message::where('id', $id)->delete();
        }
        return redirect('wall');
    }

}
