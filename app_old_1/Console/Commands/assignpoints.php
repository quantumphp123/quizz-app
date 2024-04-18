<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class assignpoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:assignpoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign Points if Parents and Teachers doesn\'t Already Assigned Points Within a Week (From Monday to Sunday). It will Check for it Every Sunday at 11:58';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "\nHELLO WORLD\n";
        DB::statement("set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

        $params = ['punctual', 'discipline', 'respectful', 'contributing', 'organized', 'performing', 'responsible', 'co-operative', 'leadership', 'determined', 'self confident', 'obedient'];

        $students = Student::select('id', 'parent_id')->get()->toArray();
        $monday_date = now()->startOfWeek();
        $sunday_date = now()->endOfWeek()->subMinute(10)->subSecond(59);
        foreach ($students as $student) {
            $points = DB::table('parents_assign_points')
                        ->where('studentId', $student['id'])
                        ->whereBetween('created_at', [$monday_date, $sunday_date])
                        ->select('created_at')
                        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                        ->get()
                        ->toArray();
            
            if (count($points) == 0) {
                foreach ($params as $param) {
                    $id = DB::table('parents_assign_points')->insertGetId([
                        'parentId' => $student['parent_id'],
                        'studentId' => $student['id'],
                        'reason' => $param,
                        'point' => 0,
                        'created_at' => now(),
                    ]);
                    DB::table('parent_point_comments')->insert([
                        'comment' => 'Parent Forget to Assign Points',
                        'parent_id' => $student['parent_id'],
                        'student_id' => $student['id'],
                        'parents_assign_point_id' => $id,
                        'created_at' => now(),
                    ]);
                }
            }
        }

        // foreach ($students as $student) {
        //     $points = DB::table('teacher_assign_points')
        //                 ->where('studentId', $student['id'])
        //                 ->whereBetween('created_at', [$monday_date, $sunday_date])
        //                 ->select('created_at')
        //                 ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
        //                 ->get()
        //                 ->toArray();
            
        //     if (count($points) == 0) {
        //         foreach ($params as $param) {
        //             $id = DB::table('teacher_assign_points')->insertGetId([
        //                 'teacherId' => $student['parent_id'],
        //                 'studentId' => $student['id'],
        //                 'reason' => $param,
        //                 'point' => 0,
        //                 'created_at' => now(),
        //             ]);
        //             DB::table('teacher_point_comments')->insert([
        //                 'comment' => 'Parent Forget to Assign Points',
        //                 'teacher_id' => $student['parent_id'],
        //                 'student_id' => $student['id'],
        //                 'teacher_assign_point_id' => $id,
        //                 'created_at' => now(),
        //             ]);
        //         }
        //     }
        // }

        DB::statement("set session sql_mode='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    }
}
