@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <div><a href="{{ route('Create Category') }}" class="btn btn-primary">Tambah Data</a></div>
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

@if ($categories->count())
<table class="table table-hover table-striped align-middle border">
  <thead>
    <tr>
      <th class="col-1 border-end py-3">Nomor</th>
      <th class="col-2 border-end py-3">Nama Kategori</th>
      <th class="col-7 border-end py-3">Dibuat Oleh</th>
      <th class="py-3">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $index => $category)
    <tr>
      <td class="border-end">{{ ($currentPage - 1) * $perPage + $index + 1 }}</td>
      <td class="border-end">{{ $category->name }}</td>
      <td class="border-end">{{ $category->user->name }}</td>
      <td><a href="/category/edit/{{ $category->id }}" class="btn btn-warning">Edit</a>  <a href="/category/delete/{{ $category->id }}" onclick="deleteAlert(event)" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $categories->links() }}
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