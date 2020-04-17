@extends('layouts.admin')

@section('title', '本の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>本の編集</h2>
                <form action="{{ action('Admin\BooksController@update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="author_id">著者</label>
                        <div class="col-md-10">
                            <select class="form-control" name="author_id">
                                @foreach($authors as $author)
                                    @if($book->author_id == $author->id)
                                        <option selected value="{{ $author->id}}">{{ $author->name}}</option>
                                    @else
                                        <option value="{{ $author->id}}">{{ $author->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="description">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ $book->description }}</textarea>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection