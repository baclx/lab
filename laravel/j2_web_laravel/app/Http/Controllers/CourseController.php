<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    public function __construct() {
        // get route name current
        $routeName = Route::currentRouteName();
        // explode: cắt chuỗi chõ dấu chấm
        $arr = explode('.', $routeName);
        // arr_map: lặp qua rồi in hoa chữ đầu của mỗi index
        $arr = array_map('ucfirst', $arr);
        // implode: biến index của mảng thành chuỗi nối vs nhau cách nhau = /
        $title = implode(' / ', $arr);

        View::share('title', $title);
    }

    public function index(Request $request)
    {
        $search = $request->get('q');
        $data = Course::query()->withCount('student')
            ->where('name', 'like', '%'.$search.'%')
            ->paginate(2);
        $data->appends(['q' => $search]);

        return view('course.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(StoreRequest $request)
    {
            // oop
    //        $object = new Course();
    //        $object->fill($request->except('_token'));
    //        $object->save();

        // Không tối ưu
        // $object->name = $request->get('name');
        // $object->save();

        // k up token(bên form create) lên để insert vào đb -> use except
        // vì k có cột _token trong đb
        // dd($request->except('_token'));

        // eloquent
        //  validated: những cột đã dc valid thì tạo vào trong đb
        Course::create($request->validated());

        return redirect()->route('courses.index');
    }

      // except
//    public function show(Course $course)
//    {
//        //
//    }

    public function edit(Course $course)
    {
        // $course = data
        return view('course.edit', [
            'each' => $course,
        ]);
    }

    public function update(UpdateRequest $request, Course $course)
    {
        // eloquent and oop
        // query builder
        $course->update(
            $request->except('_token','_method'),
        );

        return redirect()->route('courses.index');
    }

    // nếu là Course $course thì nó đang ép kiểu thành 1 đối tượng -> nên dùng
    // nếu là $course không thì nó chính là id
    // dd ra để xem
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}
