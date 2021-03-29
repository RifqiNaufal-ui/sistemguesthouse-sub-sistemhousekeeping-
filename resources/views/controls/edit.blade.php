@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                  <a href="{{ url('controls') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                    
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
               
                <form role="form" method="post" action="{{ url('controls/edit'.$data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1" required="">Articles</label>
                      <select name="articles" class="form-control" value="{{ $data->articles }}">
                        <option value="{{ $data->articles }}">{{ $data->articles }}</option>
                        <option>-- Select Articles --</option>
                        <option value="Bed Cover (Dbl)">Bed Cover (Dbl)</option>
                        <option value="Bed Cover (Sgl)">Bed Cover (Sgl)</option>
                        <option value="Bed Pad (Dbl)">Bed Pad (Dbl)</option>
                        <option value="Bed Pad (Sgl)">Bed Pad (Sgl)</option>
                        <option value="Sheets (Dbl)">Sheets (Dbl)</option>
                        <option value="Sheets (Sgl)">Sheets (Sgl)</option>
                        <option value="Blankets (Dbl)">Blankets (Dbl)</option>
                        <option value="Blankets (Sgl)">Blankets (Sgl)</option>
                        <option value="Pillow Case">Pillow Case</option>
                        <option value="Bath Towel">Bath Towel</option>
                        <option value="Hand Towel">Hand Towel</option>
                        <option value="Face Towel">Face Towel</option>
                      </select>                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Dirty Linen Given</label>
                      <input type="number" name="dirty" class="dirty form-control" id="exampleInputEmail1" placeholder="Dirty Linen Given" required="" value="{{ $data->dirty }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Clean Linen Received</label>
                      <input type="number" name="clean" class="clean form-control" id="exampleInputEmail1" placeholder="Clean Linen Received" required="" value="{{ $data->clean }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                       <select name="description" class="form-control" value="{{ $data->description }}">
                        <option value="{{ $data->description }}">{{ $data->description }}</option>
                        <option>-- Select Description --</option>
                        <option value="Bernoda">Bernoda</option>
                        <option value="Robek">Robek</option>
                        <option value="Hilang">Hilang</option>
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