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
  <div class="col-12 col-sm-4 mb-2 mb-sm-0">
    <h1 class="text-white  text-sm-left">Update Categories</h1>
  </div>
  <div class="col-12 col-sm-2  text-sm-right">
    <a href="{{route('view-admin-category')}}" class="btn btn-primary">Back</a>
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

{{-- Validation Errors --}}
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



          <div class="main">
            <div class="content-wrapper">
              <div class="card">
                <div class="card-body">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{ $product->id }}">

    <div class="form-group text-white">
        <label for="cate_id">Category</label>
        <select name="cate_id" id="cate_id" class="form-control text-white" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->cate_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control text-white" required>
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" value="{{ $product->slug }}" class="form-control text-white" required>
    </div>

    <div class="form-group">
        <label for="small_description">Short Description</label>
        <textarea name="small_description" class="form-control text-white" rows="2">{{ $product->small_description }}</textarea>
    </div>

    <div class="form-group">
        <label for="description">Full Description</label>
        <textarea name="description" class="form-control text-white" rows="4">{{ $product->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="original_price">Original Price</label>
        <input type="text" name="original_price" value="{{ $product->original_price }}" class="form-control text-white">
    </div>

    <div class="form-group">
        <label for="selling_price">Selling Price</label>
        <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control text-white">
    </div>

    <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="text" name="qty" value="{{ $product->qty }}" class="form-control text-white">
    </div>

    <div class="form-group">
        <label for="tax">Tax (%)</label>
        <input type="text" name="tax" value="{{ $product->tax }}" class="form-control text-white">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control text-white">
            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <label for="trending">Trending</label>
        <select name="trending" class="form-control text-white">
            <option value="1" {{ $product->trending == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ $product->trending == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Product Image</label><br>
        @if ($product->image)
            <img src="{{ asset('images/products/' . $product->image) }}" width="80" class="mb-2" alt="Product Image"><br>
        @endif
        <input type="file" name="image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update Product</button>
</form>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      @include('admin.script')
    </div>
  </body>
</html>
