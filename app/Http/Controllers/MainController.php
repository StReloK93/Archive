<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wardobe;
use App\Cell;
use App\Folder;
class MainController extends Controller
{
    public function home(){
        $wardobe = Wardobe::all();
        foreach($wardobe as $key => $item){
            $wardobe[$key]->cellscount = Wardobe::find($item->id)->cells()->count();

            $cells = Wardobe::find($item->id)->cells;
            $folcount = 0;
            foreach($cells as $call){
                $folcount += Cell::find($call->id)->folders()->count();
            }
            $wardobe[$key]->folderscount = $folcount;
        }

        return view('pages.welcome', compact(
            'wardobe',
        ));
    }

    public function search(){
        $text = $_GET['text'];
        $folders = Folder::where('id' , 'like' , $text . '%')
        ->orWhere('name' , 'like' , $text . '%')
        ->get();  
        return view('pages.search', compact('folders'));
    }

    public function celles($id){
        $celles = Wardobe::find($id)->cells;
        return view('pages.celles', compact('celles'));
    }
}
