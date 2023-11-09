@extends('templates.admin_login_template')
@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">Login</h3>
  
              <div class="form-outline mb-4">
                <input type="text" name="username" class="form-control form-control-lg" />
                <label class="form-label">Username</label>
              </div>
  
              <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control form-control-lg" />
                <label class="form-label" >Password</label>
              </div>


              <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: rgb(0, 128, 107);"
                name="submit" type="submit"><i class="fab fa-facebook-f me-2"></i>Login</button>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection