<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    use HasFactory;

    protected $table = 'colors';


    static public function getRecord()
    {
        return self::select('colors.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', '=', 'colors.created_by')
                    ->when(request()->has('name'), function ($query) {
                        return $query->where('colors.name', 'like', '%' . request('name') . '%');
                    })
                    ->when(request()->has('code'), function ($query) {
                        return $query->where('colors.code', 'like', '%' . request('code') . '%');
                    })
                    ->where('colors.is_delete', '=', 0)
                    ->orderBy('colors.id', 'desc')
                    ->get();
    }

    static public function getRecordColor()
    {
        return self::where('is_delete', '=', 0)
                   ->where('status', '=', 0)
                   ->orderBy('name', 'asc')
                   ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
