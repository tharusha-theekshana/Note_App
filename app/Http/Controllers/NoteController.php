<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    function addNote(Request $request){
        $request->validate([
            "title"=>"required|min:5|max:50|unique:notes",
            "description"=>"required|max:200|min:10|unique:notes"
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->user_id = Auth::user()->id;
        $note->save();

        return redirect()->route('notelist', ['id' => Auth::user()->id]);

    }

    function allNotes($id){
        $notes = DB::table('notes')
            ->where('user_id',$id)
            ->get();
        return view('notelist')->with('notes',$notes);
    }

    function deleteNote($id){
        $note = Note::find($id);
        $note -> delete();

        $notes = DB::table('notes')
            ->where('user_id',$id)
            ->get();
        return redirect()->route('notelist', ['id' => Auth::user()->id]);
    }

    function editNote($id){
        $note = Note::find($id);
        return view('updatenote')->with('note',$note);
    }

    function updateNote(Request $request,$id){
        $request->validate([
            "title"=>"required|min:5|max:50",
            "description"=>"required|max:200|min:10"
        ]);

        $note = Note::find($id);
        $note -> title = $request->title;
        $note -> description = $request -> description;
        $note->user_id = Auth::user()->id;

        $note -> save();

        return redirect()->route('notelist', ['id' => Auth::user()->id]);

    }
}
