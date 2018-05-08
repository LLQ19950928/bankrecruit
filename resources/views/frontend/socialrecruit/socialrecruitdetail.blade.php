@extends('layouts.recruit')

@section('title')
    社会招聘
@endsection

@section('style')
    <link rel="stylesheet" href="/css/frontend/schoolrecruit/detail.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <script type="application/javascript" src="/bootstrap/js/bootstrap.js"></script>
    <script type="application/javascript" src="/js/frontend/schoolrecruit/detail.js"></script>
@endsection

@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="1" width="950px" height="50px">
        <tbody>
        <tr>
            <td align="left" width="40%">
                <hr>
            </td>
            <td align="center" class="headWord" width="20%">职位描述</td>
            <td align="right" width="40%">
                <hr>
            </td>
        </tr>
        </tbody>
    </table>
    <form class="form-inline form_style" id="applyForm" method="post">
        <div class="form-group">
            <label for="exampleInputName2">笔试地点</label>
            &nbsp;
            <select class="form-control" style="width: 140px" name="exam_place">
                <option selected="selected">----请选择---</option>
                @foreach($data['exam_place'] as $exam)
                    <option value="{{ $exam }}">{{ $exam }}</option>
                @endforeach
            </select>
        </div>
        &nbsp;&nbsp;
        <div class="form-group">
            <label for="exampleInputEmail2">面试地点</label>
            &nbsp;
            <select class="form-control" style="width: 140px" name="interview_place">
                <option selected="selected">----请选择---</option>
                @foreach($data['interview_place'] as $interview)
                    <option value="{{ $interview }}">{{ $interview }}</option>
                @endforeach
            </select>
            <input type="hidden" value="{{ $data['id'] }}" name="job_id">
            <input type="hidden" value="{{ session('userId') }}" name="user_id">
        </div>
    </form>
    <div class="table_style">
        <table class="table table-bordered">
            <tr>
                <th>招聘职位</th>
                <th>发布时间</th>
                <th>工作地点</th>
                <th>截止日期</th>
                <th>招聘单位</th>
            </tr>
            <tr>
                <td>{{ $data['job_name'] }}</td>
                <td>{{ $data['published_at'] }}</td>
                <td>{{ $data['work_place'] }}</td>
                <td>{{ $data['end_at'] }}</td>
                <td>{{ $data['company'] }}</td>
            </tr>
        </table>
        <div class="panel panel-primary">
            <div class="panel-heading">主要职责</div>
            <div class="panel-body">
                <?php echo $data['duty']?>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">基本应聘条件</div>
            <div class="panel-body">
                <?php echo $data['condition']?>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">职位具体要求</div>
            <div class="panel-body">
                <?php echo $data['requirement']?>
            </div>
        </div>
        <div class="btn_style">
            <button class="btn btn-primary" type="button"
                    id="applyBtn" username="{{ session('username') }}">我要申请</button>
        </div>
    </div>
@endsection