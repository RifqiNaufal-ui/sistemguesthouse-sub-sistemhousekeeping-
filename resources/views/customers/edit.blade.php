@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                  <a href="{{ url('customers') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>

                  <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               
                <form role="form" method="post" action="{{ url('customers/'.$data->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email Address</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{{ $data->email }}" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name" value="{{ $data->name }}" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Phone Number</label>
                      <input type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" value="{{ $data->phone }}" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <textarea class="form-control" name="address" rows="5" required="">{{ $data->address }}</textarea>
                    </div>

                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
