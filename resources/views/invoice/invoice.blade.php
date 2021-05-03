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
            <span> :شماره فاکتور  {{$invoice->id}}</span>
            <br>
            <ul>
                @foreach($details as $detail)
                    <li>عنوان محصول = {{$detail->product->title}}</li>
                @if(!empty($detail->suggestions->toArray()))
                <ul>
                    @foreach($detail->suggestions as $suggest)
                        @foreach($providers as $provider)
                            @if($provider['id'] == $suggest->provider_id)
                               @php $tamin = $provider->name @endphp
                            @endif
                        @endforeach
                            <li>نام تامین کننده : {!! $tamin !!} <sapn style="color:green"> - قیمت پیشنهادی {{$suggest->price}}</sapn></li>
                    @endforeach
                </ul>
                    @endif
                        @endforeach
            </ul>

        @endif
    </div>
</body>
</html>
