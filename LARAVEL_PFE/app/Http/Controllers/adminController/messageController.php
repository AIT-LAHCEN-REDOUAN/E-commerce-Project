<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::all();
        return view("message/show",["messages"=>$message]);
    }
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->route("message.index")->with("delete_success",true);
    }
}
