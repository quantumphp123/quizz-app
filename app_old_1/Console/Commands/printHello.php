<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class printHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:printHello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print Hello-World in the terminal';

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
        $params = ['punctual', 'discipline', 'respectful', 'contributing', 'organized', 'performing', 'responsible', 'co-operative', 'leadership', 'determined', 'self confident', 'obedient'];

        $students = Student::select('id', 'points_by_parent')->get()->toArray();
        foreach ($students as $student) {
            if ($student['points_by_parent'] == null) {
                Student::where('id', $student['id'])->update([
                    'points_by_parent' => 0
                ]);

                foreach ($params as $param) {
                    $data = DB::table('parents_assign_points')
                            ->insert([
                                'parentId' => $student['parent_id'],
                                'studentId' => $student['id'],
                                'reason' => $param,
                                'point' => false,
                                'created_at' => Carbon::now(),
                            ]);
                }
            }
        }
        echo "\nUpdate Successfull\n";
    }
}
