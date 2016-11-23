@extends('layouts.master')

@section('title')
{{trans('user.edit.title')}} | @parent
@stop

@section('page-title')
    @pageHeader('user.edit.title', 'user.edit.description', 'user.edit.icon')
@stop

@section('main-content')
    {!! form()->model($user, ['url' => route('users.update', $user->id), 'method' => 'put']) !!}
    @include('users.partials.form')
    {!! form()->close() !!}
@stop