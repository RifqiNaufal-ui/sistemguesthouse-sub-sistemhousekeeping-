@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('/packages') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                    
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="box-body">
               
                <form role="form" method="post" action="{{ url('/packages', $packages->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Package Name" value="{{ $packages->name }}" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price" value="{{ $packages->price }}" required="">
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
 
@endsection