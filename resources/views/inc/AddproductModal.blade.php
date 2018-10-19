

{{-- Addstore Modal --}}
<div class="modal fade" id="AddproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/addproduct" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="modal-body">
             
                  <div class="form-group">
                        <label for="product_title">Product Title</label>
                        <input type="text" name="product_title" class="form-control" id="product_title">
                  </div>
                  <div class="form-group">
                      <label for="Category">Product Category</label>
                      <select name="category_id" id="Category" data-source="/categories" class="form-control">
                            {{-- <option value="1">Women's Wear</option>
                            <option value="2">Men's Wear</option>
                            <option value="3">Child's Wear</option>
                            <option value="4">Accessories</option> --}}
                       </select>
                  </div>
                  <div class="form-group">
                        <label for="Type">Product Type</label>
                        <select name="type_id" id="Type" class="form-control" data-source="">
                              {{-- <option value="1">T-shirt</option>
                              <option value="2">Blouse</option>
                              <option value="3">Skirt</option>
                              <option value="4">Dress</option>
                              <option value="5">Jeans</option> --}}
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" name="Product_On_Sale">
                            <label class="form-check-label" for="defaultCheck2">
                                Product On Sale
                            </label>
                    </div>
                    <div class="form-group">
                            <label for="price_original" id="original-price-label">Price</label>
                            <input type="number" name="price_original" class="form-control" id="price_original">
                    </div>
                    <div class="form-group" id="price-after-sale">
                            <label for="price_new">Price After Sale</label>
                            <input type="number" name="price_new" class="form-control" id="price_new">
                    </div>
                  <div class="row">
                      <div class="form-group col-3">
                        <label for="file-upload-1" id="custom-upload" class="col-12"><i class="fas fa-plus"></i></label>
                        <input type="file" name="product_images[]" id="file-upload-1" class="image-uploader">
                      </div>
                      <div class="form-group col-3">
                        <label for="file-upload-2" id="custom-upload" class="col-12"><i class="fas fa-plus"></i></label>
                        <input type="file" name="product_images[]" id="file-upload-2" class="image-uploader">
                      </div>
                      <div class="form-group col-3">
                        <label for="file-upload-3" id="custom-upload" class="col-12"><i class="fas fa-plus"></i></label>
                        <input type="file" name="product_images[]" id="file-upload-3" class="image-uploader">
                      </div>
                      <div class="form-group col-3">
                        <label for="file-upload-4" id="custom-upload" class="col-12"><i class="fas fa-plus"></i></label>
                        <input type="file" name="product_images[]" id="file-upload-4" class="image-uploader">
                      </div>
                    <input type="hidden" value="{{$store->id}}" name="store_id">
                    <input type="hidden" value="{{$store->adresses()->first()->id}}" name="adress_id">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
          </form>
          </div>
        </div>
      </div>