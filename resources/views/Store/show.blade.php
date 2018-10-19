@extends('layouts.app')

@section('content')

<script>

    /* Open the sidenav */
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</script>

<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="card">
                
                <div class="card-body">
                        <h3>Categories</h3>
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          Default checkbox
                        </label>
                      </div>
                      <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Default checkbox
                            </label>
                          </div>
                </div>
        </div>
        <div class="card ">
               
        <div class="card-body">
                <h3>Types</h3>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Default checkbox
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Default checkbox
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Default checkbox
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Default checkbox
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Default checkbox
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Default checkbox
            </label>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Price</h3>
                <form>
                        <div class="row">
                          <div class="col">
                              <label for="">From</label>
                            <input type="number" class="form-control" placeholder="0">
                          </div>
                          <div class="col">
                                <label for="">To</label>
                            <input type="number" class="form-control" placeholder="600">
                          </div>
                        </div>
                      </form>
                      <button class="btn btn-priamry filter-apply col-12">apply</button>
            </div>
            
        </div>
        
      </div>

<div class="container">

<a class="btn filter-btn d-md-none" onclick="openNav()"><i class="fas fa-filter"></i></a>
    <div class="row">

        <div class="col-md-4 col-lg-3 d-none d-md-block">
            <div class="card filter-card">
                
                    <div class="card-body">
                            <h3>Categories</h3>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Default checkbox
                            </label>
                          </div>
                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Default checkbox
                                </label>
                              </div>
                    </div>
            </div>
            <div class="card filter-card">
                   
            <div class="card-body">
                    <h3>Types</h3>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                </div>
                </div>
            </div>

            <div class="card filter-card">
                <div class="card-body">
                    <h3>Price</h3>
                    <form>
                            <div class="row">
                              <div class="col">
                                  <label for="">From</label>
                                <input type="number" class="form-control" placeholder="0">
                              </div>
                              <div class="col">
                                    <label for="">To</label>
                                <input type="number" class="form-control" placeholder="600">
                              </div>
                            </div>
                          </form>
                </div>
            </div>
            <button class="btn btn-priamry filter-apply col-12 shadow">apply</button>
        </div>
        <div class="col-12 col-md-8 col-lg-9">
            <div class="row">
                    <div class="col-12 storepage">
                        <h1>Madena Store</h1>
                    </div>
                    <form action="" class="col-12 search-form">
                            <div class="input-group ml-auto ">
                                <input type="text" class="form-control search-bar storepage-search" placeholder="Search in Madena Store">
                            <div class="input-group-append">
                                <button class="btn"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >Lorem Ipsum is simply dummy text of the printing...</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4>300(EGP)</h4>
                                         <h5><del>450(EGP)</del></h5>
                                     </div>
                                     <a href="" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >Lorem Ipsum is simply dummy text of the printing...</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4>300(EGP)</h4>
                                         <h5><del>450(EGP)</del></h5>
                                     </div>
                                     <a href="" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >Lorem Ipsum is simply dummy text of the printing...</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4>300(EGP)</h4>
                                         <h5><del>450(EGP)</del></h5>
                                     </div>
                                     <a href="" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >Lorem Ipsum is simply dummy text of the printing...</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4>300(EGP)</h4>
                                         <h5><del>450(EGP)</del></h5>
                                     </div>
                                     <a href="" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >Lorem Ipsum is simply dummy text of the printing...</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4>300(EGP)</h4>
                                         <h5><del>450(EGP)</del></h5>
                                     </div>
                                     <a href="" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >Lorem Ipsum is simply dummy text of the printing...</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4>300(EGP)</h4>
                                         <h5><del>450(EGP)</del></h5>
                                     </div>
                                     <a href="" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                            
                         </div>
                        
            </div>
            <nav aria-label="Page navigation example" class="navigation">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
        </div>
        
    </div>

</div>
@endsection