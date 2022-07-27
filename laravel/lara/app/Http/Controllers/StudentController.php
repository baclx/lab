<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Models\Course;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{

    private Builder $model;

    public function __construct() {
        // with: relationship -- course bên model
        $this->model = (new Student())->query()->with('course');
        // get route name current
        $routeName = Route::currentRouteName();
        // explode: cắt chuỗi chõ dấu chấm
        $arr = explode('.', $routeName);
        // arr_map: lặp qua rồi in hoa chữ đầu của mỗi index
        $arr = array_map('ucfirst', $arr);
        // implode: biến index của mảng thành chuỗi nối vs nhau cách nhau = /
        $title = implode(' / ', $arr);

        $arrStudentStatus = StudentStatusEnum::getArrayView();
//        dd($arrStudentStatus);

        View::share('title', $title);
        View::share('arrStudentStatus', $arrStudentStatus);
    }

    public function index()
    {
        $students = $this->model->get();

        return view('student.index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $courses = Course::query()->get();
//        dd($courses);

        return view('student.create', [
            'courses' => $courses,
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('students.index')->with('success', "Thêm thành công");
    }

    public function edit(Student $student)
    {
        return view('student.edit', [
            'each' => $student,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update(
            $request->except('_token','_method'),
        );

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }

    public function apiAll()
    {
        $students = $this->model->get();
        return $students;
    }

    public function api($id)
    {
        $st = Student::findOrFail($id);
        return $st;
    }
}
