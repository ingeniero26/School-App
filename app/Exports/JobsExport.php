<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobsExport implements FromCollection, WithHeadings
{
    protected $jobs;

    public function __construct($jobs)
    {
        $this->jobs = $jobs;
    }

    public function collection()
    {
        return $this->jobs->map(function ($job) {
            return [
                'ID' => $job->id,
                'Job Title' => $job->job_title,
                'Description' => $job->description,
                'Min Salary' => $job->min_salary,
                'Max Salary' => $job->max_salary,
                'Status' => $job->status,
                'Created At' => $job->created_at->format('Y-m-d H:i:s'),
                'Updated At' => $job->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Description',
            'Min',
            'Max',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
