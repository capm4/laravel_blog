@extends('layouts.site')
@section('header')
    @include('template.header')
@endsection
@section('content')
    @include('admin.users_content')
@endsection
@section('footer')
    @include('template.footer')
@endsection