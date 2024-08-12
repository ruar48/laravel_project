<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .gradient-custom-3 {
            background: #84fab0;

            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
            }
            .gradient-custom-4 {
            background: #84fab0;

            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
            }
    </style>
  </head>
  <body>


    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-80">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <form method="post" action="{{ route('register') }}">
                @csrf
                <div data-mdb-input-init class="form-outline mb-1">
                    <input type="text" id="fullName" class="form-control form-control-lg" name="full_name" />
                    <label class="form-label" for="full_name">Full Name</label>
                    @error('full_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            
                <div data-mdb-input-init class="form-outline mb-1">
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="number" />
                    <label class="form-label" for="form3Example1cg">Your Number</label>
                    @error('number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            
                <div data-mdb-input-init class="form-outline mb-1">
                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email"/>
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            
                <div data-mdb-input-init class="form-outline mb-1">
                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            
        
            
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                <div class="d-flex justify-content-end">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>
            
                {{-- <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p> --}}
            </form>
            

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>