<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Student;

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



                    session()->put('studentId',$student->id);



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

            // return $groupDetails;
            return view('student.group.index',compact('groupDetails','totalPoints'));

        }

        return "You have not inserted in any group yet!";

      


       
   

    }



    public function groupPoints($groupId)

    {

        $points=DB::table('teacher_assign_points')->where('groupId',$groupId)->get();



        return view('student.group.groupPoints',compact('points'));

    }





    public function feedback()

    {

        

        $studentId=session('studentId');

        $teacherFeedback=DB::table('teacher_feedbacks')->where('studentId',$studentId)->join('teachers','teacher_feedbacks.teacherId','=','teachers.id')

        ->orderBy('teacher_feedbacks.id','desc')->get(['teacher_feedbacks.title','teacher_feedbacks.description','teacher_feedbacks.created_at','teachers.name']);

       

        $parentFeedback=DB::table('parent_feedbacks')->where('studentId',$studentId)->join('parentkids','parent_feedbacks.studentId','=','parentkids.student_id')

        ->orderBy('parent_feedbacks.id','desc')->get(['parent_feedbacks.title','parent_feedbacks.description','parent_feedbacks.created_at']);

       



        return view('student.feedback.index',compact('teacherFeedback','parentFeedback'));



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

        return view('student.notice.notice');

    }



    public function assignments()



    {

        $studentId=session('studentId');

       

        $group=DB::table('student_group')->where('studentId',$studentId)->first();





        $assignments=DB::table('group_projects')->where('groupId',$group->groupId)

        ->join('teachers','group_projects.teacherId','=','teachers.id')->get();



        return view('student.assignment.index',compact('assignments'));



    }



}

