@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('packages/create') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Add Data</a>
                    
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Package Name</center></th>
								<th><center>Price</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $e=>$package)
                            <tr>
                                <td><center>{{ $e+1 }}</center></td>    
                                <td><center>{!! $package->name !!}</center></td>
								<td><center>Rp. {{ number_format($package->price,0) }}</center></td>
                                <!-- <td><center>{{ date('d F Y H:i:s',strtotime($package->created_at)) }}</center></td>
                                <td><center>{{ date('d F Y H:i:s',strtotime($package->updated_at)) }}</center></td> -->
                                <td>
                                <center><div style="width:75px">                       
								<a href="{{ url('/packages/'.$package->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a> 

								<button href="{{ url('packages/'.$package->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
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