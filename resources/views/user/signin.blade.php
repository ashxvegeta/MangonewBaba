<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
     <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="modal-backdrop d-flex align-items-center justify-content-center">
        <div class="login-container">
            <!-- Left Panel -->
            <div class="left-panel col-md-5">
          
            </div>

            <!-- Right Panel -->
            <div class="right-panel col-md-7 text-white position-relative mx-auto">
                <button class="btn btn-link text-white position-absolute top-0 end-0 mt-2 me-2 p-1">
                    <i class="fas fa-times fa-lg"></i>
                </button>

                <h3 class="mb-3 mb-md-2">Sign In</h3> 
                <!-- <p class="small mb-2">Using OTP</p> -->
                <hr class="w-25 mb-3 mb-md-4" id="border-warning">

                <form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="mb-3 mb-md-4">
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email Id" value="{{ old('email') }}">
        @if(session('error'))
        <div class="text-danger">
        {{ session('error') }}
        </div>
        @endif
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
  
 
    <div class="mb-3 mb-md-4">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
  
    <button type="submit" class="btn btn-primary Continue_Button">Continue</button>
</form>

                <!-- <div class="mt-3 mt-md-4 small">
                    <p class="text-secondary mb-2">
                        By continuing, I accept TCP - 
                        <a href="#" class="text-white text-decoration-underline">Terms</a> & 
                        <a href="#" class="text-white text-decoration-underline">Privacy</a>
                    </p>
                    <p class="text-secondary mb-0">
                        Protected by reCAPTCHA - 
                        <a href="#" class="text-white text-decoration-underline">Google Privacy</a> & 
                        <a href="#" class="text-white text-decoration-underline">Terms</a>
                    </p>
                </div> -->
            </hr>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>