@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-md-flex d-block  justify-content-between align-items-center margin-top-dashboard">
        <h1 >Dashboard</h1>
        <a data-toggle="modal" data-target="#AddproductModal" class="btn btn-primary btn-lg">Add new product</a>
        @include('inc.AddproductModal')
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-custom  fade in alert-dismissable show">
        {!! $message !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>




    <?php Session::forget('success');?>
    @endif     
    <div class="row">
        <div class="col-6 col-md-3">
                <div class="card bg-pink dashboard-card">
                        <div class="card-body">
                            <div>
                                <i class="fas fa-comments"></i>
                                <span>Comments</span>
                            </div>
                                <span>{{$store->comments()}}</span>
                        </div>
                    </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-green dashboard-card">
                <div class="card-body">
                    <div>
                        <i class="fas fa-share-alt"></i>
                        <span>Shares</span>
                    </div>
                        <span>{{$store->shares()}}</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-blue dashboard-card">
                    <div class="card-body">
                        <div>
                            <i class="fas fa-thumbs-up"></i>
                            <span>Likes</span>
                        </div>
                            <span>{{$store->likes()}}</span>
                    </div>
                </div>
        </div>
        <div class="col-6 col-md-3">
                <div class="card bg-dark-blue dashboard-card">
                        <div class="card-body">
                            <div>
                                <i class="fas fa-eye"></i>  
                                <span>views</span>
                            </div>
                                <span>{{$store->views()}}</span>
                        </div>
                    </div>
        </div>
        
        
                <h1 class="col-12" >Products</h1>

                

                    <form action="" class="col-12 col-md-12 search-form">
                            <div class="input-group ml-auto">
                                <input type="text" class="form-control search-bar col-12 col-md-8" placeholder="What are you looking for?">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    
                    @if(count($store->products) != 0)
                    @foreach ($store->products as $product)
                    <div class="col-12 col-md-6 col-lg-4">
                            <div class="card dashboard-product">
                                    <img src="{{$product->images()->first()->image_location}}" alt="" class="img-fluid">
                                    <div class="card-body">
                                            <h5 >{{$product->product_title}}</h5>
                                            <div class="d-flex justify-content-between">
                                                    <div>
                                                            <i class="fas fa-comments pink"></i>
                                                            <span>{{$product->comments()->count()}}</span>
                                                    </div>
                                                    <div>
                                                            <i class="fas fa-share-alt green"></i>
                                                            <span>{{$product->shares()->count()}}</span>
                                                    </div>
                                                    <div>
                                                            <i class="fas fa-thumbs-up blue"></i>
                                                            <span>{{$product->likes()->count()}}</span>
                                                    </div>
                                                    <div>
                                                            <i class="fas fa-eye dark-blue"></i>  
                                                            <span>{{$product->views()->count()}}</span>
                                                    </div>
                                            </div>
        
                                            <div class="from-group">
                                                <select id="" class="form-control">
                                                    <option value="">Available</option>
                                                    <option value="">Not Available</option>
                                                    <option value="">Limited</option>
                                                </select>
                                            </div>
        
                                            <div class="row">
                                            <div class="col-6">
            <a data-toggle="modal" data-target="#Edit-product-modal" data-id="{{$product->id}}"  class="btn btn-primary col-12" class="edit-btn">Edit</a>
                                            </div>
                                            <div class="col-6">
<a href="" class="btn btn-danger col-12 remove-record"  data-toggle="modal" data-url="/product/{{$product->id}}/delete" data-id="{{$product->id}}" data-target="#custom-width-modal" >Delete</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                    @endforeach
                @else
                        <h3 class="col-12 mt-5 text-center">No Products Found</h3>
                @endif
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


<form action="" method="POST" class="remove-record-model">
        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                            <h4 class="modal-title" id="custom-width-modalLabel">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        
                    </div>
                    <div class="modal-body">
                        <h4>Are You Sure You Want to Delete This Product?</h4>
                    </div>
                    <div class="modal-footer">
                            @csrf
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="Edit-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Update Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" id="edit-form" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                        <div class="form-group">
                                <label for="product_title">Product Title</label>
                                <input type="text" name="product_title" class="form-control" id="product_title">
                          </div>
                          <div class="form-group">
                              <label for="Category">Product Category</label>
                              <select name="category_id" id="Category" class="form-control">
                                    <option value="1">Women's Wear</option>
                                    <option value="2">Men's Wear</option>
                                    <option value="3">Child's Wear</option>
                                    <option value="4">Accessories</option>
                               </select>
                          </div>
                          <div class="form-group">
                                <label for="Type">Product Type</label>
                                <select name="type_id" id="Type" class="form-control">
                                      <option value="1">T-shirt</option>
                                      <option value="2">Blouse</option>
                                      <option value="3">Skirt</option>
                                      <option value="4">Dress</option>
                                      <option value="5">Jeans</option>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-check form-group">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" name="Product_On_Sale">
                                    <label class="form-check-label" for="defaultCheck3">
                                        Product On Sale
                                    </label>
                            </div>
                            <div class="form-group">
                                    <label for="price_original-edit" id="original-price-label-edit">Price</label>
                                    <input type="number" name="price_original" class="form-control" id="price_original-edit">
                            </div>
                            <div class="form-group" id="price-after-sale-edit">
                                    <label for="price_new-edit">Price After Sale</label>
                                    <input type="number" name="price_new" class="form-control" id="price_new-edit">
                            </div>
                          {{-- <div class="row">
                              <div class="form-group col-6">
                                <label for="file-upload-1" id="custom-upload" class="col-12 custom-upload-class"><i class="fas fa-plus"></i></label>
                                <input type="file" name="product_images[]" id="file-upload-1" class="image-uploader">
                              </div>
                              <div class="form-group col-6">
                                <label for="file-upload-2" id="custom-upload" class="col-12 custom-upload-class"><i class="fas fa-plus"></i></label>
                                <input type="file" name="product_images[]" id="file-upload-2" class="image-uploader">
                              </div>
                              <div class="form-group col-6">
                                <label for="file-upload-3" id="custom-upload" class="col-12 custom-upload-class"><i class="fas fa-plus"></i></label>
                                <input type="file" name="product_images[]" id="file-upload-3" class="image-uploader">
                              </div>
                              <div class="form-group col-6">
                                <label for="file-upload-4" id="custom-upload" class="col-12 custom-upload-class"><i class="fas fa-plus"></i></label>
                                <input type="file" name="product_images[]" id="file-upload-4" class="image-uploader">
                              </div> --}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
              </div>
            </div>
          </div>
          </div>
@endsection