<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\NoticeBoard;
use App\Models\Groups;
use App\Models\ParentFeedbacks;
use App\Models\TeacherFeedbacks;
use Hash;
use DB;

class StudentController extends Controller
{
    public function login()
    {
        if(session()->has('studentId')){
            return redirect()->route('student.dashboard');
        }
        return view('student.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'userId'=>'required',
            'password'=>'required'
        ]);
        

            $student=Student::where('userId','=',$request->userId)->first();

            if($student){

                if(Hash::check($request->password, $student->password)){

                    session([
                        'studentId' => $student->id,
                        'hex' => $student->hex,
                        'class' => $student->class,
                    ]);

                    return redirect()->route('student.dashboard');

                }

                else{

                    return back()->withErrors('Incorrect Password!');

                }

            }

            return back()->withErrors('User Id not found!');

    }


    public function logout()
    {
        session()->forget('studentId');
        return redirect()->route('student.login');
    }

    public function studentDashboard()
    {
        $studentId=session('studentId');
        $details=Student::where('students.id',$studentId)->join('parentkids','students.id','=','parentkids.student_id')
        ->join('parents','parents.id','=','parentkids.parent_id')->first(['students.name as sName',
        'students.gender','students.class','students.dateOfBirth','parents.name as pName','students.id',
        'students.profilePic','parents.email as pEmail','students.userId','students.bio']);
// return $details;
        return view('student.dashboard',compact('details'));
    }


    public function myGroup()
    {
        $studentId=session('studentId');
        $group=DB::table('student_group')->where('studentId',$studentId)->first();
        // return $group;
        if($group){

            $groupDetails=DB::table('student_group')->where('student_group.groupId','=',$group->groupId)->join('groups','student_group.groupId','=','groups.id')
            ->join('students','student_group.studentId','=','students.id')->get();

            $students=DB::table('student_group')->where('student_group.groupId','=',$group->groupId)->get();
           $totalPoints=0;
            foreach($students as $student)
            {
                $totalPoints+= DB::table('teacher_assign_points')->where('studentId',$student->studentId)->sum('point');
            }

            
            return view('student.group.index',compact('groupDetails','totalPoints'));

        }

        return "You have not inserted in any group yet!";


    }

    public  function other_groups() {
        $group_id = DB::table('student_group')->where('studentId', session('studentId'))
                        ->get('groupId')->toArray();

        $group_details = Groups::where('groups.class', session('class'))
                                ->where('groups.id', '<>', $group_id[0]->groupId)
                                ->join('student_group', 'student_group.groupId', '=', 'groups.id')
                                ->join('students', 'students.id', '=', 'student_group.studentId')
                                ->select('groups.groupName', 'groups.class', 'students.userId', 'students.name', 'students.gender', 'students.dateOfBirth', 'students.profilePic')
                                ->get()
                                ->groupBy('groupName')
                                ->toArray();

        return view('student.otherGroup.index', ['group_details' => $group_details]);
    }

    public function groupPoints($groupId)
    {
        $points=DB::table('teacher_assign_points')->where('groupId',$groupId)->get();

        return view('student.group.groupPoints',compact('points'));
    }

    public function student_points() {
        DB::statement("set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

        $points_by_parent = DB::table('parents_assign_points')
                ->where('studentId', session('studentId'))
                ->select('studentId', 'created_at', DB::raw('SUM(point) as total'))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->orderBy('created_at', 'DESC')
                ->get();
        $points_by_teacher = DB::table('teacher_assign_points')
                ->where('studentId', session('studentId'))
                ->select('studentId', 'created_at', DB::raw('SUM(point) as total'))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->orderBy('created_at', 'DESC')
                ->get();
        // $points_by_parent = DB::table('parents_assign_points')
        //                     ->join('parent_point_comments', 'parent_point_comments.parents_assign_point_id', '=', 'parents_assign_points.id', 'left outer')
        //                     ->select('parents_assign_points.reason', 'parents_assign_points.point', 'parent_point_comments.comment')
        //                     ->where('studentId', session('studentId'))
        //                     // ->whereDate('parents_assign_points.created_at', '=', $created_at)
        //                     ->orderBy('parents_assign_points.id')
        //                     ->get()
        //                     ->toArray();
        // $points_by_teacher = DB::table('teacher_assign_points')
        //                         ->join('teacher_point_comments', 'teacher_point_comments.teacher_assign_point_id', '=', 'teacher_assign_points.id', 'left outer')
        //                         ->select('teacher_assign_points.reason', 'teacher_assign_points.point', 'teacher_point_comments.comment')
        //                         ->where('studentId', session('studentId'))
        //                         // ->whereDate('parents_assign_points.created_at', '=', $created_at)
        //                         ->orderBy('teacher_assign_points.id')
        //                         ->get()
        //                         ->toArray();

        DB::statement("set session sql_mode='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");                        

        return view('student.points.index', ['points_by_parent' => $points_by_parent, 'points_by_teacher' => $points_by_teacher]);
    }

    public function view_weekly_points($studentId, $created_at, $assigner) {
        $created_at = date('Y-m-d', strtotime($created_at));
        if ($assigner == 'parent') {
            $created_at = date('Y-m-d', strtotime($created_at));
            $data = DB::table('parents_assign_points')
                    ->join('parent_point_comments', 'parent_point_comments.parents_assign_point_id', '=', 'parents_assign_points.id', 'left outer')
                    ->select('parents_assign_points.reason', 'parents_assign_points.point', 'parent_point_comments.comment')
                    ->where('studentId', session('studentId'))
                    ->whereDate('parents_assign_points.created_at', '=', $created_at)
                    ->orderBy('parents_assign_points.id')
                    ->get()
                    ->toArray();
        } else {
            $data = DB::table('teacher_assign_points')
                    ->join('teacher_point_comments', 'teacher_point_comments.teacher_assign_point_id', '=', 'teacher_assign_points.id', 'left outer')
                    ->select('teacher_assign_points.reason', 'teacher_assign_points.point', 'teacher_point_comments.comment')
                    ->where('studentId', session('studentId'))
                    ->whereDate('teacher_assign_points.created_at', '=', $created_at)
                    ->orderBy('teacher_assign_points.id')
                    ->get()
                    ->toArray();
        }
        
        return view('student.points.showPoints', ['data' => $data]);
    }

    public function feedback()
    {
        $studentId=session('studentId');
        $date = now()->subDays(90);
        $teacherFeedback = TeacherFeedbacks::join('teachers', 'teachers.id', '=', 'teacher_feedbacks.teacherId')
                                        ->where('studentId', $studentId)
                                        ->where('teacher_feedbacks.created_at', '>=', $date)
                                        ->get(['teachers.name as teacher_name', 'teacher_feedbacks.title', 'teacher_feedbacks.description', 'teacher_feedbacks.created_at'])
                                        ->toArray();

        $parentFeedback =  ParentFeedbacks::where('studentId', $studentId)
                                        ->where('created_at', '>=', $date)
                                        ->get(['title', 'description', 'created_at'])
                                        ->toArray();
        
        return view('student.feedback.index', compact('teacherFeedback','parentFeedback'));

    }
    
    public function quiz_schedule()
    {
        return view('student.quiz.quiz_schedule');
    }

    public function quiz_grades()
    {
        return view('student.quiz.quiz_grades');
    }
    public function notice()
    {
        $date = now()->subDays(90);
        $notices = NoticeBoard::where('created_at', '>=', $date)
                            ->orderBy('created_at', 'DESC')
                            ->get()
                            ->toArray();

        return view('student.notice.notice', ['notices' => $notices]);
    }

    public function assignments()
    {
        $studentId=session('studentId');
       
        $group = DB::table('student_group')->where('studentId',$studentId)->first();

        $assignments = DB::table('group_projects')
                        ->where('groupId',$group->groupId)
                        ->join('teachers','group_projects.teacherId','=','teachers.id')
                        ->orderBy('dueDate')
                        ->get();

        return view('student.assignment.index',compact('assignments'));

    }

}
