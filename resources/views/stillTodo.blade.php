@extends('layout')

@section('title')
    未完了タスク
@endsection

@section('content')

    <h1>未完了リスト</h1>
    <br>
    <a class="btn btn-primary" href="{{route('addform')}}">新規タスクの追加</a>
    <br><br>
    <form method="POST" action="delete">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>選択</th><th>id</th><th>タイトル</th><th>メモ</th><th> </th><th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $todo->id }}"></td>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->memo}}</td>
                        <td><a href="{{route('edit',['id'=>$todo->id])}}">編集</a></td>
                        <td><a class="btn btn-primary" href="{{route('complete',['id'=>$todo->id])}}" method="POST" role="button">完了</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input class="btn btn-primary" type="submit" value="選択した記事を削除">

    </form>

    <br><br><br>
    <a href="{{route('compTodo')}}">完了タスクリストへ</a>
    @endsection

