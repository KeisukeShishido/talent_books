@extends('layouts.app')

@section('content')
<div class="containeer">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div style="margin-right: 8px;">
                <div style="margin-bottom: 8px;">
                    <label style="font-weight: bold;">著者</label>
                    <p class="author">{{ $book->author->name }}</p>
                </div>
                <div style="margin-bottom: 8px;">
                    <label style="font-weight: bold;">タイトル</label>
                    <p>{{ $book->title }}</p>
                </div>
                <div style="margin-bottom: 8px;">
                    <label style="font-weight: bold;">内容</label>
                    <p>{{ $book->description }}</p>
                </div>
                <hr>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection