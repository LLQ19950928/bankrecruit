@extends('layouts.admin');

@section('title', '后台主页')

@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            社会招聘管理
            <span class="c-gray en">&gt;</span>
            社会招聘列表
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
               href="javascript:location.replace(location.href);" title="刷新" >
                <i class="Hui-iconfont">&#xe68f;</i>
            </a>
        </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a class="btn btn-primary radius" data-title="添加资讯" _href=""
                   onclick="article_add('添加公告','http://bank.recruit.cn/admin/schoolrecruit/editSchoolRecruitInfo')"
                   href="javascript:;">
                    <i class="Hui-iconfont">&#xe600;</i>
                    添加招聘公告
                </a>
				</span>
                </div>
                <div class="mt-20">
                    @if($data)
                        <table class="table table-border table-bordered table-bg table-hover table-sort">
                            <thead>
                            <tr class="text-c">
                                <th width="150">招聘职位</th>
                                <th width="150">招聘人数</th>
                                <th width="120">创建时间</th>
                                <th width="120">更新时间</th>
                                <th width="60">发布状态</th>
                                <th width="120">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $job)
                                <tr class="text-c">
                                    <td class="text-l">
                                        <span>{{ $job['job_name'] }}</span>
                                    </td>
                                    <td class="text-l">
                                        <span>{{ $job['number'] }}</span>
                                    </td>
                                    <td>{{ $job['created_at'] }}</td>
                                    <td>{{ $job['updated_at'] }}</td>
                                    <td class="td-status">
                                           <span class="label label-success radius">
                                               @if($job['status'] == 1)
                                                   未发布
                                               @else
                                                   已发布
                                               @endif
                                           </span>
                                    </td>
                                    <td class="f-14 td-manage">
                                        @if($job['status'] == 1)
                                            <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                                        @endif
                                            <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                                    </td>
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
                    }
                });
            });
        }

    </script>
@endsection