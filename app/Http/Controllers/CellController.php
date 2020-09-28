<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cell;
use App\Wardobe;
use App\Folder;
class CellController extends Controller
{
    public function show($id)
    {
        $cell = Cell::find($id);
        $cells = Wardobe::find($cell->wardobe_id)->cells;
        $folders = Cell::find($id)->folders;

        foreach ($folders as $key => $folder) {
            $folders[$key]->files_count = Folder::find($folder->id)->files()->count();
        }
        return view('pages.cell' , compact(
            'cell',
            'folders',
            'cells'
        ));
    }
    
    public function store($parent_id)
    {
        $newcell = new Cell;
        $newcell->wardobe_id = $parent_id;
        $newcell->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        $cell = Cell::find($id);
        $cell->delete();
        return redirect()->route('wardobe', ['id' => $cell->wardobe_id]);
    }
}
