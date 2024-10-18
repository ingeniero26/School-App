<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class RegistrationModel extends Model
{
		protected $table = 'registration';

        public function student()
        {
            return $this->belongsTo(User::class, 'student_id');
        }

        public function class()
        {
            return $this->belongsTo(ClassModel::class, 'class_id');
        }

        public function headquarter()
        {
            return $this->belongsTo(HeadquartersModel::class, 'headquater_id');
        }

}
