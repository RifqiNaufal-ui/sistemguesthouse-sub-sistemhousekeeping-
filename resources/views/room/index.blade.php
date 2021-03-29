@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('room/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Add Data</a>
                    
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ route('room.laporan') }}" target="_blank" class="btn btn-sm btn-flat btn-success btn-laporan"><i class="fa fa-print"></i> Print All Data</a>
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Room Type</center></th>
                                <th><center>Room Number</center></th>
                                <th><center>Price</center></th>
                                <th><center>Code</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td><center>{{ $e+1 }}</center></td>
                                <td><center>{{ $dt->roomType }}</center></td>
                                <td><center>{{ $dt->numberRoom }}</center></td>
                                <td><center>Rp. {{ number_format ($dt->price,0) }}</center></td>
                                <td><center>{{ $dt->code }}</center></td>
                                <td>
                                    <center><div style="width:75px">
                                        <a href="{{ url('room/'.$dt->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a> 

                                        <button href="{{ url('room/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div></center>
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