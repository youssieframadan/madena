

{{-- login Modal --}}
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Log In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/login" method="POST" id="login-form">
        <div class="modal-body">
            <div class="alert alert-danger" style="display:none"></div>
         
            {{ csrf_field() }}
              <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" autocomplete="email">
              </div>
              <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" autocomplete="current-password">
              </div>
              <div class="d-flex justify-content-between align-items-middle">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                      <label class="form-check-label" for="remember">
                          Remmember Me 
                      </label>
                </div>
                <div>
                  <small><a href="">Forgot Password?</a></small>
                </div>
              </div>
         

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Log In</button>
        </div>
      </form>
      </div>
    </div>
  </div>


  {{-- SignUp Modal --}}


<div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Sign Up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/register" method="POST">
            <div class="modal-body">
              {{ csrf_field() }}
                  <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                        <label for="signup_email">Email</label>
                        <input type="email" name="email" class="form-control" id="signup_email" autocomplete="email">
                  </div>
                  <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control" id="age">
                  </div>
                  <div class="form-group">
                        <label for="phone_no">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_no">
                  </div>
                  <div class="form-group">
                        <label for="signup_password">Password</label>
                        <input type="password" name="password" class="form-control" id="signup_password" autocomplete="current-password">
                  </div>
                  <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="maleradio" value="male">
                        <label class="form-check-label" for="maleradio">male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="femaleradio" value="female">
                        <label class="form-check-label" for="femaleradio">female</label>
                    </div>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="signupagreement" name="show_no">
                      <label class="form-check-label" for="defaultCheck1">
                          Agree On our <a href="">Termsofuse</a> and <a href="">Privacy Policiy</a>
                      </label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
          </form>
          </div>
        </div>
      </div>