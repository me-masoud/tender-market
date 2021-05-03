<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور</title>
</head>
<body>
<div>
    @if(!empty($invoice))
        <span> :شماره فاکتور  {{$invoice}}</span>
        <br>
        <ul>
            <form action="{{route('saveSuggestedPrices')}}" method="post">
                @csrf
            @foreach($details as $detail)
                <li>عنوان محصول = {{$detail->product->title}} |
                قیمت پیشنهادی :
                    <input type="text" name="{{$detail->id}}">


                </li>

            @endforeach
                <button type="submit">ذخیره</button>
            </form>
        </ul>

    @endif
</div>
</body>
</html>
