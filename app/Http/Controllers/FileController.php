<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class FileController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id, Request $req)
    {
        $folder = new File;
        $folder->name = $req['namefile'];
        $folder->folder_id = $id;
        $folder->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        File::find($id)->delete();
        return redirect()->back();
    }
}
