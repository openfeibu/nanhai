	<div class="mask"></div>
<div class="layui-row">

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">工号：</label>
            <div class="layui-input-inline" style="width: 200px;">
                <input type="text" name="work_number" autocomplete="off" class="layui-input" placeholder="请输入工号">
            </div>

        </div>
        <div class="layui-inline">
            <div class="layui-input-inline" style="width: 100px;">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即签到</button>
            </div>
        </div>
    </div>
	<div class="zb-title">值班表</div>
    <div id="work_arrange">
        @include('work_arrange')
    </div>
</div>
<script>
var myDate = new Date();
layui.use(['jquery','element','table'], function(){
	
		var $ = layui.$;
		$(".layui-btn").on("click",function(){
			var val = $(".layui-input").val();
			console.log(val)
			if(val.length == 0){
				layer.msg('请输入工号', function(){
					//关闭后的操作
					});
			}else{
				
				layer.msg(val+'：签到成功', {
				  icon: 6,
				  
				})
				$(".mask").show();
				setTimeout(function(){
					$(".mask").hide();
				},3000)
			}
		})
		var Date = "{{ date('j') }}";
		
		//Ctime()
		setInterval(function(){
			Ctime()
		},30000)
		function Ctime(){
		    $.get('/',function (data) {
		        $("#work_arrange").html(data);
               // console.log(data);
            });
			var nowDate = myDate.getDate();
			console.log(nowDate,Date)
			if(nowDate != Date){
				//diff
				Date = nowDate;
				window.location.reload();
			}
		}
		
});
	
</script>
<style>
	#work_arrange{width:1200px;margin:20px auto;overflow:hidden;}
	.zb-title{text-align:center;font-size:36px;width:1200px;margin:0 auto;position:relative}
	.zb-title:before{content:'';position:absolute;width:400px;height:2px;border-radius:2px;background:#3da5dd;right:10px;top:50%}
	.zb-title:after{content:'';position:absolute;width:400px;height:2px;border-radius:2px;background:#3da5dd;left:10px;top:50%}
	.item{margin:0 10px;box-shadow:0 5px 20px #eee;border-radius:5px;overflow:hidden;}
	.time-line{height:50px;line-height:50px;text-align:center;background:#3da5dd;color:#fff;font-size:16px;font-weight:bold;}
	.name-line{height:50px;line-height:50px;text-align:center;background:#fff;color:#333;font-size:16px;font-weight:bold;}
	.layui-form-item{width:1200px;margin:20px auto 40px auto;text-align:right}
	.layui-form-label{color:#666;font-size:14px}
	.layui-btn{background:#3da5dd}
	.layui-row{z-index:998;position:relative;}
	.mask{position:fixed;width:100%;height:100%;background:rgba(0,0,0,0.3);z-index:9999;top:0;display:none}
</style>