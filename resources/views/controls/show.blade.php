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

                    <!-- <a href="{{ route('controls.hapus') }}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Delete</a> -->
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Articles</center></th>
                                <th><center>Dirty Linen Given</center></th>
                                <th><center>Clean Linen Received</center></th>
                                <th><center>Description</center></th>
                                <th><center>Action</center></th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($control_details as $e=>$data)
                            <tr>                              
                                <td><center>{{$e+1}} </center></td>
                                <td><center>{{ $data->articles }}</center></td>
                                <td><center>{{ $data->dirty }}</center></td>
                                <td><center>{{ $data->clean }}</center></td>
                                <td><center>{{ $data->description }}</center></td>
                                <td>
                                    <center><div style="width:85px">                           
                                         <a href="{{ url('controls/edit'.$data->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                        <button href="{{ url('controls/delete'.$data->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div></center>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
