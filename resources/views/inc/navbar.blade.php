<div class="bg-black">
        <div class="container">
                <div class="top-bar d-flex ">
                    <div class="social-icons">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="links ml-auto">
                        <a href="">F.A.Q.'s</a>
                        <a href="">Contact</a>
                        <a href="">عربى</a>
                        <a href="">English</a>
                    </div>
                </div>
        </div>
        </div>
        
        
        @if(Route::getCurrentRoute()->uri() != '/')
                <nav class="navbar navbar-expand-lg  navbar-dark bg-dark-blue top-nav">
                  <div class="container">
                        <a class="navbar-brand mr-auto" href="/">Madena</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            @if(Auth::check())
                              @if(count(auth()->user()->stores) != 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#AddstoreModal">Add Store</a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard/{{auth()->user()->stores()->first()->id}}">Store Dashboard</a>
                                    </li>
                                    @endif
                            @endif
                            @if(!Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">Add Store</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">Log In</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" data-toggle="modal" data-target="#SignupModal">Sign Up</a>
                            </li>
                            @else
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      {{auth()->user()->name}}
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Liked Products</a>
                                    <a class="dropdown-item" href="#">Edit Personal Information</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                  </div>
                                </li>
                            @endif
                          </ul>
                        </div>
                      </div>
                      </nav>
                      @endif