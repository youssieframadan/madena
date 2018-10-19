

{{-- Addstore Modal --}}
<div class="modal fade" id="AddstoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Add Store</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/addstore" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="modal-body">
                
                      <div class="form-group">
                            <label for="storename">Store Name</label>
                            <input type="text" name="storename" class="form-control" id="storename">
                      </div>
                      <div class="form-group">
                          <label for="governorate">Governorate</label>
                          <select name="governorate_id" id="governorate" class="form-control">
                                <option value="1">Cairo</option>
                                <option>Giza</option>
                                <option>Demitta</option>
                                <option>Luxor</option>
                                <option>Sinai</option>
                          </select>
                      </div>
                      <div class="form-group">
                            <label for="city">City</label>
                            <select name="city_id" id="city" class="form-control">
                                  <option value="1">Shubra</option>
                                  <option>Helwan</option>
                                  <option>Saida zeinab</option>
                                  <option>Ain Shams</option>
                                  <option>Abbassia</option>
                            </select>
                        </div>
                        
                      <div class="form-group">
                            <label for="street">street</label>
                            <input type="text" name="street" class="form-control" id="street">
                      </div>

                      <div class="form-group">
                            <label for="block_no">Block Number/Name</label>
                            <input type="text" name="block_no" class="form-control" id="block_no">
                      </div>
                      <div class="form-group">
                            <label for="phone_no">Store Phone Number</label>
                            <input type="text" name="phone_no" class="form-control" id="store_phone_no">
                      </div>
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="store_image">
                          <label class="custom-file-label" for="customFile">Storefront Image</label>
                      </div>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="agreementaddstore" name="agreementaddstore">
                        <label class="form-check-label" for="agreementaddstore">
                            Agree On our <a href="">Termsofuse</a> and <a href="">Privacy Policiy</a>
                        </label>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add Store</button>
                </div>
          </form>
          </div>
        </div>
      </div>