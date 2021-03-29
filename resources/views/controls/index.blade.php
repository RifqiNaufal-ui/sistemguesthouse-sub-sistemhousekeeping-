@extends('layouts.master')
 
@section('content')

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
</script>
</head>
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('controls/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Add Data</a>

                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Date / Time</center></th>
                                <th><center>Guest Name</center></th>
                                <th><center>Customer Room</center></th>
                                <th><center>Checked By</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($controls as $e=>$data)
                            <tr>
                                <td><center>{{$e+1}}</center></td>
                                <td><center>{{ date('d F Y',strtotime($data->date)) }}</center></td>
                                <td><center>{{$data->guest_name}}</center></td>
                                <td><center>{{$data->room->numberRoom}}</center></td>
                                <td><center>{{$data->checked_by}}</center></td>
                                 <td>
                                    <center><div style="width:85px">
                                        <a href="{{ route('controls.detail', $data->id) }}" class="btn btn-warning btn-xs btn-show"><i class="fa fa-eye"></i></a>                                       
                                       <button href="{{ url('controls/destroy'.$data->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>

                                      <a href="{{ route('controls.laporan', $data->id) }}" target="_blank" class="btn btn-success btn-xs btn-laporan"><i class="fa fa-print"></i></a>
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
