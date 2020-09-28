<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    public $timestamps = false;

    public function folders()
    {
        return $this->hasMany('App\Folder');
    }

    protected static function booted()
    {
        static::deleted(function ($cell) {
            $folders = $cell->folders;
            $folarr = [];
            foreach($folders as $f){
                $folarr[] = $f->id;
            }
            File::whereIn('folder_id' , $folarr)->delete();
            $cell->folders()->delete();
        });
    }
}
