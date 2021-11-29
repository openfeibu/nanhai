@foreach($work_times as $key=> $work_time)
    <div class="item" @if(!$work_time->is_show) style="display: none;" @endif>
        @if(isset($work_time['work_arrange']) && $work_time['work_arrange'])

            <div class="time-line"> {{ $work_time['start_time'] }} - {{$work_time['end_time'] }} {{ $work_time['work_arrange']['employee_group_name'] }}组 </div>
            @if(isset($work_time['work_arrange']['employees']))
                @foreach($work_time['work_arrange']['employees'] as $key=> $employee)
                    <div class="name-line"> {{ $employee['job_name'] }} -- {{ $employee['name'] }} </div>
                @endforeach
            @endif
        @else
            <div>{{ $work_time['start_time'] }} - {{$work_time['end_time'] }} 未排班</div>

        @endif
    </div>
@endforeach