@extends('layouts.app')

@section('content')
<script>
    var user = {!! json_encode(auth()->user()) !!};
    
</script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card product-page-card">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="slider">
                            <div class="slider-for">
                                @foreach ($product->Images()->get() as $img)
                                    <div><img src="{{$img->image_location}}" alt="" class="img-fluid"></div>
                                @endforeach
                            </div>
                            <div class="slider-nav">
                                @foreach ($product->Images()->get() as $img)
                                    <div><img src="{{$img->image_location}}" alt="" class="img-fluid"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="card-body">
                            <h3 class="font-weight-bold">{{$product->product_title}}</h3>
                        <span><Strong>By:</Strong> <a href="/store/{{$product->store()->first()->id}}">{{$product->store()->first()->storename}}</a></span>
                            <div class="d-flex specs">
                                <div class="spec-label d-flex flex-column">
                                    <span>Price :</span>
                                    <span>Category :</span>
                                    <span>Type :</span>
                                </div>
                                <div class="spec-data d-flex flex-column">
                                        <span>{{$product->product_price_presale}}</span>
                                        <span>{{$product->category()->first()->category_name}}</span>
                                        <span>{{$product->type()->first()->type_name}}</span>
                                </div>
                            </div>
                            
                            <div class="description">
                                    <span class="label">Where to Buy :</span>
                                    <p>{{$product->adresses()->first()->block_no}}
                                        {{$product->adresses()->first()->street}},
                                        {{$product->adresses()->first()->city()->first()->city_name}},
                                        {{$product->adresses()->first()->governorate()->first()->governorate_name}}. <br>
                                        Store Name: {{$product->store()->first()->storename}} <br> 
                                        Store Phone Number: {{$product->store()->first()->phone_no}} </p>
                            </div>
                            <div class="social">                                
                        @if(Auth::check())
                                        @php
                                            $like = false;
                                        @endphp
                                @foreach (auth()->user()->likes()->get() as $like)
                                    @if($like->product_id == $product->id)
                                        @php
                                            $like = true;
                                        @endphp
                                    @else
                                        @php
                                            $like = false;
                                        @endphp
                                    @endif
                                @endforeach
                                @if(!$like)
                                    <a class="btn btn-lg btn-primary mb-3" id="Like-btn" data-url="/product/{{$product->id}}/likes">
                                        <i class="fas fa-thumbs-up"></i>
                                        Like 
                                        <span class="likes_counter">{{$product->likes()->count()}}</span>
                                    </a>
                                    <a class="btn btn-lg btn-danger mb-3" id="dislike-btn" data-url="/product/{{$product->id}}/dislike" style="display:none;">
                                        <i class="fas fa-thumbs-down"></i>
                                        Dislike 
                                        <span class="likes_counter">{{$product->likes()->count()}}</span>
                                    </a>
                                @else
                                <a class="btn btn-lg btn-danger mb-3" id="dislike-btn" data-url="/product/{{$product->id}}/dislike">
                                    <i class="fas fa-thumbs-down"></i>
                                    Dislike 
                                    <span class="likes_counter">{{$product->likes()->count()}}</span>
                                </a>
                                <a class="btn btn-lg btn-primary mb-3" id="Like-btn" data-url="/product/{{$product->id}}/likes" style="display:none;">
                                    <i class="fas fa-thumbs-up"></i>
                                    Like 
                                    <span class="likes_counter">{{$product->likes()->count()}}</span>
                                </a>
                                @endif
                        @else
                        <a class="btn btn-lg btn-primary mb-3" data-toggle="modal" data-target="#LoginModal">
                            <i class="fas fa-thumbs-up"></i>
                                 Like 
                            <span class="likes_counter">{{$product->likes()->count()}}</span>
                        </a>
                        @endif  
                        <div class="sharethis-inline-share-buttons">
                            
                        </div>
                        {{-- <a class="btn btn-lg btn-success">
                        Share
                        {{$product->shares()->count()}}
                        </a>                                   --}}
                        <div id="alert" class="alert alert-success alert-dismissible fade show mt-3" style="display:none;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                                <div id="alert-dislike" class="alert alert-danger alert-dismissible fade show mt-3" style="display:none;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                            </div>
                    </div>
                    
                </div>
                <div class="card-body">
                <div class="description col-12">
                                    <span class="label">Description :</span>
                                        <p>{{$product->product_description}}</p>
                            </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-12">
                <div class="card recommended">
                    <div class="card-body">
                        <h3>Recommended</h3>
                    <div class="row">
                        @foreach ($product->Recommend() as $recommended)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card product-card">
                                 <img src="https://via.placeholder.com/350x350" alt="" class="img-fluid">
                                 <div class="card-body">
                                     <h5 >{{$recommended->product_title}}</h5>
                                     <div class="d-flex justify-content-between">
                                         <h4 class="blue">{{$recommended->product_price_postsale}}</h4>
                                         <h5><del>{{$recommended->product_price_presale}}</del></h5>
                                     </div>
                                     <a href="/product/{{$recommended->id}}" class="btn btn-primary col-12">View Product</a>
                                 </div>
                             </div>
                         </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="comments row">
                <h3 class="col-12 "> <i class="fas fa-comments"></i> ({{$product->comments()->count()}})Comments</h3>
                <div class="col-12 mt-3">
                    {{ csrf_field() }}
                    <textarea rows="3" name="comment-body" class="form-control" style="resize: none;" placeholder="Comment Here"></textarea>
                    @if(Auth::check())
                    <button id="comment-btn" data-url="/product/{{$product->id}}/comments" class="btn btn-primary btn-lg ml-auto col-12 col-md-6 col-lg-3 comment-btn">Comment</button>
                    @else
                    <button id="comment-btn" data-toggle="modal" data-target="#LoginModal" class="btn btn-primary btn-lg ml-auto col-12 col-md-6 col-lg-3 comment-btn">Comment</button>
                    @endif
                </div>
                <div class="comments-card col-12 no-gutters">
                    @foreach ($product->comments as $comment)
                        <div class="col-12">
                            <div class="card comment">
                                <div class="card-body">
                                    <div class="info">
                                    <span class="username"><i class="fas fa-comment dark-blue mr-2"> </i>{{$comment->user->name}}</span>
                                    <span class="date blue">{{$comment->created_at->diffForHumans()}}</span>
                                    </div>
                                    <p>{{$comment->comment_body}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
