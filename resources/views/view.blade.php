@extends('layouts.app')

@section('content')
<div class="container bg-white shadow-sm rounded-md">
    <form method="POST" action="/edit/{{$memo['id']}}">
        @csrf
        <div class="flex">
            <div class="mr-4">title</div>
            <input type="text" name="title" value="{{$memo['title']}}" />
        </div>
        <div class="flex">
            <div class="mr-4">tags</div>
            @foreach($tags as $tag)
            <input type="text" name="tag" value="{{$tag['name']}}" />
            @endforeach
        </div>
        <textarea name="content" class="form-group w-full min-h-[500px]">{{$memo['content']}}</textarea>
        <div class="flex w-full justify-end">
            <button type='submit' class="">変更</button>
        </div>
    </form>
</div>
@endsection