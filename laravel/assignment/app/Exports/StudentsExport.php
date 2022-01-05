<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    public function collection()
    {
        return Student::all();
    }

    public function headings(): array {
        return ['id','name','email','major_id','city', 'created_at', 'updated_at',];
    }
}
