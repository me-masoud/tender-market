<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور های شما</title>
</head>
<body>
    <div>
        @if(!empty($invoices))
            <ul>
                @foreach($invoices as $invoice)
                <li><a href="{{route('invoice',['id'=>$invoice->id])}}">{{$invoice->id}} - status : {{$invoice->status}}</a></li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
