<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قیمت پیشنهادی</title>
</head>
<body>
<div>
<h1>لیست نیاز های داروخانه ها</h1>
    <ul>
    @foreach($invoices as $invoice)
        <li><a href="{{route('invoiceSuggest' , ['id'=> $invoice->id])}}"> فاکتور :{{$invoice->user->name}}</a></li>
    @endforeach
    </ul>
</div>
</body>
</html>
