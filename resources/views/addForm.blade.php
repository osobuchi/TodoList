@extends('layout')

@section('title')
    新規タスク追加
@endsection

@section('content')
<h1>新規タスク追加</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

    <form method="POST">
        @csrf
        <dl>
            <dt>タイトル</dt>
            <dd><input type="text" name="title" value="{{old('title')}}"></dd>
        </dl>
        <dl>
            <dt>メモ</dt>
            <dd><textarea name="memo">{{old('memo')}}</textarea></dd>
        </dl>
        <input class="btn btn-primary" type="submit" value="新規作成">
    </form>
    <br>
    <td><a href="{{route('stTodo')}}">未完了タスクページへ戻る</a></td>
@endsection

