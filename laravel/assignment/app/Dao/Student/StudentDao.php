<?php

namespace App\Dao\Student;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentDao implements StudentDaoInterface
{
    /**
     * To get all student list
     * @param
     * @return $students
     */
    public function getAllStudents()
    {
        return Student::get();
    }

    /**
     * To get list of majors
     *  @param
     *  @return $majors
     */
    public function getMajors()
    {
        $majors = Major::get();
        return $majors;
    }

    /**
     * To add new student
     * @param Request $request
     * @return
     */
    public function addStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->major_id = $request->major;
        $student->city = $request->city;
        $student->save();
    }

    /**
     * To get a student by id
     * @param $id
     * @return Object $student
     */
    public function getStudentById($id)
    {
        return Student::find($id);
    }

    /**
     * To edit student information
     * @param $id,Request $request
     * @return
     */
    public function editStudentById(Request $request, $id)
    {
        Student::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'major_id' => $request->major,
                'city' => $request->city,
            ]);
    }

    /**
     * To delete student by id
     * @param $id
     * @return
     */
    public function deleteStudentById($id)
    {
        Student::find($id)->delete();
    }
}
