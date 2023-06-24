<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Enter the post name">
    </div>
    <div>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
    </div>

    @if ( $posts->count() )
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Created At</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td> {{ $post->id }} </td>
                                <td> {{ $post->name }} </td>
                                <td> {{ $post->category->name }} </td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                    <small>
                                        {{ $tag->name }}
                                    </small>

                                    @endforeach
                                </td>
                                <td>
                                    {{ $post->created_at->format('d/m/Y') }}
                                </td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}"> Update </a>
                                </td>
                                <td with="10px">
                                    <form action="{{ route('admin.posts.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>There is no record...</strong>
        </div>
    @endif
</div>
