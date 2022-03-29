@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif
@if ($post->exists)
    <form class="my-3" action="{{ route('admin.posts.update', $post->id) }}" method="POST" novalidate>
        @method('PUT')
    @else
        <form class="my-3" action="{{ route('admin.posts.store') }}" method="POST" novalidate>
@endif
@csrf
<div class="row gy-2">
    <div class="col-6">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
    </div>
    <div class="col-6">
        <label for="image" class="form-label">Url dell'immagine</label>
        <input type="url" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
    </div>
    <div class="col-12 text-center">
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="5" name="content">{{ old('content', $post->content) }}</textarea>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end align-items-center">
    <a class="btn btn-secondary mr-2" href="{{ route('admin.posts.index') }}" type="button" class="btn btn-success">
        Indietro
    </a>
    <button type="submit" class="btn btn-success">
        Conferma
    </button>
</div>

</form>
