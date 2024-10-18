<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasuresModel extends Model
{
    use HasFactory;

    protected $table = 'measures';

    protected $fillable = ['name', 'abbreviation', 'status', 'created_by'];

    public static function getRecord()
    {
        return self::select('measures.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'measures.created_by')
            ->where('measures.is_delete', '=', 0)
            ->orderBy('measures.id', 'desc')
            ->paginate(20);
    }

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getActiveMeasures()
    {
        return self::where('status', '=', 0)
            ->where('is_delete', '=', 0)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function belongsToUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
