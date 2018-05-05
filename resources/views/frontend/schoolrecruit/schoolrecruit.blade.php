@extends('layouts.recruit')

@section('title')
    校园招聘
@endsection

@section('style')
    <link rel="stylesheet" href="/css/frontend/schoolrecruit/schoolrecruit.css">
@endsection

@section('content')
    <div class="list_1_1 title_font">
        <img src="/image/announce/announce.gif">
        <div style="display:inline-block;margin-left: 10px;margin-top: 4px;">校园招聘</div>
    </div>
    @if($data)
        <div class="position_title">
            <table class="table_style">
                <tr class="table_head">
                    <td>职位名称</td>
                    <td>部门</td>
                    <td>工作地点</td>
                    <td>招聘人数</td>
                    <td>截止日期</td>
                    <td>操作</td>
                </tr>
                @foreach($data as $job)
                    <tr>
                        <td>{{ $job['job_name'] }}</td>
                        <td>{{ $job['company'] }}</td>
                        <td>{{ $job['work_place'] }}</td>
                        <td>{{ $job['number'] }}</td>
                        <td>{{ date('Y-m-d', $job['end_at']) }}</td>
                        <td>
                            <a href="http://bank.recruit.cn/frontend/schoolrecruit/getSchoolRecruitDetail?id={{ $job['id'] }}">查看详情</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@endsection