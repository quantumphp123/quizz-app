<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\ParentKids;
use App\Models\Student;
use App\Models\NoticeBoard;
use App\Models\Parents;
use App\Models\Groups;
use App\Models\ParentPointComment;


class ParentController extends Controller
{


    public function login()
    {
        if(session()->has('parentId')){
            return redirect()->route('parent.dashboard');
        }

        return view('parent.login');
    }

    public function login_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>'required|email|exists:parents',
            'password' =>'required'
        ], [
            'required' =>'Password is required',
            'email.exists' =>'Email does not exist',
        ]);
        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $checkEmail = DB::table('parents')->where(['email'=>$request->email])->first();

        if( !$checkEmail || !Hash::check($request->password , $checkEmail->password)) {
            return back()->with('err_msg', 'Invalid Email or Password');
        } else {
            session()->put('parentId', $checkEmail->id);
            return redirect()->route('parent.dashboard');
        }


    }

    public function signup()
    {
        if(session()->has('parentId')){
            return redirect()->route('parent.dashboard');
        }

        return view('parent.signup');
    }

    public function signup_post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email|unique:parents",
            "contact" => "required|digits:10",
            "password" => "min:8|required_with:password_confirmation",
            "password_confirmation" => "min:8|same:password"
        ]);

        // return $validator;
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            // return $validator;
        }

        try {
            
            DB::table('parents')->insert([
                      'name'=>$request->name,
                      'email'=>$request->email,
                    //   'contact'=>$request->contact,
                      'password'=>Hash::make($request->password),
                      'created_at'=>Carbon::now()->toDateTimeString(),
            ]);

            session()->put('message','Registration Successfull');
            return redirect()->route('parent.login');

          } catch (\Exception $e) {

            //   return $e->getMessage();
              return redirect()->route('parent.signup')->with('errors',$e->getMessage());

          }

    }



    public function parent_dashboard()
    {
        $parent_id = session()->get('parentId');
        // return $parentId;
        $kids = Student::where('parent_id', '=' ,$parent_id)
                        ->get();   

        $date = today()->subDays(7);
        $notifies = Student::join('teacher_feedbacks', 'teacher_feedbacks.studentId', '=', 'students.id')
                            ->join('teachers', 'teachers.id', '=', 'teacher_feedbacks.teacherId')
                            ->where(['teacher_feedbacks.parent_id' => $parent_id])
                            ->where('teacher_feedbacks.created_at', '>=', $date)
                            ->select('students.id', 'students.hex', 'teacher_feedbacks.title', 'teacher_feedbacks.description', 'teachers.name as teacher_name', 'teacher_feedbacks.created_at')
                            ->get()
                            ->toArray();
        // echo "<pre>";
        // echo print_r($kids->toArray()); die;
        // return $kids;
        // custom_print($kids);
        return view('parent.dashboard',['kids'=>$kids, 'notifies' => $notifies]);
    }

    public function parent_addkid(Request $request)
    {
        /**
         * if user changes query parameters in URL
         */
        if(session()->get('parentId') != $request->get('parentId') || !$request->parentId)  {
            return back()->with('err_msg', 'Invalid Request');
        }

        return view('parent.kid.add', ['parentId' => $request->parentId]);
    }

    public function parent_addkidPost(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            "fullName" => "required",
            "userId"=>"required|unique:students",
            "password"=>"required|min:8",
            "gender" => "required",
            "dob" => "required",
            "class" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        if ($request->profilePic == null) {
            if ($request->gender == 'Female') {
                $imageName = 'icon-female.png';   
            } 
            elseif ($request->gender == 'Male') {
                $imageName = 'icon-male.png';
            }
            else {
                $imageName = 'icon-transgender.png';   
            }
        }
        else {
            $imageName = $request->profilePic->getClientOriginalName();
            $request->profilePic->move(public_path('uploads/Students'),$imageName);
        }

        try {
            $hex = ['#F8DF81', '#F6AA90', '#F6B4BF', '#D5B6D5', '#BADFDA', '#9BD0B7', '#E5EBD7', '#FAFCFB', '#E6E6E6', '#FFE3D1'];
                        
            $fetch_hex = Student::where('parent_id', session('parentId'))
                                ->select('hex')
                                ->get()
                                ->toArray();

            $insert = DB::table('students')->insertGetId([
                      'name'=>$request->fullName,
                      'userId'=>$request->userId,
                      'password'=>Hash::make($request->password),
                      'gender'=>$request->gender,
                      'dateOfBirth' => $request->dob,
                      'class' => $request->class,
                      'bio' => $request->bio,
                      'profilePic'=>$imageName,
                      'hex'=>$hex[count($fetch_hex)],
                      'parent_id'=> session('parentId'),
            ]);
            
            $ii =  DB::table('parentkids')->insert([
                "parent_id" => $request->parentId,
                "student_id" => $insert
            ]);


            session()->put('err_msg','You have added your child to the application');
            return redirect()->route('parent.dashboard');

          } catch (\Exception $e) {

              return $e->getMessage();
              return redirect()->route('parent.dashboard')->with('errors',$e->getMessage());

          }
        
    }

    public function edit_kid($user_id) {
        $kid = Student::where('userId', $user_id)->get()->toArray();
        $kid = $kid[0];
        return view('parent.kid.edit', ['kid' => $kid]);
    }

    public function edit_kid_post(Request $request) {
        $kid = Student::where('userId', $request->userId)->select('password')->get()->toArray();

        if ($request->password != null) {
            if (password_verify($request->password, $kid[0]['password'])) {
                $request->validate([
                    'password_confirmation' => 'min:8'
                ], [
                    'password_confirmation.min' => 'New Password must be Atleast 8 Characters'
                ]);
                $password = password_hash($request->password_confirmation, PASSWORD_DEFAULT);
            }
            else {
                $error = 'Your Current Password is Not Correct';
                session()->flash('error', $error);
                return redirect()->back();
            }
        }
        else {
            $password = $kid[0]['password'];
        }
        
        if ($request->profilePic != null) {
            $imageName = $request->profilePic->getClientOriginalName();
            $request->profilePic->move(public_path('uploads/Students'),$imageName);
        }
        else {
            $imageName = Student::where('userId', $request->userId)->get()->toArray();
            $imageName = $imageName[0]['profilePic'];
        }

        Student::where('userId', $request->userId)->update([
            'name' => $request->fullName,
            'password' => $password,
            'class' => $request->class,
            'profilePic' => $imageName,
            'dateOfBirth' => $request->dob,
            'gender' => $request->gender,
            'bio' => $request->bio,
            'updated_at' => now(),
        ]);

        $success = 'Account Updated Successfully';
        session()->flash('success', $success);
        return redirect()->route('parent.dashboard');
    }

    public function parent_remove_kid($id) {
        $kid = Student::where('id', $id)->get()->toArray();
        $success = ucwords($kid[0]['name'])."'s Account is Deleted Successfully";
        Student::where('id', $id)->delete();
        session()->flash('success', $success);
        return redirect()->back();
    }

    // public function showKid
    public function kidPoints(Request $request)
    {
        $group = DB::table('student_group')
                ->join('groups', 'groups.id', '=', 'student_group.groupId')
                ->where('studentId', $request->id) 
                ->get('groups.groupName');  
        if(count($group) == 0) {
            $groupName = 'None';
        } else {
            $groupName = $group[0]->groupName;
        }      
       
        $teacherPoints = 0;
        $tPoints = DB::table('teacher_assign_points')->where('studentId', $request->id)->get();
        if(empty($tPoints)) {
            $teacherPoints = 0;
        } else {
            foreach($tPoints as $points){
                $teacherPoints += $points->point;
            }
        }
        
        $parentPoints = 0;
        $pPoints = DB::table('parents_assign_points')->where('studentId', $request->id)->get();
        if(empty($pPoints)) {
            $parentPoints = 0;
        } else {
            foreach($pPoints as $pp){
                $parentPoints += $pp->point; 
            }
        }

        $result = new \StdClass;
        $result->teacherPoints = $teacherPoints; 
        $result->parentPoints = $parentPoints;
        $result->groupName = $groupName;
        return $result; 

    }

    public function assign_points($kidId)
    {
        $monday_date = now()->startOfWeek();
        $points_by_parent = DB::table('parents_assign_points')
                                ->where('studentId', $kidId)
                                ->where('created_at', '>=', $monday_date)
                                ->get(['reason', 'point'])
                                ->toArray();
        // $points = Student::where('id', $kidId)->get(['created_at'])->toArray();
        // $date = strtotime($points[0]['created_at']);
        // $date = now();

        return view('parent.assign_points', ['kidId' => $kidId, 'points_by_parent' => $points_by_parent]);
    }

    public function post_assign_points(Request $request)
    {
        // custom_print($request->all());
        $params = ['punctual', 'discipline', 'respectful', 'contributing', 'organized', 'performing', 'responsible', 'co-operative', 'leadership', 'determined', 'self confident', 'obedient'];
        $errors = [];
        $comment_errors = [];
        $flag = true;
        $comment_flag = true;
        foreach ($params as $param) {
            if ($request->$param == '0') {
                $flag = false;
                array_push($errors, ucwords($param).' field is Required.');
            }
            if ($request->$param == 'no' && !$request->filled($param.'comment')) {
                $comment_flag = false;
                array_push($comment_errors, 'Please Mention Reason for Giving '.$request->$param.' to '.$param);
            }
        }
        if ($flag == false || $comment_flag == false) {
            session()->flash('errors', $errors);
            session()->flash('comment_errors', $comment_errors);
            return redirect()->back();
        }

        $flag = true;
        foreach ($params as $param) {
            $point = true;
            if ($request->$param == 'no') {
                $flag = false;
                $point = false;
            }
            $id = DB::table('parents_assign_points')
            ->insertGetId([
                'parentId' => $request->parentId,
                'studentId' => $request->studentId,
                'reason' => $param,
                'point' => $point,
                'created_at' => Carbon::now(),
            ]);
            if ($point == false) {
                $comment = $param.'comment';
                ParentPointComment::insert([
                    'comment' => $request->$comment,
                    'parent_id' => $request->parentId,
                    'student_id' => $request->studentId,
                    'parents_assign_point_id' => $id,
                    'created_at' => now(),
                ]);
            }
        }

       Student::where('id', $request->studentId)
                ->update(['points_by_parent' => $flag]);
                
        session()->put('status','Points Assigned Successfully');
        return redirect()->route('parent.dashboard');
    }

    public function my_profile()
    {
        $parent_id=session('parentId');
        $details = Parents::where('id',$parent_id)->first();
        return view('parent.my_profile',compact('details'));
    }

    public function change_password() {
        return view('parent.changePassword');
    }

    public function change_password_post(Request $request) {
        $request->validate(
            [
                'current_password' => 'required',
                'password' => 'required | confirmed | min:8',
                'password_confirmation' => 'required',
            ]
        );

        $parent = Parents::where('id', session('parentId'))
                        ->get()
                        ->toArray();
        if (password_verify($request->current_password, $parent[0]['password'])) {
            Parents::where('id', session('parentId'))->update([
                'password' => password_hash($request->password, PASSWORD_DEFAULT),
            ]);

            $success = 'Password is Successfully Changed';
            session()->flash('success', $success);
            return redirect()->back();
        }
        else {
            $error = 'Current Password is Not Correct';
            session()->flash('error', $error);
            return redirect()->back();
        }
    }

    public function update_profile(Request $request)
    {
        // return $request->all();
        $parent_id=session('parentId');


        
        if($request->file('profile_pic')){
	  
            $imageName = time().'.'.$request->profile_pic->extension();

            $request->profile_pic->move(public_path('uploads/profile_photos'),$imageName);

            $profile_pic=url('public/uploads/profile_photos').'/'.$imageName;

            }
            else{
                $profile_pic=null;
            }

        DB::table('parents')->where('id',$parent_id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'gender'=>$request->gender,
            'profile_pic'=>$profile_pic,
            'dob'=>$request->dob,
            'religion'=>$request->religion,
            'occupation'=>$request->occupation,
            'address'=>$request->address,


        ]);

        session()->put('status','Profile Updated Successfully');
        return redirect()->route('parent.profile');
    }

    public function viewPoints($kidId)
    {
        DB::statement("set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

        $data = DB::table('parents_assign_points')
                ->where('studentId', $kidId)
                ->select('studentId', 'created_at', DB::raw('SUM(point) as total'))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                ->orderBy('created_at', 'DESC')
                ->get();
            // custom_print($data); 
            
        DB::statement("set session sql_mode='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
        // return $data;
        return view('parent.showAllPoints', ['data' => $data]);
    }

    public function view_weekly_points($kidId, $created_at) {
        $created_at = date('Y-m-d', strtotime($created_at));
        $data = DB::table('parents_assign_points')
                ->join('parent_point_comments', 'parent_point_comments.parents_assign_point_id', '=', 'parents_assign_points.id', 'left outer')
                ->select('parents_assign_points.reason', 'parents_assign_points.point', 'parent_point_comments.comment')
                ->where('studentId', $kidId)
                ->whereDate('parents_assign_points.created_at', '=', $created_at)
                ->orderBy('parents_assign_points.id')
                ->get()
                ->toArray();

        return view('parent.showPoints', ['data' => $data]);
    }

    public function logout()
    {
        session()->forget('parentId');
        return redirect()->route('parent.login');
    }


    public function feedback(Request $request)
    {
// return $request->all();
        $parentId=session('parentId');
        
           DB::table('parent_feedbacks')->insert([
                 'parentId'=>$parentId,
                 'studentId'=>$request->studentId,
                 'title'=>$request->title,
                 'description'=>$request->description,
                 'created_at'=> Carbon::now(),
                 'updated_at'=> Carbon::now(),
                //  'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),

           ]);

           return redirect()->back()->with('status','Feedback sent Successfully');

    }


    public function teacherFeedback($student_id)
    {

        $parentId=session('parentId');
        $date = now()->subDays(90);

        $feedbacks = DB::table('teacher_feedbacks')
                        ->join('students', 'students.id', '=', 'teacher_feedbacks.studentId')
                        ->where('teacher_feedbacks.studentId', $student_id)
                        ->where('teacher_feedbacks.created_at', '>=', $date)
                        ->orderBy('teacher_feedbacks.created_at', "DESC")
                        ->get()
                        ->toArray();

        return view('parent.feedback.index',compact('feedbacks'));
    }

    public function student_notifies($id){
        $kids = Student::where('parent_id','=', session('parentId'))
                            ->get(['id', 'hex', 'name','userId','password','gender','dateOfBirth','class','bio','profilePic']);

        $date = today()->subDays(7);
        $notifies = Student::join('teacher_feedbacks', 'teacher_feedbacks.studentId', '=', 'students.id')
                            ->join('teachers', 'teachers.id', '=', 'teacher_feedbacks.teacherId')
                            ->where(['teacher_feedbacks.studentId' => $id])
                            ->where('teacher_feedbacks.created_at', '>=', $date)
                            ->select('students.id', 'students.hex', 'teacher_feedbacks.title', 'teacher_feedbacks.description', 'teachers.name as teacher_name', 'teacher_feedbacks.created_at')
                            ->get()
                            ->toArray();

        return view('parent.dashboard', ['kids' => $kids, 'notifies' => $notifies]);
    }

    public function notice_board() {
        $date = now()->subdays(45);
        $notices = NoticeBoard::where('created_at', '>=', $date)
                            ->orderBy('created_at', 'DESC')
                            ->get()
                            ->toArray();
    
        return view('parent.noticeboard', ['notices' => $notices]);
    }
}
