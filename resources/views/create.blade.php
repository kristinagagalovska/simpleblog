@extends('app')
@section('title')
    Add New Post
@endsection
@section('content')
    <form action="/new-post" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name = "title" />

            <textarea name='body'class="form-control">{{ old('body') }}</textarea>

        <input type="submit" name='publish'  value = "Publish"/>
        <input type="submit" name='save'  value = "Save Draft" />
    </form>
@endsection