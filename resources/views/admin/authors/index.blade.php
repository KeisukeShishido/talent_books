
    <div class="container">
        <div class="row">
            <h2>著者の一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\AuthorsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
        <div class="row">
            <div class="list-Profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">著者</th>
                                <th width="65%">説明文</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>{{ \Str::limit($author->name, 100) }}</td>
                                    <td>{{ \Str::limit($author->description, 100) }}</td>
                                    <td style="display:table; margin:10px;">
                                        <div style="display:table-cell;">
                                            <a class="btn btn-primary" style="margin-right:5px;" href="{{ action('Admin\AuthorsController@edit', ['id' => $author->id]) }}">編集</a>
                                        </div>
                                        <div style="display:table-cell;">
                                            <form action="{{ action('Admin\AuthorsController@delete') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id" value="{{ $author->id }}">
                                                <input class="btn btn-primary" type="submit" value="削除" >
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
