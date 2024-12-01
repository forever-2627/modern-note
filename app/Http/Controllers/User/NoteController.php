<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    public function index($id){
        $notes = Note::where(['deleted' => false, 'category_id'=>$id])->get();
        return view('frontend.notes.list', ['notes' => $notes]);
    }

    public function add_get(){
        return view('frontend.notes.add');
    }

    public function add_post(Request $request){
        $title = $request->title;
        $description = $request->description;
        $category = $request->category;
        $user_id = auth()->user()->id;
        $date = $request->date;
        $notification = [
            'message' => 'Your note saved successfully!',
            'alert-type' => 'success'
        ];
        try{
            Note::updateOrCreate([
                'user_id' => $user_id,
                'category_id' => $category,
                'title' => $title,
                'description' => $description,
                'date' => $date
            ]);
        }
        catch (\Exception $e){
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('user.notes')->with($notification);
    }

    public function view($id){
        $note = Note::find($id);
        return view('frontend.notes.detail', ['note' => $note]);
    }

    public function edit_get($id){
        $note = Note::find($id);
        return view('frontend.notes.edit', ['note' => $note]);
    }

    public function edit_post(Request $request){
        $id = $request->note_id;
        $title = $request->title;
        $description = $request->description;
        $category = $request->category;
        $date = $request->date;
        $notification = [
            'message' => 'Your note updated successfully!',
            'alert-type' => 'success'
        ];
        try{
            Note::updateOrCreate(['id' => $id],[
                'category_id' => $category,
                'title' => $title,
                'description' => $description,
                'date' => $date
            ]);
        }
        catch (\Exception $e){
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('user.notes')->with($notification);
    }

    public function pin($id){
        $note = Note::find($id);
        $notification = [
            'message' => 'Your note pinned successfully!',
            'alert-type' => 'success'
        ];
        try{
            $note->pinned = true;
            $note->save();
        }
        catch(\Exception $e){
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        return redirect()->back()->with($notification);
    }

    public function unpin($id){
        $note = Note::find($id);
        $notification = [
            'message' => 'Your note unpinned successfully!',
            'alert-type' => 'success'
        ];
        try{
            $note->pinned = false;
            $note->save();
        }
        catch(\Exception $e){
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        return redirect()->back()->with($notification);
    }

    public function delete($id){
        $note = Note::find($id);
        $notification = [
            'message' => 'Your note deleted successfully!',
            'alert-type' => 'success'
        ];
        try{
            $note->deleted = true;
            $note->save();
        }
        catch(\Exception $e){
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        return redirect()->back()->with($notification);
    }

    public function restore($id){
        $note = Note::find($id);
        $notification = [
            'message' => 'Your note restored successfully!',
            'alert-type' => 'success'
        ];
        try{
            $note->deleted = false;
            $note->save();
        }
        catch(\Exception $e){
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        return redirect()->back()->with($notification);
    }

    public function deleted_list(){
        $notes = Note::where(['deleted' => true])->get();
        return view('frontend.notes.deleted-list', ['notes' => $notes]);
    }
}
