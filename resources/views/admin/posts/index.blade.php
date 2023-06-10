@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <a class="float-right btn btn-secondary btn-sm" href="{{ route('admin.posts.create')}}"> New Post </a>
    <h1>Post List</h1>

@stop

@section('content')
    @livewire('admin.posts-index')
@stop
