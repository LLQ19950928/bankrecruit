@extends('layouts.admin');

@section('title', '后台主页')

@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            银行信息管理
        </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a class="btn btn-primary radius" data-title="添加资讯" _href=""
                   onclick="article_add('添加银行信息','http://bank.recruit.cn/admin/aboutbank/editBankInfo')"
                   href="javascript:;">
                    <i class="Hui-iconfont">&#xe600;</i>
                    编辑银行信息
                </a>
				</span>
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
    </script>
@endsection