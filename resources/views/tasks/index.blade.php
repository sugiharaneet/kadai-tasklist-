@extends('layouts.app')

@section('content')

@if (count($tasks) > 0)

<h1>タスク一覧</h1>
@foreach ($tasks as $task)
    id : {!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} 
    タスク：　{{ $task->content }} 
    ステータス：　{{ $task->status }} </br>
@endforeach

@endif

{!! link_to_route('tasks.create', '新規追加', [], ['class' => 'btn btn-primary']) !!}


@endsection