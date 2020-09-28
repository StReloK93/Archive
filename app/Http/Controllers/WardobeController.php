<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wardobe;
use App\Folder;

class WardobeController extends Controller
{
    public function newwardobe()
    {
        $wardobe = new Wardobe;
        $wardobe->save();
        return redirect()->route('home');
    }

    public function show($id)
    {
        $wardobe_id = $id;
        $cells = Wardobe::find($id)->cells;
        $arr = [];
        foreach($cells as $cell){
            $arr[] = $cell->id;
        }

        $folders = Folder::whereIn('cell_id', $arr)->get();
        foreach ($folders as $key => $folder) {
            $folders[$key]->files_count = Folder::find($folder->id)->files()->count();
        }
        return view('pages.wardobe', compact(
            'cells',
            'folders',
            'wardobe_id'
        ));
    }

    public function destroy($id)
    {
        Wardobe::find($id)->delete();
        return redirect()->back();
    }
}
