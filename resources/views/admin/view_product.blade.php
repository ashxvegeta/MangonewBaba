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
        <th>cate_id</th>
        <th>name</th>
        <th>small_description</th>
        <th>description</th>
        <th>original_price</th>
        <th>selling_price</th>
        <th>image</th>
        <th>quantity</th>
        <th>tax</th>
        <th>status</th>
        <th>trending</th>  
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->cate_id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->small_description }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->original_price }}</td>
          <td>{{ $product->selling_price }}</td>
            <td>
                @if ($product->image)
                <img src="{{ asset('images/products/' . $product->image) }}" width="50" height="50" alt="Product Image">
                @else
                N/A
                @endif
          <td>{{ $product->qty }}</td>
          <td>{{ $product->tax }}</td>
            <td>{{ $product->status ? 'Active' : 'Inactive' }}</td>
            <td>{{ $product->trending ? 'Yes' : 'No' }}</td>
            <td>
                 <a href="" class="btn btn-sm btn-warning mb-1">Edit</a>
          <a href=""  onclick="return confirm('Are you sure you want to delete this category?');" class="btn btn-sm btn-danger mb-1">Delete</a>
            </td>

        
        
          <td>
         
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


              {{-- Pagination --}}
              <div class="d-flex justify-content-center mt-3">
                {{ $products->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>

        </div>
      </div>

      @include('admin.script')
    </div>
  </body>
</html>
