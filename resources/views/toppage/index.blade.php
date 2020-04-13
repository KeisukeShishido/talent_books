@extends('layouts.app')

@section('content')

@foreach($talents as $talent)
<div style="display: flex;">
    @if ($talent->image_path)
        <img src="{{ $talent->image_path }}" class="talent-image">
    @endif
        <div style="margin-right: 8px;">
            <div style="margin-bottom: 8px; font-weight: bold;">
                {{ $talent->name }}
            </div>
            <div style="margin-bottom: 8px;">
                <span style="font-size: 3.8vw;">{{ $talent->description }}</span>
            </div>
            <div style="margin-bottom: 20px;">
                <div style="font-weight: bold;">読んでいる本</div>
                    @foreach($talent->books as $book)
                        <span style="font-size: 12px; font-color:lightskyblue; margin-right: 4px;">{{ $book->title }}</span>
                    @endforeach
            </div>
        </div>
</div>
@endforeach

@endsection