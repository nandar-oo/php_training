<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServicesInterface;
use Maatwebsite\Excel\Concerns\ToArray;

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
            'email' => 'required|email',
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

    public function showSearchForm()
    {
        return view('search');
    }

    public function submitSearchForm(Request $request)
    {
        if ($request->name != '' || $request->start != '' || $request->end != '') {
            $students = $this->studentService->searchStudents($request);
            return view('searchList')->with(['students' => $students]);
        }
        return back()->with(['nullMessage' => '*Please fill at least one input!']);
    }

    public function index()
    {
        return view('API.studentList');
    }

    public function showStudentFormApi()
    {
        $majors = $this->studentService->getMajors();
        return view('API.addStudent')->with(['majors' => $majors]);
    }

    public function showEditFormApi($id)
    {
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        return view('API.editStudent')->with(['student' => $student, 'majors' => $majors]);
    }
}
