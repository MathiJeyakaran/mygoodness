<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{ url('pay') }}" method="post">
    @csrf
    <!-- <input type="hidden" name="business" value="my.goodness.dev@gmail.com">
    <input type="hidden" name="cover-fee" value="0">
    <input type="hidden" name="item_name" value="Donation">
    <input type="hidden" name="amount" value="25.00">
    <input type="hidden" name="currency_code" value="USD">
    <input type='hidden' class="form-control" name='notify_url' value='{{ route("notify") }}'>
    <input type='hidden' class="form-control" name='cancel_return' value='{{ route("error") }}'>
    <input type='hidden' class="form-control" name='return' value='{{ route("success") }}'>
    <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" alt="Donate"><img alt="" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" > -->
        <input type="text" name="amount">
        <button type="submit">Pay</button>
</form>
    
</body>
</html>