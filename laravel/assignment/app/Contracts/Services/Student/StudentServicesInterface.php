<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

interface StudentServicesInterface
{
    /**
     * To get all student list
     * @param
     * @return $students
     */
    public function getAllStudents();

    /**
     * To get list of majors
     *  @param
     *  @return $majors
     */
    public function getMajors();

    /**
     * To add new student
     * @param Request $request
     * @return
     */
    public function addStudent(Request $request);

    /**
     * To get a student by id
     * @param $id
     * @return Object $student
     */
    public function getStudentById($id);

    /**
     * To edit student information
     * @param $id,Request $request
     * @return
     */
    public function editStudentById(Request $request, $id);

    /**
     * To delete student by id
     * @param $id
     * @return
     */
    public function deleteStudentById($id);

    /**
     * To export student table to csv file
     * @param
     * @return
     */
    public function export();

    /**
     * To import csv to student table
     * @param Request $request (csv file)
     * @return
     */
    public function import(Request $request);

    /**
     * To search students from list
     * @param Request $request
     * @return list of students
     */
    public function searchStudents(Request $request);

    /**
     * To get all students and majors data
     * @return object array
     */
    public function getAllStudentsMajors();

    /**
     * To get 10 latest students
     * @return $students array of student
     */
    public function sendMailLatestStudents(Request $request);

     /**
     * To generate list of students as pdf
     * @param
     * @return
     */
    public function generatePDF();
}
