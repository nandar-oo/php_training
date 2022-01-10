<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServicesInterface;
use Maatwebsite\Excel\Concerns\ToArray;

class StudentController extends Controller
{
    private $studentService;

    /**
     * Class Constructor
     * @param StudentServicesInterface
     * @return
     */
    public function __construct(StudentServicesInterface $studentServiceInterface)
    {
        $this->studentService = $studentServiceInterface;
    }

    /**
     * To get all student list
     * @param
     * @return $students
     */
    public function showStudentList()
    {
        $students = $this->studentService->getAllStudents();
        return view('studentList')->with(['students' => $students]);
    }

    /**
     * To redirect new student information form
     * @param
     * @return view
     */
    public function showStudentForm()
    {
        $majors = $this->studentService->getMajors();
        return view('newStudent')->with(['majors' => $majors]);
    }

    /**
     * To save new student
     * @param Request $request
     * @return massage success or not
     */
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

    /**
     * To redirect student edit information form
     * @param
     * @return view
     */
    public function showStudentEditForm($id)
    {
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        return view('editStudentForm')->with(['student' => $student, 'majors' => $majors]);
    }

    /**
     * To update student information
     * @param student id, Request $request
     * @return message success or not
     */
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

    /**
     * To delete student by id
     * @param student id
     * @return message success or not
     */
    public function deleteStudent($id)
    {
        $this->studentService->deleteStudentById($id);
        return redirect()->route('studentList')->with(['deleteMessage' => 'The student record is deleted successfully!']);
    }

    /**
     * To export student table to csv file
     * @param
     * @return
     */
    public function export()
    {
        return $this->studentService->export();
    }

    /**
     * To redirect import form view
     * @param
     * @return
     */
    public function showImportForm()
    {
        return view('import');
    }

    /**
     * To import csv to student table
     * @param Request $request (csv file)
     * @return message success or not
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $this->studentService->import($request);
        return redirect()->route('studentList')->with(['successMessage' => 'The choose file is imported successfully!']);
    }

    /**
     * To redirect search form view
     * @param
     * @return
     */
    public function showSearchForm()
    {
        return view('search');
    }

    /**
     * To get student lists by user input
     * @param Request $request
     * @return $students(list of students)
     */
    public function submitSearchForm(Request $request)
    {
        if ($request->name != '' || $request->start != '' || $request->end != '') {
            $students = $this->studentService->searchStudents($request);
            return view('searchList')->with(['students' => $students]);
        }
        return back()->with(['nullMessage' => '*Please fill at least one input!']);
    }

    /**
     * To redirect mail form view
     * @param
     * @return
     */
    public function showMailForm()
    {
        return view('sendMail');
    }

    /**
     * To send mail with list of latest students
     * @param Request $request
     * @return message success or not
     */
    public function submitMailForm(Request $request)
    {
        $this->studentService->sendMailLatestStudents($request);
        return redirect()->route('studentList')->with(['successMessage' => '*The email has been sent!']);
    }

    /**
     * To redirect list of students api view
     * @param
     * @return
     */
    public function index()
    {
        return view('API.studentList');
    }

    /**
     * To redirect new student form api view
     * @param
     * @return
     */
    public function showStudentFormApi()
    {
        $majors = $this->studentService->getMajors();
        return view('API.addStudent')->with(['majors' => $majors]);
    }

    /**
     * To redirect student edit api view
     * @param
     * @return
     */
    public function showEditFormApi($id)
    {
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        return view('API.editStudent')->with(['student' => $student, 'majors' => $majors]);
    }
}
