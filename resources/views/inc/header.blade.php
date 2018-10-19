<header>
        <nav class="navbar navbar-expand-lg  navbar-dark top-nav">
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
    <div class="hero-image">
        {{-- <form action="" class="col-12 col-md-8 search-form">
            <div class="input-group ml-auto ">
                <input type="text" class="form-control search-bar" placeholder="What are you looking for?">
            <div class="input-group-append">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </div>
        </form> --}}
        <div class="container">
            <h1 class="display-3 d-none d-md-block font-weight-bold">NO TIME TO WASTE</h1> 
            <h1 class="d-block d-md-none font-weight-bold">NO TIME TO WASTE</h1> 
            <p class="lead slug">We Help you Find the products you want in stores From Around Egypt.</p>    
            <div class="row">
                <div class="col-12 col-md-8 col-lg6">
                    <form action="/results" method="POST" class="container">
                        {{ csrf_field() }}
                        <div class="row">
                            <input type="text" name="search_word" class="header-search-bar col-9" placeholder="What do you want?">
                            <button type="submit" class="col-3 btn btn-search btn-primary">search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
header{
    background-image: url(/images/H1.jpg);
    color: white;
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    /* background-repeat: no-repeat; */
}

.hero-image{
    height: 90vh;
	display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: left;
}
.slug{
    font-size: 25px;
}
.header-search-bar{
    background-color: #fff;
    color: #343a40;
    border-radius: 0;
	height: 60px;
	border:0px;
}
.header-search-bar:focus{
    outline: none;
	box-shadow: 0 0px;
}
.btn-search{
    display: flex;
    justify-content: center;
    align-items: center;
}
@media only screen and (max-width: 600px) {
    .hero-image {
        height: 85vh;
    }
    .slug{
        font-size: 20px;
    }
}
</style>