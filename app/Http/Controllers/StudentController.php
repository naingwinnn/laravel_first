<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function allStudents()
    {
        $students = Student::all();
        dd($students);
    }

    public function findStudent($id)
    {
        $student = Student::find($id);
        dd($student);
    }

    public function filterStudents()
    {
        $students = Student::where('age', '>', 22)->get();
        dd($students);
    }

    public function firstStudent()
    {
        $student = Student::where('age', '>', 22)->first();
        dd($student);
    }

    public function orderStudents()
    {
        $students = Student::orderBy('age', 'desc')->get();
        dd($students);
    }

    public function pluckStudents()
    {
        $names = Student::pluck('name');
        dd($names);
    }

    public function createStudent()
    {
        $student = Student::create([
            'name' => 'Test Student',
            'email' => 'test@student.com',
            'age' => 20
        ]);
        dd($student);
    }

    public function updateStudent($id)
    {
        $student = Student::find($id);
        $student->update(['age' => 25]);
        dd($student);
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        dd("Student deleted");
    }
}
