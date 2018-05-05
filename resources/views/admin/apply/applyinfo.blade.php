@extends('layouts.admin');

@section('title', '后台主页')

@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            职位申请管理
            <span class="c-gray en">&gt;</span>
            职位申请列表
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
               href="javascript:location.replace(location.href);" title="刷新" >
                <i class="Hui-iconfont">&#xe68f;</i>
            </a>
        </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="mt-20">
                    @if($data)
                        <table class="table table-border table-bordered table-bg table-hover table-sort">
                            <thead>
                            <tr class="text-c">
                                <th width="150">申请者</th>
                                <th width="120">申请时间</th>
                                <th width="120">岗位名称</th>
                                <th width="120">笔试地点</th>
                                <th width="120">面试地点</th>
                                <th width="60">状态</th>
                                <th width="120">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $apply)
                                <tr class="text-c">
                                    <td class="text-l">
                                        <span>{{ $apply['user_id'] }}</span>
                                    </td>
                                    <td>{{ $apply['created_at'] }}</td>
                                    <td>{{ $apply['job_name'] }}</td>
                                    <td>{{ $apply['exam_place'] }}</td>
                                    <td>{{ $apply['interview_place'] }}</td>
                                    <td class="td-status">
                                       <span class="label label-success radius">
                                           {{ $apply['status'] }}
                                       </span>
                                    </td>
                                    <td class="f-14 td-manage">
                                        <a style="text-decoration:none" class="ml-5"
                                           onClick="article_edit('资讯编辑','article-add.html','10001')"
                                           href="javascript:;" title="编辑">
                                            <i class="Hui-iconfont">&#xe6df;</i>
                                            查看简历
                                        </a>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </article>
        </div>
    </section>
@endsection

@section('style')
    <script type="text/javascript" src="/h-ui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="/h-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/h-ui/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript">


        /*资讯-添加*/
        function article_add(title,url,w,h) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        /*资讯-编辑*/
        function article_edit(title,url,id,w,h) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        /*资讯-删除*/
        function article_del(obj,id){
            layer.confirm('确认要删除吗？',function(index) {
                $.ajax({
                    type: 'POST',
                    url: '',
                    dataType: 'json',
                    success: function(data){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }

        /*资讯-审核*/
        function article_shenhe(obj,id) {
            layer.confirm('审核文章？', {
                    btn: ['通过','不通过','取消'],
                    shade: false,
                    closeBtn: 0
                },
                function(){
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                    $(obj).remove();
                    layer.msg('已发布', {icon:6,time:1000});
                },
                function(){
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                    $(obj).remove();
                    layer.msg('未通过', {icon:5,time:1000});
                });
        }

        /*资讯-下架*/
        function article_stop(obj,id){
            layer.confirm('确认要下架吗？',function(index){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
                $(obj).remove();
                layer.msg('已下架!',{icon: 5,time:1000});
            });
        }

        /*资讯-发布*/
        function article_start(obj,id){
            layer.confirm('确认要发布吗？',function(index){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                $(obj).remove();
                layer.msg('已发布!',{icon: 6,time:1000});
            });
        }
        /*资讯-申请上线*/
        function article_shenqing(obj,id){
            $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
            $(obj).parents("tr").find(".td-manage").html("");
            layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
        }
    </script>
@endsection