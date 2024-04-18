<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Hash;

use App\Models\Admin;

use App\Models\Student;

use App\Models\Teacher;

use App\Models\TeacherClass;

use App\Models\Groups;

use Illuminate\Support\Facades\DB;

use Validator;

use session;



class AdminController extends Controller

{



    public function login()

    {

        if(session()->has('adminId')) {

            return redirect()->route('adminDashboard');

        }

        return view('admin.login');

    }

    

    public function login_post(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'email' =>'required|email|exists:admins',

            'password' =>'required'

        ], [

            'required' =>':attribute is required',

            'email.exists' =>':attribute does not exist',

        ]);

        if($validator->fails())

        {

            return back()->withErrors($validator)->withInput();

        }



        $checkEmail = Admin::where(['email'=>$request->email])->first();



        if( !$checkEmail || !Hash::check($request->password , $checkEmail->password)) {

            return back()->with('err_msg', 'Invalid Email or Password');

        } else {

            session()->put('adminId', $checkEmail->id);

            return redirect()->route('adminDashboard');

        }



    }

    

    public function signup()

    {

        return view('admin.signup');

    }

    

    public function signup_post(Request $request)

    {

        // return $request;    

        $validator = Validator::make($request->all(), [

            "name" => "required",

            "email" => "required|email|unique:admins",

            "password" => "min:8|required_with:password_confirmation",

            "password_confirmation" => "min:8|same:password"

        ]);



        // return $validator;

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

            // return $validator;

        }



        try {

            $insert = new Admin;

            $insert->name = $request->name;

            $insert->email = $request->email;

            $insert->password = Hash::make($request->password);

            $insert->save();



            return redirect()->route('adminLogin')->with('message','Admin Created Successfully');



          } catch (\Exception $e) {



              //return $e->getMessage();

              return redirect()->route('adminSignupPost')->with('errors',$e->getMessage());



          }

        

    }





    public function logout()

    {

        session()->forget('adminId');



        return redirect()->route('adminLogin');

    }



    public function admin_dashboard()
    {
        $totalStudents=count(Student::all());
        $totalTeachers=count(Teacher::all());
        $totalParents=count(DB::table('parents')->get());

        $maleStudent=Student::where('gender','Male')->get()->count();
        $FemaleStudent=Student::where('gender','Female')->get()->count();
    
     

        return view('admin.dashboard',compact('totalStudents','totalTeachers','totalParents','maleStudent','FemaleStudent'));
    }



    public function all_students()

    {

        $students=Student::join('parentkids','students.id','=','parentkids.student_id')

        ->join('parents','parents.id','=','parentkids.parent_id')->orderBy('students.id','desc')->get(['students.name as sName',

       'students.gender','students.class','students.dateOfBirth','parents.name as pName','students.id as s_id','students.profilePic']);

      

// return $students;

        return view('admin.students.all_students',compact('students'));

    }



    public function student_details($studentId)

    {



        $details=Student::where('students.id',$studentId)->join('parentkids','students.id','=','parentkids.student_id')

        ->join('parents','parents.id','=','parentkids.parent_id')->first(['students.name as sName',

        'students.gender','students.class','students.dateOfBirth','parents.name as pName','students.id',

        'students.profilePic','parents.email as pEmail','students.userId']);

// return $details;

        return view('admin.students.student_details',compact('details'));

    }



    public function all_teachers()

    {

        $details=Teacher::orderBy('id','desc')->get();



        return view('admin.teachers.all_teachers',compact('details'));

    }



    public function teacher_details()

    {

        return view('admin.teachers.teacher_details');

    }



    public function all_parents()

    {

        $parents=DB::table('parents')->get();

        // return $parents;

        return view('admin.parents.all_parents',compact('parents'));

    }



    public function parent_details()

    {

        return view('admin.parents.parent_details');

    }



    public function quiz_schedule()

    {

        return view('admin.quiz.quiz_schedule');

    }



    public function quiz_grades()

    {

        return view('admin.quiz.quiz_grades');

    }



    public function groups()

    {

      

        $details = Groups::join('teachers','groups.createdByTeacherId','=','teachers.id')->orderBy('groups.id','desc')->get([

            'groups.id','groups.groupName','groups.class','teachers.name as teacherName'

        ]);

                // return $details;

        return view('admin.groups.index',compact('details'));

    }





    public function groupDetails($groupId)

    {

        $students=DB::table('student_group')->where('student_group.groupId',$groupId)->join('students','student_group.studentId','=','students.id')->get();

        $groupName=Groups::where('id',$groupId)->first('groupName');



        $totalPoints=DB::table('teacher_assign_points')->where('groupId',$groupId)->sum('point');



        return view('admin.groups.groupDetails',compact('students','groupName','totalPoints'));

    }





    public function addTeacher()

    {

        return view('admin.teachers.addTeacher');

    }



    public function postAddTeacher(Request $request)

    {

        // return $request->all();

        $validator = Validator::make($request->all(), [

            "name" => "required",

            "email" => "required|email|unique:teachers",

            "contact" => "required|digits:10",

            "class"=>"required",

            "dob"=>"required",

            "password" => "min:8|required_with:password_confirmation",

            "password_confirmation" => "min:8|same:password"

        ]);



        // return $validator;

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

            // return $validator;

        }





            $insert = new Teacher();

            $insert->name = $request->name;

            $insert->email = $request->email;

            $insert->contact=$request->contact;

            $insert->dob=$request->dob;

            $insert->password = Hash::make($request->password);

            $insert->save();



            $teacherId= $insert->id;

        

          



            for($i=0;$i<count($request->class);$i++){



               TeacherClass::insert([



                'teacherId'=>$teacherId,

                'class'=>$request->class[$i],



               ]);



            }



            return redirect()->route('admin.all.teachers')->with('status','Teacher Added Successfully...');





    }





    public function notification()

    {



        $totalSum=array();



        $data= Groups::all();

 

            foreach($data as $item)

            {

                $sum=DB::table('teacher_assign_points')->where('groupId',$item->id)->sum('point');

                $groupName=DB::table('groups')->where('id',$item->id)->first();

     

                $merge=$groupName->groupName.' '.$sum;

               array_push($totalSum,$merge);

            

                

            }

            



            return $totalSum;

              max();



    }



}



