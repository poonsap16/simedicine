<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{    
    protected $fillable =[
        'id',
        'name_eng',
        'name_thai'
    ];
    public function doctor()
    {
        return $this->hasMany('\App\Doctor','division_id','id');
    }
    public static function loadData($fileName){
        $divisionRecords = loadCSV($fileName);
        foreach($divisionRecords as $divisionRecord){
            Division::create($divisionRecord);
        }
    }
}
