<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionModel extends Model
{
    use HasFactory;
    protected $table = 'institutions';
    public function users()
{
    return $this->hasMany(User::class, 'institution_id');
}

     public static function getSingle()
     {
         return self::find(1);
     }

        //OBTENER LA IMAGEN
    public function getLogo()
    {
        if (!empty($this->logo) && file_exists('upload/setting/' . $this->logo)) {
            return url('upload/setting/' . $this->logo);
        } else {
            return '';
        }
    }

      public function getFavicon()
    {
        if (!empty($this->favicon_icon) && file_exists('upload/setting/' . $this->favicon_icon)) {
            return url('upload/setting/' . $this->favicon_icon);
        } else {
            return '';
        }
    }
}
