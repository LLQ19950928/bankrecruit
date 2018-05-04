@extends('layouts.recruit')

@section('title', '招聘首页')

@section('style')
    <link rel="stylesheet" href="/css/frontend/homepage/display.css">
    <script src="/js/frontend/homepage/display.js"></script>
@endsection

@section('position')

@endsection

@section('content')
   <div class="main_content">
       <div class="cell">
           <div class="title_font">
               <a href="http://bank.recruit.cn/frontend/aboutbank/getBankInfo">银行介绍</a>
           </div>
           <div class="cell_1">
               <a href="http://bank.recruit.cn/frontend/aboutbank/getBankInfo">
                   <img alt="交行简介" src="/image/homepage/bank.gif">
               </a>
               <div class="cell_1_1">
                   {{ $data['introduction'] }}
               </div>
           </div>
       </div>
       <div class="cell" style="margin-left: 20px">
           <div class="title_font">
              <a href="http://bank.recruit.cn/frontend/announce/getAnnounceInfo">招聘公告</a>
           </div>
           <div class="cell_2">
              @foreach($data['announce'] as $announce)
                   <div class="cell_li">
                       <div class="icon_new"></div>
                       <div class="new_title">
                           <a href="http://bank.recruit.cn/frontend/announce/getAnnounceDetail?id={{ $announce['id'] }}"
                           class="text_color">{{ $announce['title'] }}</a>
                       </div>
                       <div class="news_createTime">{{ $announce['published_at'] }}</div>
                   </div>
              @endforeach
           </div>
       </div>
       <div class="cell" style="margin-left: 20px">
           <div class="title_font">
               <a href="#">热门招聘</a>
           </div>
           <div class="cell_2">
               <div class="cell_li">
                   <div class="icon_new"></div>
                   <div class="new_title">
                       <a href="#" class="text_color">交通银行2018校园招聘公告</a>
                   </div>
                   <div class="news_createTime">
                       2017-09-18
                   </div>
               </div>
               <div class="cell_li">
                   <div class="icon_new"></div>
                   <div class="new_title">
                       <a href="#" class="text_color">交通银行2018校园招聘公告</a>
                   </div>
                   <div class="news_createTime">
                       2017-09-18
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="hrFoot">

   </div>
@endsection



