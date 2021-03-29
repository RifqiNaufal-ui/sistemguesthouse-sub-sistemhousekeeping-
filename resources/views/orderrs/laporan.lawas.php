<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        *{
            font-family: Arial, sans-serif;
        }

        .center{
            text-align: center;
        }

        .right{
            text-align: right;
        }

        .left{
            text-align: left;
        }

        p{
            font-size: 10px;
        }

        .top-min{
            margin-top: -10px;
        }

        .uppercase{
            text-transform: uppercase;
        }

        .bold{
            font-weight: bold;
        }

        .d-block{
            display: block;
        }

        hr{
            border: 0;
            border-top: 1px solid #000;
        }

        .hr-dash{
            border-style: dashed none none none;
        }

        table{
            font-size: 10px;
        }

        table thead tr td{
            padding: 5px;
        }

        .w-100{
            width: 100%;
        }

        .line{
            border: 0;
            border-top: 1px solid #000;
            border-style: dashed none none none;
        }

        .body{
            margin-top: -10px;
        }

        .b-p{
            font-size: 12px !important;
        }

        .w-long{
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="uppercase bold d-block center b-p">Tagihan | Mini Bar</p>
        <p class="top-min d-block center">Perum Puri Cempaka Putih 1 Tlogowaru Arjowinangun Kedungkandang Malang</p>
        <p class="top-min d-block center">0341-754301</p>
        <hr class="hr-dash">
        <table class="w-100">
            @foreach($orderr as $data)
            <tr>
                <td class="left">Name Customer : </td>
                <td class="left">{{ $data->name }}</td>
                <td class="right">Kasir : </td>
                <td class="right"> {{\Auth::user()->name}}</td>
            </tr>
            <tr>
                <td></td>
                <td class="left" colspan="3">{{ date('d M, Y', strtotime($data->date)) }}</td>
            </tr>
            @endforeach
        </table>
        <hr class="hr-dash">
    </div>
    <div class="body">
        <table class="w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Disount</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td colspan="6" class="line"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($orderrdetails as $data)
                <tr>
                    <td><center>{{ $loop->iteration }}</center></td>
                    <td><center>{{ $data->product_id }}</center></td>
                    <td><center>{{ $data->quantity }}</center></td>
                    <td><center>{{ $data->unitprice }}</center></td>
                    <td><center>{{ $data->discount }}</center></td>
                    <td><center>{{ $data->amount }}</center></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr class="hr-dash">
        <table class="w-100">
            @foreach($orderr as $data)
            <tr>
                <td class="left">Total</td>
                <td class="right">Rp. {{ number_format ( $data->total,0) }}</td>
            </tr>
        </table>
        <hr class="hr-dash">
        <table class="w-100">
            <tr>
                <td class="left">Payment</td>
                <td class="right">Rp. {{ number_format ( $data->getmoney,0) }}</td>
            </tr>
            <tr>
                <td class="left">Change</td>
                <td class="right">Rp. {{ number_format ( $data->backmoney,0) }}</td>
            </tr>
            @endforeach
        </table>
        <hr class="hr-dash">
    </div>
    <div class="footer">
        <p class="center">Terima Kasih Telah Berkunjung</p>
    </div>
    <script type="text/javascript">
            window.print();
        </script>
</body>
</html>