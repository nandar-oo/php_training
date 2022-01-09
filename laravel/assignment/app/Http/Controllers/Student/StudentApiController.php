<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Student\StudentServicesInterface;

class StudentApiController extends Controller
{

    private $studentService;

    public function __construct(StudentServicesInterface $studentServiceInterface)
    {
        $this->studentService = $studentServiceInterface;
    }

    public function showStudentList()
    {
        $students = $this->studentService->getAllStudentsMajors();
        return response()->json($students);
    }

    public function getStudentById($id){
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        $data=[
            'student'=>$student,
            'majors'=>$majors
        ];
        return response()->json($data);
    }

    public function createStudent(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["fail" => "*Please fill all input fields!"]);
        }
        $this->studentService->addStudent($request);
        return response()->json(["success" => "The new student is added successfully"]);
    }

    public function editStudent($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["fail" => "*Please fill all input fields!"]);
        }

        $this->studentService->editStudentById($request, $id);
        $data=['success' => 'The student data is updated successfully!'];
        return response()->json($data);
    }

    public function deleteStudent($id)
    {
        $this->studentService->deleteStudentById($id);
        $data=['success' => 'The student record is deleted successfully!'];
        return response()->json($data);
    }
}
