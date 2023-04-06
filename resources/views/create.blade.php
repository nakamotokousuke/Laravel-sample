@extends('layouts.app')


@section('content')
<div class="container bg-white shadow-sm rounded-md">
    <form method="POST" action="/store" class="flex-col">
        @csrf
        <div class="flex gap-2">
            <label>title</label>
            <div>:</div><input name="title" type="text" placeholder="タイトルを入力">
        </div>
        <div class="flex gap-2 form-group">
            <label>tag</label>
            <div>:</div>
            <input type="text" name="tag" placeholder="タグを入力">
        </div>
        <div class="form-group py-2">
            <textarea name='content' class="form-control" rows="10"></textarea>
        </div>
        <div class="flex w-full justify-end">
            <button type='submit' class="">作成</button>
        </div>
    </form>
</div>
@endsection