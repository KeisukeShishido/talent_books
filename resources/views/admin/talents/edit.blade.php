
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
