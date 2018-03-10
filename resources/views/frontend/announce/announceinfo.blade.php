@extends('layouts.recruit')

@section('title')
    公告
@endsection

@section('style')
    <link rel="stylesheet" href="/css/frontend/announce/announceinfo.css">
@endsection

@section('content')
    <div class="list_1_1 title_font">
        <img src="/image/announce/announce.gif">
        <div style="display:inline-block;margin-left: 10px;margin-top: 4px;">重要公告</div>
    </div>
    @foreach($data as $announce)
        <div class="text_font">
            <div class="icon_new"></div>
            <div class="pub_title">
                <a href="http://bank.recruit.cn/frontend/announce/getAnnounceDetail?id={{ $announce['id'] }}">{{ $announce['title'] }}</a>
            </div>
            <div class="pub_time">[{{ $announce['published_at'] }}]</div>
        </div>
    @endforeach
@endsection