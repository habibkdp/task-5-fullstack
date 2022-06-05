@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col-4 justify-content-center">
    <form action="{{ route('storeCategory') }}" method="post">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control" placeholder="Nama Kategori">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection