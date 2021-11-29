<?php

namespace App\Http\Controllers\Pc;

use App\Models\Employee;
use App\Models\EmployeeGroup;
use App\Models\WorkArrange;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Route,Auth;
use App\Models\Banner;
use App\Http\Controllers\Pc\Controller as BaseController;


class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function home(Request $request)
    {
        $date = date('Y-m-d');
        $work_times = WorkTime::orderBy('id','asc')->get();
        foreach ($work_times as $key => $work_time)
        {
            $work_time->end_time = $work_time->end_time == '00:00:00'? '23:59:59' : $work_time->end_time;
            if(time()<strtotime(date('Y-m-d 08:00:00')))
            {
                $date = date('Y-m-d',strtotime('-1 day'));
            }
            $work_arrange = WorkArrange::where('work_time_id',$work_time['id'])->where('date',$date)->first();
            if($work_arrange)
            {
                $work_arrange->employees = Employee::where('employee_group_id',$work_arrange['employee_group_id'])->orderBy('id','asc')->get()->toArray();
                $work_arrange->employee_group_name = EmployeeGroup::where('id',$work_arrange['employee_group_id'])->value('name');
                $work_time->work_arrange =$work_arrange->toArray() ;
            }
            $start_time = date('Y-m-d').' '. $work_time->start_time;
            $end_time = date('Y-m-d').' '. $work_time->end_time;
            if($work_time->start_time != '00:00:00')
            {
                $start_time = date('Y-m-d H:i:s',strtotime($start_time.' -1 day'));
                $end_time = date('Y-m-d H:i:s',strtotime($end_time.' -1 day'));
                //var_dump($work_time->start_time,$start_time);exit;
            }
            //echo(date("Y-m-d H:i:s").'-'.$start_time.'-'.$end_time."<br>");
            if(time()>=strtotime($start_time) && time()<strtotime($end_time))
            {
                $work_time->is_show = 1;
            }else{
                $work_time->is_show = 0;
            }
        }

        if ($this->response->typeIs('json')) {
            $content = $this->response->title('值班表')
                ->layout('render')
                ->view('work_arrange')
                ->data(compact('work_times','date'))
                ->http()->getContent();
            return $this->response
                ->success()
                ->data([
                    'content' => $content
                ])
                ->output();
        }


        return $this->response->title('值班表')
            ->view('home')
            ->data(compact('work_times','date'))
            ->output();
    }

    public function test(Request $request)
    {
        exit;
        $end_date = '2021-12-15';
        $date = '2021-11-29';

        while ($end_date > $date)
        {
            echo $date.'<br>';

            for($i=1;$i<=3;$i++)
            {
                WorkArrange::create([
                    'date' => $date,
                    'work_time_id' => $i
                ]);

                echo $i.'<br>';
            }
            $date = date('Y-m-d',strtotime($date.' +1 day'));
        }
        exit;
    }

}
