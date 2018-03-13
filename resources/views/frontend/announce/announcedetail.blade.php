@extends('layouts.recruit')

@section('title')
    公告
@endsection

@section('style')
    <link rel="stylesheet" href="/css/frontend/announce/announcedetail.css">
@endsection

@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="1" width="950px" height="50px">
        <tbody>
        <tr>
            <td align="left" width="40%">
                <hr>
            </td>
            <td align="center" class="headWord" width="20%">重要公告</td>
            <td align="right" width="40%">
                <hr>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="announce_desc">
        <h3 style="text-align: center">{{ $announce['title'] }}</h3>
        <div>
           <?php echo $announce['content'];?>
        </div>
    </div>
@endsection