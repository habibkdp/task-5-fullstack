@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <div><a href="{{ route('Create Article') }}" class="btn btn-primary">Tambah Data</a></div>
</div>

@if (session()->has('successMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('updateMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('updateMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('deleteMessage'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('deleteMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($articles->count())
<table class="table table-hover table-striped align-middle border">
  <thead>
    <tr>
      <th class="col-1 border-end py-3">Nomor</th>
      <th class="col-2 border-end py-3">Judul</th>
      <th class="col-4 border-end py-3">Content</th>
      <th class="col-2 border-end py-3">Dibuat Oleh</th>
      <th class="col-1 border-end py-3">Kategori</th>
      <th class="col-2 py-3">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($articles as $index => $article)
    <tr>
      <td class="border-end">{{ ($currentPage - 1) * $perPage + $index + 1 }}</td>
      <td class="border-end">{{ $article->title }}</td>
      <td class="border-end">{{ $article->content }}</td>
      <td class="border-end">{{ $article->user->name }}</td>
      <td class="border-end">{{ $article->category->name }}</td>
      <td><a href="/article/edit/{{ $article->id }}" class="btn btn-warning">Edit</a>  <a href="/article/delete/{{ $article->id }}" onclick="deleteAlert(event)" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $articles->links() }}
@else
  <h1>Tidak ada data yang ditemukan!</h1>
@endif
@endsection

@section('javascript')
    <script type="text/javascript">
      function deleteAlert(event) {
        $confirm = confirm('Delete Data ?');

        if (!$confirm) {
          event.preventDefault()
        }
      }
    </script>
@endsection