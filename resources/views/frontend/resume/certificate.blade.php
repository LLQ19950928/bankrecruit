@extends('layouts.resume')

@section('resumeStyle')
    <link rel="stylesheet" href="/css/common/resume.css">
    <link rel="stylesheet" href="/layer/mobile/need/layer.css">
    <script src="/layer/layer.js"></script>
    <script src="/js/frontend/resume/certificate.js"></script>
@endsection

@section('detail')
    @include('frontend.resume.certificate.computer')
    @include('frontend.resume.certificate.foreign')
@endsection