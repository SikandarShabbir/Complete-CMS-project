<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(5);
        return view('admin.media.index',compact('photos'));
    }
    public function create()
    {
        return view('admin.media.create');
    }
    public function store(Request $request)
    {
//        $input = $request->all();
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
    }
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $str = $photo->file;
        $str2 = substr($str, 2);
        if ($str2)
        {
            unlink('E:\XAMPP\htdocs\codehacking'. $str2);
        }
        $photo->delete();
        Session::flash('deleted_photo','file has been deleted!');
        return redirect('/admin/media');
    }
    public function deleteMedia(Request $request)
    {
//        dd($request->checkBoxArray);
        $photos = Photo::findOrFail($request->checkBoxArray);
        foreach ($photos as $photo) {
            $photo->delete();
        }
        Session::flash('deleted_photo','file(s) has been deleted!');
        return redirect()->back();

    }
}
