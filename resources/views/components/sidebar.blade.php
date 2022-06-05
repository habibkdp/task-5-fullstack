<div class="container-fluid">
    <div class="col-2 text-light sidebar p-4">
        <h4 class="mb-5 text-center">Dashboard</h4>
        <li class="list-unstyled p-3 {{ (Request::is('article')) ? 'active-page' : '' }}"><a href="{{ route('Article') }}" class="text-decoration-none">Article</a></li>
        <li class="list-unstyled p-3 {{ (Request::is('category')) ? 'active-page' : '' }}"><a href="{{ route('Category') }}" class="text-decoration-none">Category</a></li>
    </div>
</div>