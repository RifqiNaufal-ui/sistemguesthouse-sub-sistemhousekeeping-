@extends('layouts.master')
 
@section('content')

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
</script>
</head>
<body>
 
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
            
            <form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ url('controls/add') }}">   
            
            {{csrf_field()}}            

            <div class="box-body">

            <div class="row">

            <div class="col-md-6">
            <div class="form-group">Guest Name
                <input type="text" name="guest_name" class="form-control" placeholder="Please enter your name" required="">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">Customer Room
                <select class="form-control select2" name="room_id" required="">
                <option>-- Select Room Number --</option>
                @foreach($rooms as $rs)
                <option value="{{ $rs->id }}">{{ $rs->numberRoom }}</option>
                @endforeach
                </select>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">Checked By
                <input type="text" name="checked_by" class="form-control" placeholder="Please enter your checked_by" required="">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">Date
                <input type="date" name="date" class="form-control" placeholder="Please enter your date" required="">
            </div>
            </div>
            </div>

                <div class="form-group row">    
                <table class="table">
                <thead>
                  <tr>
                    <th>Articles</th>
                    <th>Dirty Linen Given</th>
                    <th>Clean Linen Received</th>
                    <th>Description</th>
                    <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <select name="articles[]" class="form-control" required="">
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
                    </td>
                    <td><input type="number" name="dirty[]" class="form-control dirty" required=""></td>
                    <td><input type="number" name="clean[]" class="form-control clean" required=""></td>
                    <td>
                      <select name="description[]" class="form-control" required="">
                        <option>-- Select Description --</option>
                        <option value="Bernoda">Bernoda</option>
                        <option value="Robek">Robek</option>
                        <option value="Hilang">Hilang</option>
                      </select>
                    </td>
                    <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                </tr>
                </tfoot>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('scripts')

<script type="text/javascript">
  $('.addRow').on('click',function()
    {
        addRow();
    });

    function addRow()
    {
        var tr='<tr>'+
        '<td><select name="articles[]" class="form-control" required=""><option>-- Select Articles --</option><option value="Bed Cover (Dbl)">Bed Cover (Dbl)</option><option value="Bed Cover (Sgl)">Bed Cover (Sgl)</option><option value="Bed Pad (Dbl)">Bed Pad (Dbl)</option><option value="Bed Pad (Sgl)">Bed Pad (Sgl)</option><option value="Sheets (Dbl)">Sheets (Dbl)</option><option value="Sheets (Sgl)">Sheets (Sgl)</option><option value="Blankets (Dbl)">Blankets (Dbl)</option><option value="Blankets (Sgl)">Blankets (Sgl)</option><option value="Pillow Case">Pillow Case</option><option value="Bath Towel">Bath Towel</option><option value="Hand Towel">Hand Towel</option><option value="Face Towel">Face Towel</option></select></td>'+
        '<td><input type="number" name="dirty[]" class="form-control dirty" required=""></td>'+
        '<td><input type="number" name="clean[]" class="form-control clean" required=""></td>'+
        '<td><select name="description[]" class="form-control" required=""><option>-- Select Description --</option><option value="Bernoda">Bernoda</option><option value="Robek">Robek</option><option value="Hilang">Hilang</option> </select></td>'+
        '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };
    
   $('tbody').on('click', '.remove', function(){
     var last=$('tbody tr').length;
        if(last==1){
            alert("You Can Not Remove Last Row");
        }
        else{
             $(this).parent().parent().remove();
        }    
    });
</script>
 
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
</body>
</html>
 

@endsection