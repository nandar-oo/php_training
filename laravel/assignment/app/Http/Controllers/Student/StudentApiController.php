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
        $students = $this->studentService->getAllStudentsMajors();
        return response()->json($students);
    }

    /**
     * To get a student by id
     * @param $id
     * @return Object $student
     */
    public function getStudentById($id)
    {
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        $data = [
            'student' => $student,
            'majors' => $majors
        ];
        return response()->json($data);
    }

    /**
     * To save new student
     * @param Request $request
     * @return massage success or not
     */
    public function createStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

    /**
     * To update student information
     * @param student id, Request $request
     * @return message success or not
     */
    public function editStudent($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["fail" => "*Please fill all input fields!"]);
        }

        $this->studentService->editStudentById($request, $id);
        $data = ['success' => 'The student data is updated successfully!'];
        return response()->json($data);
    }

    /**
     * To delete student by id
     * @param student id
     * @return message success or not
     */
    public function deleteStudent($id)
    {
        $this->studentService->deleteStudentById($id);
        $data = ['success' => 'The student record is deleted successfully!'];
        return response()->json($data);
    }
}
