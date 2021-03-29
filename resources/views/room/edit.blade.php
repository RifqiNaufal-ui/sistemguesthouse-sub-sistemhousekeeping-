@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('room') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                    
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
               
                <form role="form" method="post" action="{{ url('room/'.$dt->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                    <label for="exampleInputEmail1">Room Type</label>
                    <select name="roomType" class="form-control" value="{{ $dt->roomType }}" required="">
                        <option >{{ $dt->roomType }}</option>
                        <option>-- Select Room Type --</option>
                        <option value="Standart">Standart</option>
                        <option value="Superior">Superior</option>
                        <option value="Deluxe">Deluxe</option>
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price" value="{{ $dt->price }}" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Code</label>
                       <select name="code" class="form-control" value="{{ $dt->code }}" required="">
                        <option >{{ $dt->code }}</option>
                        <option>-- Select Code --</option>
                        <option value="Occupied Dirty">OD = Occupied Dirty</option>
                        <option value="Occupied Clean">OC = Occupied Clean</option>
                        <option value="Vacant Clean">VC = Vacant Clean</option>
                        <option value="Vacant Dirty">VD = Vacant Dirty</option>
                        <option value="Vacant Ready">VR = Vacant Ready</option>
                        <option value="Out of Order">OO =Out of Order</option>
                      </select>
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