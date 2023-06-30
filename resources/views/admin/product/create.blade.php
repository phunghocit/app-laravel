@extends('admin/layouts.master')
@section('content')
    <div class="content-wrapper">
        {{-- <section class="content"> --}}
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="{{route('admin.product_category.save')}}" role="form">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Price">
                      </div>
                      <div class="form-group">
                        <label for="discount_price">Discount Price</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Discount Price">
                      </div>
                      <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Short Description">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Shipping</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Shipping">
                      </div>
                      <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Weight">
                      </div>
                      <div class="form-group">
                        <label for="information">Information</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Information">
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slug">
                      </div>
                      <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Qty">
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Status">
                      </div>
                      <div class="form-group">
                        <label for="image_url">Image_url</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div> --}}
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->




    
              </div>
        {{-- </section> --}}
    </div>
@endsection