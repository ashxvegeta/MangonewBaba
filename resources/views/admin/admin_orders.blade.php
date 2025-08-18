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
    <h1 class="text-white  text-sm-left">All Orders</h1>
  </div>
  <div class="col-12 col-sm-4  text-sm-right">
    <!-- <a href="{{route('add-admin-product')}}" class="btn btn-primary">Add New Product</a> -->
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
      
        <th>Order Date</th>
        <th>tracking No</th>
        <th>Total Price</th>
        <th>status</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <td>{{ $order->created_at }}</td>
          <td>{{ $order->tracking_no }}</td>
          <td>{{ $order->total_price }}</td>
          <td>{{ $order->status ? 'Active' : 'Inactive' }}</td>
          <td>
            <a href="" class="btn btn-sm btn-warning mb-1">Edit</a>
            <a href=""  onclick="return confirm('Are you sure you want to delete this order?');" class="btn btn-sm btn-danger mb-1">Delete</a>
          </td>

          
        
         
         
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


              {{-- Pagination --}}

            </div>
          </div>

        </div>
      </div>

      @include('admin.script')
    </div>
  </body>
</html>
