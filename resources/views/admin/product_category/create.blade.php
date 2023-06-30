@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
         {{-- <section class="content"> --}}
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Product Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="{{route('admin.product_category.save')}}" role="form">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                      </div>
                      <div>
                        @error('name')
                            <span style="color: red" >{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input name="slug" type="text" class="form-control" id="slug" placeholder="Slug">
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        {{-- <input name="status" type="text" class="form-control" id="exampleInputPassword1" placeholder="---Please select---"> --}}
                        <select name="status" id="status"  placeholder="---Please select---">
                            <option value="">---Please select---</option>
                            <option value="0">hide</option>
                            <option value="1">Show</option>
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
