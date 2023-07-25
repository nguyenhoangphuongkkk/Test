<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student, Request $request)
    {
        $title = "hello laravel";
        $name = "phuongph20706";
        $students = DB::table('students')
            ->select('id', 'name', 'image') // lấy theo số trường mà mình mong muốn
            ->whereNull('deleted_at')
            ->get();
        // lấy theo điều kiện và trả về 1 dòng dữ liệu
        // $student = Student::all();
        $student = DB::table('students')
            ->where('id', '=', 1)
            ->first();
        // thực hiện truy vấn theo nhiều điều kiện
        $studentCondition = DB::table('students')
            ->where('id', '>=', 1)
            ->where('id', '<', 5) // tương đương với toán tử and
            ->orWhere('email', '=', 'hassie96@example.net')
            // tương đương với toán tử or
            ->get();

        $countStudent = DB::table('students')->count();

        //lấy toàn bộ dữ liệu của bảng students tương đương với
        // select * from students
        //        dd($students);
        //tim kiem
        if ($request->input() && $request->sr) {
            $students = DB::table('students')
                ->select('id', 'name', 'image')
                ->where('name', 'LIkE', '%' . $request->sr . '%')
                ->get();
        }

        return view('student.index', compact('title', 'name', 'students'));
        //tạo 1 route add-student và view add gồm form (input name,email)
    }

    public function create(StudentRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
            $params =  $request->validated();
            // dd($params);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('hinh', $request->file('image'));
            }

            $student = student::create($params);
            if ($student->id) {
                Session::flash('success', 'thêm mới thành công');
                return redirect()->route('st');
            }
        }
        return view('student.create');
    }

    public function show(Student $student, Request $request)
    {
        $title = 'demo123';
        $all_student = DB::table('students')->select('id', 'name')->get();
        //tìm kiếm
        // if ($request->input() && $request->sr) {
        //     $all_student = DB::table('students')
        //         ->select('id', 'name')
        //         ->where('name', 'LIkE', '%' . $request->sr . '%')
        //         ->get();

            // $where_student = DB::table('students')
            //     ->where('id', '>=', 1)
            //     ->where('id', '<', 3)
            //     ->get();
            //     dd($where_student);
        // }
        return view('show', compact('all_student', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRequest $request, $id)
    {
      
        //dd("Xoas thanh con");
        $student = Student::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
              
                $resultDelete = Storage::delete('/'.$student->image);
                if($resultDelete){
                    $params['image'] = uploadFile('hinh', $request->file('image'));
                }
                else{
                    $params['image'] = $student->image;
                }
            }
            $result = Student::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'sửa thành công');
                return redirect()->route('route_student_edit', ['id' => $id]);
            }
        }
        return view('student.update', compact('student'));
    }

    public function delete($id){
        Student::where('id',$id)->delete();
        return redirect()->route('st');
    }


    /**Fde
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Student $student)
    // {
    //     DB::table('students')->where('id', 11)->delete();
    // }
    public function show_st(Student $student, $id)
    {
        $st_student = DB::table('students')->where('id', $id)->get();
        return view('show_st', compact('st_student'));
    }
    public function sua(Student $student)
    {
        $data = [
            'name' => 'nguyen hoagn phuong'
        ];
        DB::table('students')->where('id', 1)->update($data);
    }
}
