<div class="layui-row">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">工号</label>
            <div class="layui-input-inline" style="width: 100px;">
                <input type="text" name="work_number" autocomplete="off" class="layui-input">
            </div>

        </div>
        <div class="layui-inline">
            <div class="layui-input-inline" style="width: 100px;">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
        </div>

    </div>
    <div id="work_arrange">
        <div>值班表</div>
        @foreach($work_times as $key=> $work_time)
        @if(isset($work_time['work_arrange']) && $work_time['work_arrange'])
            <div> {{ $date }} {{ $work_time['start_time'] }} - {{$work_time['end_time'] }} {{ $work_time['work_arrange']['employee_group_name'] }}组 </div>
            @if(isset($work_time['work_arrange']['employees']))
                @foreach($work_time['work_arrange']['employees'] as $key=> $employee)
                    <div> {{ $employee['name'] }} </div>
                @endforeach
            @endif
        @else
            <div>{{ $date }} {{ $work_time['start_time'] }} - {{$work_time['end_time'] }} 未排班</div>
        @endif
        @endforeach

    </div>
</div>