@extends('layouts.app')

@section('content')
<div class="container bg-white shadow-sm rounded-md">
    <div class="">
        <div class="w-full grid grid-cols-3 text-gray-500">
            <div>title</div>
            <div>tags</div>
            <div></div>
        </div>
        @foreach($memos as $memo)
        <div class="w-full grid grid-cols-3">
            <a href="/view/{{$memo['id']}}" class="">{{$memo['title']}}</a>
            <div class="flex flex-wrap">
                @foreach($tags as $tag)
                @if($memo['id'] === $tag['memo_id'])
                <div>{{$tag['name']}}</div>
                @endif
                @endforeach
            </div>
            <form method='POST' action="/delete/{{$memo['id']}}" id='delete-form'>
                @csrf
                <button class='p-0 mr-2' style='border:none;'>delete</button>
            </form>
        </div>
        @endforeach
    </div>
    <div>新規作成</div>
</div>
@endsection