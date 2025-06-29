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
                  <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="id" value="{{$category->id}}" hidden>

                    <div class="form-group text-white">
                      <label for="name">Category Name</label>
                      <input type="text" name="name" value="{{$category->name}}" class="form-control text-white" required placeholder="Enter category name">
                    </div>

                    <div class="form-group">
                      <label for="slug">Slug</label>
                      <input type="text" name="slug" value="{{$category->slug}}" class="form-control text-white" required placeholder="Enter slug (URL friendly)">
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control text-white" rows="3" placeholder="Enter category description">{{$category->description}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <select name="status" class="form-control text-white" required>
                        <option value="1" {{$category->status ? 'selected' : ''}}>Active</option>
                        <option value="0" {{$category->status ? '' : 'selected'}}>Inactive</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="popular">Popular</label>
                      <select name="popular" class="form-control text-white">
                        <option value="1" {{$category->popular ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{$category->popular ? '' : 'selected'}}>No</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control text-white" placeholder="Enter meta title for SEO">
                    </div>

                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <textarea name="meta_keywords" class="form-control text-white" rows="2" placeholder="Enter meta keywords (comma separated)">{{$category->meta_keywords}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="meta_descrip">Meta Description</label>
                      <textarea name="meta_descrip" class="form-control text-white" rows="3" placeholder="Enter short SEO description">{{$category->meta_descrip}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="image">Category Image</label><br>
                      @if (isset($category) && $category->image)
      <img src="{{ asset('images/categories/' . $category->image) }}" width="70" class="mb-2" alt="Current Image"><br>
    @endif
                      <input type="file" name="image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
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
