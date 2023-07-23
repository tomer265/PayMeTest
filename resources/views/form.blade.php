<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        width: 30vw;
        background-color: #F0F8FF;
        padding: 3%;
        border: 1px solid black;
        border-radius: 15px;

    }

    h4 {
        min-width: 10vw;
        height: 3vh;
        margin: 0;
    }

    .row {
        display: flex;
        margin-bottom: 15px;
    }

    input{
        height: 3vh;
    }

    #payme_btn{
        background-color: #8A2BE2;
        border: 0;
        box-shadow: none;
        border-radius: 15px;
        color: white;
        height: 3vw;
        width: 7vw;
    }

    #payme_iframe{
        display: block;
        height: 600px;
        width: 600px;
        position: relative;
        z-index: 10;
    }

</style>
<body>
    <form action="/create" method="POST">
        @csrf
        <h2>New Sale creation</h2>
        <div class="row">
            <h4>Product name</h4>
            <input name="name" id="name" />
        </div>
        <div class="row">
            <h4>Price</h4>
            <input name="price" id="price" />
        </div>
        <div class="row">
            <h4>Currency</h4>
            <select name="currency" id="currency">
                <option value="ILS">ILS</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </div>
        <div class="row">
            <button id="payme_btn">PayMe!</button>
        </div>
        <br />
        @if (is_null($code))
            <div></div>
        
        @else{
            @if ($code === 0){
                
                <ifame id="payme_iframe" src="{{$data}}">Browser cannot display iframe</ifame>
            }
            @else {
                <h2>{{$data}}</h2>
            }
            @endif
        }
        @endif
    </form>
</body>
</html>