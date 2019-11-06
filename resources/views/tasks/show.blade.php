@extends('layouts.app')

@section('content')

<h1>タスクid:{{ $task->id }}の詳細</h1>

{{ $task->id }}
{{ $task->content }}

{!! link_to_route('tasks.edit', '編集', ['id' => $task->id]) !!}
{!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@endsection