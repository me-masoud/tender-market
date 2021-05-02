<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>محصولات</title>
</head>
<body>
<div>
    @if(!empty($products))
        <ul>
        @foreach($products as $product)
            <li>{{$product->title}} - ({{$product->brand->title}})</li>
        @endforeach
        </ul>
        <div>
            {{$products->links()}}
        </div>
    @endif
</div>
</body>
</html>
