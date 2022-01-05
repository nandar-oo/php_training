<?php
namespace App\Services\Student;

use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServicesInterface;

/**
 * Service class for task.
 */
class StudentService implements StudentServicesInterface
{
    /**
     * task dao
     */
    private $studentDao;
    /**
     * Class Constructor
     * @param StudentDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To get list of majors
     *  @param
     *  @return $majors
     */
    public function getMajors(){
        $majors=$this->studentDao->getMajors();
        return $majors;
    }

    /**
     * To add new student
     * @param Request $request
     * @return
     */
    public function addStudent(Request $request){
        $this->studentDao->addStudent($request);
    }

    /**
     * To get all student list
     * @param
     * @return $students
     */
    public function getAllStudents(){
        $students=$this->studentDao->getAllStudents();
        return $students;
    }

    /**
     * To get a student by id
     * @param $id
     * @return Object $student
     */
    public function getStudentById($id){
        $student=$this->studentDao->getStudentById($id);
        return $student;
    }

    /**
     * To edit student information
     * @param $id,Request $request
     * @return
     */
    public function editStudentById(Request $request,$id){
        $this->studentDao->editStudentById($request,$id);
    }

    /**
     * To delete student by id
     * @param $id
     * @return
     */
    public function deleteStudentById($id){
        $this->studentDao->deleteStudentById($id);
    }

    /**
     * To export student table to csv file
     * @param
     * @return
     */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.csv');
    }

    /**
     * To import csv to student table
     * @param Request $request (csv file)
     * @return
     */
    public function import(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('file'));
    }

}
