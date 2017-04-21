@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Lecturer Dashboard</h1>
    <p>Welcome to the Dashboard.</p>
    <p>Here you can <a href="{{route('admin.units.index')}}">manage your units</a> and their lectures and <a
                href="{{route('admin.analytics.index')}}">read statistics</a> of your units based on your students' answers.</p>

@stop