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
       <h4>{{ $title ?? '' }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('orderrs/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Add Data</a>

                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-flat btn-danger btn-filter"><i class="fa fa-filter"></i> Print By Date</a> -->

                   <!--  <a href="{{ url('cetak') }}" target="_blank" class="btn btn-sm btn-flat btn-success"><i class="fa fa-print"></i> Print All Data</a> -->
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Date / Time</center></th>
                                <th><center>Customer Name</center></th>
                                <th><center>Customer Room</center></th>
                                <th><center>Department</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($orderr as $key=>$data)
                            <tr>
                                <td><center>{{++$key}}</center></td>
                                <td><center>{{ date('d F Y',strtotime($data->date)) }}</center></td>
                                <td><center>{{$data->name}}</center></td>
                                <td><center>{{$data->room->numberRoom}}</center></td>
                                <td><center>{{$data->department}}</center></td>
                                 <td>
                                    <center><div style="width:105px">
                                        <a href="{{ route('orderrs.detail', $data->id) }}" class="btn btn-warning btn-xs btn-show"><i class="fa fa-eye"></i></a>

                                        <!-- <a href="{{ route('order.edit', $data->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a> -->

                                        <button href="{{ url('orderrs/destroy'.$data->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>

                                        <a href="{{ route('orderrs.laporan', $data->id) }}" target="_blank" class="btn btn-success btn-xs btn-laporan"><i class="fa fa-print"></i></a>                    
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

<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
 
            <form role="form" action="{{ route('orderrs.pertanggal') }}" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Out of Date</label>
                  <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Out of Date" name="dari" id="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Till Date</label>
                  <input type="text" class="form-control datepicker" name="sampai" id="sampai" id="exampleInputPassword1" placeholder="Till Date" autocomplete="off" value="{{ date('Y-m-d') }}">
                </div>
                
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>Submit</button>
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

        $('.btn-filter').click(function(e){
            e.preventDefault();
            
            $('#modal-filter').modal();
        })
 
    })
</script>

@endsection
