@extends('layouts.app')

@section('content')

<h1>編集：id={{ $task->id }}</h1>

{!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
    {!! Form::label('content', 'タスク') !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
    {!! Form::label('status', 'ステータス:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection