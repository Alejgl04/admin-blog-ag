@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Post List</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop
