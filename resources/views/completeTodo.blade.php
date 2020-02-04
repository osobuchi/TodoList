@extends('layout')

@section('title')
    完了タスク
@endsection

@section('content')

    <h1>完了リスト</h1>

    <form method="POST" action="delete">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>選択</th><th>id</th><th>タイトル</th><th>メモ</th><th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $todo->id }}"></td>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->memo}}</td>
                        <td><a class="btn btn-primary" href="{{route('still',['id'=>$todo->id])}}" role="button">未完了に戻す</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input class="btn btn-primary" type="submit" value="選択した記事を削除">

    </form>

    <br><br><br>
    <a href="{{route('stTodo')}}">未完了タスクリストへ</a>
    @endsection

