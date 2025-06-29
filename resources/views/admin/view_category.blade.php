<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>    
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.navbar')

      <div class="main-panel">
        <div class="content-wrapper">
<div class="row mb-4 align-items-center">
  <div class="col-12 col-sm-3 mb-2 mb-sm-0">
    <h1 class="text-white  text-sm-left">All Categories</h1>
  </div>
  <div class="col-12 col-sm-4  text-sm-right">
    <a href="{{route('add-admin-category')}}" class="btn btn-primary">Add New Category</a>
  </div>
</div>


          

          {{-- Success Message --}}
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- Error Message --}}
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="card mt-4">
            <div class="card-body">
              <div class="table-responsive">
  <table class="table table-bordered table-dark table-hover text-white">
    <thead class="bg-white">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Popular</th>
        <th>Image</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>{{ $category->slug }}</td>
          <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
          <td>{{ $category->popular ? 'Yes' : 'No' }}</td>
          <td>
            @if ($category->image)
              <img src="{{ asset('images/categories/' . $category->image) }}" width="50" height="50" alt="Category Image">
            @else
              N/A
            @endif
          </td>
          <td>{{ $category->created_at->format('d-m-Y') }}</td>
          <td>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


              {{-- Pagination --}}
              <div class="d-flex justify-content-center mt-3">
                {{ $categories->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>

        </div>
      </div>

      @include('admin.script')
    </div>
  </body>
</html>
