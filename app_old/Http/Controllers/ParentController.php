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
use App\Models\Parents;
use App\Models\Groups;


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
            'required' =>':attribute is required',
            'email.exists' =>':attribute does not exist',
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

        $parentId = session()->get('parentId');
        // return $parentId;
        $kids = ParentKids::where('parent_id','=',$parentId)
                ->join('students', 'students.id','=','parentkids.student_id')
                ->get(['students.id', 'name','userId','password','gender','dateOfBirth','class','bio','profilePic']);    
        // return $kids;
        return view('parent.dashboard',['kids'=>$kids]);
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


        if($request->file('profilePic')){
	  
            $imageName = $request->profilePic->getClientOriginalName();

            $request->profilePic->move(public_path('uploads/Students'),$imageName);

            $profilePic = url('public/uploads/Students').'/'.$imageName;

            }
            else{
                $profilePic=null;
            }
           



        try {
            
            $insert =  DB::table('students')->insertGetId([
                      'name'=>$request->fullName,
                      'userId'=>$request->userId,
                      'password'=>Hash::make($request->password),
                      'gender'=>$request->gender,
                      'dateOfBirth' => $request->dob,
                      'class' => $request->class,
                      'bio' => $request->bio,
                      'profilePic'=>$profilePic
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

    public function assign_points($kidId)
    {
        return view('parent.assign_points', ['kidId' => $kidId]);
    }

    public function post_assign_points(Request $request)
    {
       

        $array = [
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Punctual' , 'point'=> $request->punctual],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Discipline', 'point' => $request->discipline],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Respectful', 'point' => $request->respectful],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Contributing', 'point' => $request->contributing],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Organized', 'point' => $request->organized],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Performing' , 'point'=> $request->performing],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Responsible', 'point' => $request->responsible],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Co-operative' , 'point'=> $request->coperative],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Leadership' , 'point'=> $request->leadership],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Determined' , 'point'=> $request->determined],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Self-Confidence' , 'point'=> $request->selfConfidence],
            ['studentId' => $request->studentId ,'parentId' => $request->parentId ,'reason'=>'Obedient' , 'point'=> $request->obedient],
       ];
       
       $insert = DB::table('parents_assign_points')->insert($array);

       if($insert)
       {
            session()->put('err_msg','Points Assigned Successfully');
            return redirect()->route('parent.dashboard');
       } else {
            session()->put('err_msg','Some error occured');
            return redirect()->back()->withInput();
       }


        session()->put('status','Points Assigned Successfully');
        return redirect('parent/dashboard');
    }

    public function my_profile()
    {
        $parent_id=session('parentId');
        $details=DB::table('parents')->where('id',$parent_id)->first();
        return view('parent.my_profile',compact('details'));
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
        $data = DB::table('parents_assign_points')->where('studentId', $kidId)->get();
        // return $data;
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
                 'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                //  'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),

           ]);

           return redirect()->back()->with('status','Feedback sent Successfully');

    }


    public function teacherFeedback()
    {

        $parentId=session('parentId');
        $feedbacks=DB::table('parentkids')->where('parentkids.parent_id',$parentId)->join('teacher_feedbacks','parentkids.student_id','teacher_feedbacks.studentId')
        ->join('teachers','teacher_feedbacks.teacherId','=','teachers.id')->join('students','teacher_feedbacks.studentId','=','students.id')->orderBy('teacher_feedbacks.id','desc')
        ->get(['teachers.name as teacherName','students.name as studentName','students.profilePic','teacher_feedbacks.title','teacher_feedbacks.description','teacher_feedbacks.created_at']);

        return view('parent.feedback.index',compact('feedbacks'));
    }


}
