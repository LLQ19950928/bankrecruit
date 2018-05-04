@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <script src="/js/frontend/resume/eval.js"></script>
@endsection

@section('detail')
    <div class="main_you2">
        <div class="main_you22_1 title_font">
            <div style="float: left;margin-left: 10px;margin-top: 4px;">自我评价</div>
        </div>
        <div class="main_you22_3">
            <form method="post" id="resumeForm">
                <table width="700" border="0" align="center" cellpadding="0"
                       cellspacing="0" id="info" style="border-collapse:separate; border-spacing: 0px 20px;">
                    <tr>
                        <td width="115">自我评价</td>
                        <td colspan="3" height="250">
                            <textarea rows="12" cols="60" name="eval">@if($data != []){{ $data['eval'] }}@endif</textarea>
                        </td>
                    </tr>
                </table>
            </form>
            <button id="saveButton" class="button">保存</button>
        </div>
    </div>
@endsection