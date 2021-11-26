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
        <?php $__currentLoopData = $work_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $work_time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div> <?php echo e($date); ?> <?php echo e($work_time['start_time']); ?> - <?php echo e($work_time['end_time']); ?> <?php echo e($work_time['work_arrange']['employee_group_name']); ?>组 </div>
            <?php if(isset($work_time['work_arrange']) && isset($work_time['work_arrange']['employees'])): ?>
                <?php $__currentLoopData = $work_time['work_arrange']['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div> <?php echo e($employee['name']); ?> </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>