<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wardobe extends Model
{
    public $timestamps = false;

    public function cells()
    {
        return $this->hasMany('App\Cell');
    }

    protected static function booted()
    {
        static::deleted(function ($wardobe) {
            $cells = $wardobe->cells;
            $cellsarr = [];
            foreach($cells as $c){
                $cellsarr[] = $c->id;
            }
            $folders = Folder::whereIn('cell_id',$cellsarr)->get();
            $folarr = [];
            foreach($folders as $f){
                $folarr[] = $f->id;
            }

            $wardobe->cells()->delete();
            Folder::whereIn('cell_id',$cellsarr)->delete();
            File::whereIn('folder_id' , $folarr)->delete();
        });
    }
}
