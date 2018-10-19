@extends('layouts.app')

@section('content')



@include('inc.filter-side-nav')



<div class="container">

<a class="btn filter-btn btn-primary d-md-none" onclick="openNav()"><i class="fas fa-filter"></i></a>
    <div class="row">
        @include('inc.filter')
        <div class="col-12 col-md-8 col-lg-9">
            <div class="row">
                    <form action="/results"  method="POST" class="col-12 col-md-8 search-form">
                        {!! csrf_field() !!}
                        <div class="input-group ml-auto ">
                            <input type="text" name="search_word" class="form-control search-bar" placeholder="What are you looking for?">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    </form>

                        <div class="col-12 sort-by">
                            <div>sort by:</div>
                            <span>Most Recent</span>
                            <span><a href="">Price: low to High</a></span>
                            <span><a href="">Price: High to low</a></span>
                        </div>

                        {{-- {{ $search_data }} --}}
                        
                        @foreach($products_results as $product)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                        <h5 class="product-name">{{$product->product_title}}</h5>
                                        @if($product->product_sale == true)
                                     <div class="d-flex justify-content-between">
                                         <h4>{{$product->product_price_postsale}}(EGP)</h4>
                                         <h5><del>{{$product->product_price_presale}}(EGP)</del></h5>
                                        </div>
                                         @else
                                         <div class="d-flex justify-content-between">
                                                <h4>{{$product->product_price_presale}}(EGP)</h4>
                                               </div>

                                         @endif
                                    
                                     <a href="/product/{{$product->id}}" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                        @endforeach 
                    
                    
                        
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