<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseModel extends Model
{
    use HasFactory;

    protected $table = 'warehouses';

    protected $fillable = ['name', 'address', 'status', 'created_by', 'is_delete'];

    public static function getRecord()
    {
        return self::select('warehouses.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'warehouses.created_by')
                    ->where('warehouses.is_delete', '=', 0)
                    ->orderBy('id', 'desc')
                    ->get();
        }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public function belongsToUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
