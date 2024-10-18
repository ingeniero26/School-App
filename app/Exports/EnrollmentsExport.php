<?php

namespace App\Exports;

use App\Models\RegistrationModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnrollmentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RegistrationModel::with('student', 'class', 'headquarter')->where('status', 1)->get()->map(function ($enrollment) {
            return [
                'ID' => $enrollment->student->id,
                'Nombre' => $enrollment->student->name,
                'Apellido' => $enrollment->student->last_name,
                'Clase' => $enrollment->class->name,
                'Sede' => $enrollment->headquarter->name,
                'Fecha de Ingreso' => $enrollment->date_of_entry,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellido',
            'Clase',
            'Sede',
            'Fecha de Ingreso',
        ];
    }
}
