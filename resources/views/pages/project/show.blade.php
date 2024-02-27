@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <img src="{{ asset('storage/' . $project -> image) }}" alt="" width="300px">
@endsection