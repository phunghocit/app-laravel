@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
         {{-- <section class="content"> --}}
            {{-- {{dd($productCategory)}} --}}
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Update Product Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="{{route('admin.product_category.update',['id' => $productCategory[0]->id])}}" role="form">
                    @csrf
                    <div class="card-body">
                      <input name="id" type="hidden"  value="{{$productCategory[0]->id}}" type="text" class="form-control" id="slug" placeholder="Slug">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" value="{{$productCategory[0]->name}}" class="form-control" id="name" placeholder="Name">
                      </div>
                      <div>
                        @error('name')
                            <span style="color: red" >{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input name="slug"  value="{{$productCategory[0]->slug}}" type="text" class="form-control" id="slug" placeholder="Slug">
                      </div>

                      <div class="form-group">
                        <label for="status">Status</label>
                        {{-- <input name="status" type="text" class="form-control" id="exampleInputPassword1" placeholder="---Please select---"> --}}
                        <select name="status" id="status"  placeholder="---Please select---">
                            <option value="">---Please select---</option>
                            <option {{!$productCategory[0]->status ? "selected" : ''}} value="0">hide</option>
                            <option {{$productCategory[0]->status ? "selected" : ''}} value="1">Show</option>
                        </select> 
                    </div>
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
    @section('js-custom')
        <script type="text/javascript">
        $(document).ready(function(){
            $('#name').on('keyup',function(){
                let name = $(this).val();
                $.ajax({
                  method: 'POST',
                  url:"{{ route('admin.product_category.slug') }}",
                  data:{
                    name:name,
                    _token:"{{csrf_token()}}"
                  },
                  success:function(res){
                    $('#slug').val(res.slug);
                  },
                  error:function(res){

                  }
                });

            })
        });
        </script>
    @endsection
