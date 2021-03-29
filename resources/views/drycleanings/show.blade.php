@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <a href="{{ url('drycleanings') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>

                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                   <!-- <a href="{{ route('drycleanings.hapus') }}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-o"></i> Delete</a> -->
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Package Name</center></th>
                                <th><center>Quantity</center></th>
                                <th><center>Price</center></th>
                                <th><center>Amount</center></th>
                                <th><center>Updated_at</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($drycleaning_details as $data)
                                <tr>
                                    <td><center>{{ $loop->iteration }}</center></td>
                                    <td><center>{{ $data->package->name }}</center></td>
                                    <td><center>{{ $data->quantity }}</center></td>
                                    <td><center>{{ $data->unitprice }}</center></td>
                                    <td><center>{{ $data->amount }}</center></td>
                                    <td><center>{{ date('d F Y / H:i:s',strtotime($data->updated_at)) }}</center></td>
                                    <td><center><button href="{{ url('drycleanings/delete'.$data->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button></center></td>
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
