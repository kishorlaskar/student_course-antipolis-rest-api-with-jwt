<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use App\Student;
use App\Course;
use App\User;
use Illuminate\Http\Request;

class CourseRegistationController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $shares = DB::table('specificstudents')
            ->join('courses', 'courses.id', '=', 'specificstudents.course_id')
            ->join('students', 'students.id', '=', 'specificstudents.student_id')
            ->select('specificstudents.*','students.name','courses.course_name')
            ->get();
        return $shares;
    }
}
