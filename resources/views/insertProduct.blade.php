<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Product</title>
</head>
<body>
<div>
    <form action="{{route('insertProduct')}}"  method="post">
        @csrf
        <input type="text" name="name" placeholder="نام محصول را وارد کنید">
        @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
        <select name="brand">
            <option value="brand1">برند 1</option>
            <option value="brand2">برند 2</option>
            <option value="brand3">برند 3</option>
            <option value="brand4">برند 4</option>
        </select>
        @if($errors->has('brand'))
            <div class="error">{{ $errors->first('brand') }}</div>
        @endif
        <input type="submit" value="submit">

    </form>
</div>
</body>
</html>
