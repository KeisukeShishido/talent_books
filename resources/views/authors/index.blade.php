@extends('layouts.app')

@section('content')
<div class="containeer">
    @foreach($authors as $author)
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div style="margin-right: 8px;">
                <div style="margin-bottom: 8px;">
                    <label style="font-weight: bold;">著者名</label>
                    <p class="author">{{ $author->name }}</p>
                </div>
                <div style="margin-bottom: 8px;">
                    <label style="font-weight: bold;">説明</label>
                    <p>{{ $author->description }}</p>
                </div>
                <hr>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    @endforeach
</div>
@endsection