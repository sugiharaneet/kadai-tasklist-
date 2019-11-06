@extends('layouts.app')

@section('content')

<h1>新規作成ページ</h1>

{!! Form::model($task, ['route' => 'tasks.store']) !!}
    {!! Form::label('content', '新規タスク:') !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
    {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}


@endsection