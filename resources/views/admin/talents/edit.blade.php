@extends('layouts.admin')

@section('title', 'タレントの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タレントの編集</h2>
                <form action="{{ action('Admin\TalentsController@update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="id" value="{{ $talent->id }}">
                    <div class="form-group row">
                        <label class="col-md-2" for="name">タレント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $talent->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="description">説明文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ $talent->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="book_ids[]">本</label>
                        <div class="col-md-10">
                            <select multiple class="form-control js-attachSelect2" name="book_ids[]">
                                @foreach($books as $book)
                                    @if($book["selected"])
                                        <option selected value="{{ $book["book"]->id}}">{{ $book["book"]->title}}</option>
                                    @else
                                        <option value="{{ $book["book"]->id}}">{{ $book["book"]->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
    <script>
    jQuery(function($){
        $(".js-attachSelect2").select2();
    });
    </script>
@endsection