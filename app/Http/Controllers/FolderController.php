<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Cell;
use App\Wardobe;
class FolderController extends Controller
{
    public function show($id)
    {
        $folder = Folder::find($id);
        $cell = Cell::find($folder->cell_id);
        $files = Folder::find($id)->files;
        return view('pages.folder', compact(
            'cell',
            'folder',
            'files'
        ));
    }


    public function create(Request $req, $id)
    {
        $folder = new Folder;
        $folder->name = $req['namefolder'];
        $folder->cell_id = $id;
        $folder->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $folder = Folder::find($id);
        $cell = Cell::find($folder->cell_id);
        $wardobes = Wardobe::all();
        $celles = Wardobe::find($cell->wardobe_id)->cells;
        return view('pages.folderedit', compact(
            'cell',
            'folder',
            'wardobes',
            'celles'
        ));
    }

    public function update(Request $request, $id)
    {
        $folder = Folder::find($id);
        $folder->name = $request['foldername'];
        $folder->cell_id = $request['cell'];
        $folder->save();

        return redirect()->route('folder', ['id'=> $id]);
    }

    public function destroy($id)
    {

        Folder::find($id)->files()->delete();
        $folder = Folder::find($id);
        $folder->delete();
        return redirect()->route('cell' , ['id'=> $folder->cell_id]);
    }
}
