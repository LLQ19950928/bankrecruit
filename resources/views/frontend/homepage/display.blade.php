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
               <a href="http://bank.recruit.cn/frontend/aboutbank/getIntroductionInfo">银行介绍</a>
           </div>
           <div class="cell_1">
               <a href="http://bank.recruit.cn/frontend/aboutbank/getIntroductionInfo">
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
               <a href="http://bank.recruit.cn/frontend/schoolrecruit/getSchoolRecruitInfo">热门招聘</a>
           </div>
           <div class="cell_2">
               <div>
                   <ul class="nav nav-tabs" role="tablist">
                       <li class="active">
                           <a href="#school" aria-controls="school" role="tab"
                              data-toggle="tab">校园招聘</a>
                       </li>
                       <li>
                           <a href="#social" aria-controls="social" role="tab"
                              data-toggle="tab">
                               社会招聘
                           </a>
                       </li>
                   </ul>
                   <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active" id="school">
                           @foreach($data['schoolR'] as $schoolR)
                               <div class="cell_li">
                                   <div class="icon_new"></div>
                                   <div class="new_title">
                                       <a href="http://bank.recruit.cn/frontend/schoolrecruit/getSchoolRecruitDetail?id={{ $schoolR['id'] }}"
                                          class="text_color">{{ $schoolR['company'] }}</a>
                                   </div>
                                   <div class="news_createTime">{{ $schoolR['published_at'] }}</div>
                               </div>
                           @endforeach
                       </div>
                       <div role="tabpanel" class="tab-pane" id="social">
                           @foreach($data['socialR'] as $socialR)
                               <div class="cell_li">
                                   <div class="icon_new"></div>
                                   <div class="new_title">
                                       <a href="http://bank.recruit.cn/frontend/socialrecruit/getSocialRecruitDetail?id={{ $socialR['id'] }}"
                                          class="text_color">{{ $socialR['company'] }}</a>
                                   </div>
                                   <div class="news_createTime">{{ $socialR['published_at'] }}</div>
                               </div>
                           @endforeach
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="hrFoot">

   </div>
@endsection



