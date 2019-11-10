@extends('layouts.app')

@section('content')

@if (Auth::check())
    {{ Auth::user()->name }}
    {!! link_to_route('logout.get', 'Logout') !!}
    
    @if (count($tasklists) > 0)
        <h1>タスク一覧</h1>
        @foreach ($tasklists as $task)
            id : {!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} 
            タスク：　{{ $task->content }} 
            ステータス：　{{ $task->status }} </br>
        @endforeach
    @endif
    
    {!! link_to_route('tasks.create', '新規追加', [], ['class' => 'btn btn-primary']) !!}
@else
<ul>
    <li>{!! link_to_route('signup.get', 'Register', [], ['class' => 'nav-link']) !!}</li>
    <li>{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
</ul>
@endif

@endsection