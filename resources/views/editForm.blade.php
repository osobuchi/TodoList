@extends('layout')

@section('title')
    タスク編集
@endsection

@section('content')
<h1>タスク編集</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

    <form method="POST" action="editForm">
        @csrf
        <input type="hidden" name="id" value="{{$todo->id}}">
        <dl>
            <dt>タイトル</dt>
            <dd><input type="text" name="title" value="{{$todo->title}}"></dd>
        </dl>
        <dl>
            <dt>メモ</dt>
            <dd><textarea name="memo">{{$todo->memo}}</textarea></dd>
        </dl>
        <input class="btn btn-primary" type="submit" value="更新">
    </form>
    <br>
    <td><a href="{{route('stTodo')}}">未完了タスクページへ戻る</a></td>
@endsection

