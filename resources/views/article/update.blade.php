@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col-4 justify-content-center">
    <form action="/article/edit/{{ $article->id }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" placeholder="Judul Artikel" value="{{ $article->title }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" placeholder="Content Artikel" rows="5">{{ $article->content }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori Konten</label>
        <select class="form-select" name="category">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ($article->category->id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection