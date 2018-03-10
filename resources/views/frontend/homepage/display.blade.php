@extends('layouts.recruit')

@section('title', '银行主页')

@section('style')
    <script src="/js/frontend/homepage/display.js"></script>
@endsection

@section('position')
    <ul>
        <li>
            <a href="#" class="text-color">招聘首页</a>
        </li>
        <li>
            <a href="#" class="text-color">校园招聘</a>
        </li>
        <li>
            <a href="#" class="text-color">社会招聘</a>
        </li>
        <li>
            <a href="#" class="text-color">关于银行</a>
        </li>
        <li>
            <a href="#" class="text-color">重要公告</a>
        </li>
        <li>
            <a href="javascript:void(0)"
               class="text-color" id="myRecruit" username="{{ session('username') }}">我的招聘</a>
        </li>
    </ul>
@endsection

@section('content')

@endsection



