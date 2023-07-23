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

</style>
<body>
    <form>
        <h2>New Sale creation</h2>
        <div class="row">
            <h4>Product name</h4>
            <input id="name" />
        </div>
        <div class="row">
            <h4>Price</h4>
            <input id="price" />
        </div>
        <div class="row">
            <h4>Currency</h4>
            <select name="currencies" id="currencies">
                <option id="1">ILS</option>
                <option id="2">USD</option>
                <option id="3">EUR</option>
            </select>
        </div>
        <div class="row">
            <button id="payme_btn">PayMe!</button>
        </div>
    </form>
</body>
</html>