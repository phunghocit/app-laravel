@extends('template.master')
@section('title')
    Home
@endsection
@section('content')
    <h2>Home</h2>
@endsection

@section('sidebar')
    @parent  {{--Lấy tất cả của tk cha--}}
    <h2>Thêm gì đó</h2>
@endsection