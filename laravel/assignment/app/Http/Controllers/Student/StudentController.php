<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServicesInterface;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentServicesInterface $studentServiceInterface)
    {
        $this->studentService = $studentServiceInterface;
    }

    public function showStudentList()
    {
        $students = $this->studentService->getAllStudents();
        return view('studentList')->with(['students' => $students]);
    }

    public function showStudentForm()
    {
        $majors = $this->studentService->getMajors();
        return view('newStudent')->with(['majors' => $majors]);
    }

    public function submitStudentForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'major' => 'required',
            'city' => 'required'
        ]);

        $this->studentService->addStudent($request);
        return redirect()->route('studentList')->with(['successMessage' => 'The new student is added successfully!']);
    }

    public function showStudentEditForm($id)
    {
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        return view('editStudentForm')->with(['student' => $student, 'majors' => $majors]);
    }

    public function submitStudentEditForm($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);

        $this->studentService->editStudentById($request, $id);
        return redirect()->route('studentList')->with(['successMessage' => 'The student data is updated successfully!']);
    }

    public function deleteStudent($id)
    {
        $this->studentService->deleteStudentById($id);
        return redirect()->route('studentList')->with(['deleteMessage' => 'The student record is deleted successfully!']);
    }

    public function export()
    {
        return $this->studentService->export();
    }

    public function showImportForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $this->studentService->import($request);
        return redirect()->route('studentList')->with(['successMessage' => 'The choose file is imported successfully!']);
    }
}
