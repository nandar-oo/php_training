<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServicesInterface;

class StudentResourceController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentService->getAllStudents();
        return view('Resource.list')->with(['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentService->getMajors();
        return view('Resource.create')->with(['majors' => $majors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);

        $this->studentService->addStudent($request);
        return redirect('/students')->with(['successMessage' => 'The new student is added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->studentService->getStudentById($id);
        return view('Resource.show')->with(['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majors = $this->studentService->getMajors();
        $student = $this->studentService->getStudentById($id);
        return view('Resource.edit')->with(['student' => $student, 'majors' => $majors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);

        $this->studentService->editStudentById($request, $id);
        return redirect('/students')->with(['successMessage' => 'The student data is updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentService->deleteStudentById($id);
        return redirect('/students')->with(['deleteMessage' => 'The student record is deleted successfully!']);
    }
}
