<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentsExport implements FromCollection, WithHeadings
{
    public $studentService;
    public function __construct(StudentDaoInterface $studentDaoInterfae)
    {
        $this->studentService = $studentDaoInterfae;
    }

    public function collection()
    {
        return $this->studentService->getAllStudents();
    }

    public function headings(): array
    {
        return ['id', 'name', 'email', 'major_id', 'city', 'created_at', 'updated_at'];
    }
}
