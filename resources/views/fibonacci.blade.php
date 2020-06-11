<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<style>
    .content{
        display: flex;
    }
    .fibonacci-form{

    }
    body {
        font: normal 18px/1.5 "Fira Sans", "Helvetica Neue", sans-serif;
        background: #02223d;
        color: #9f9f9f;
        padding: 50px 0;
    }

    .container {
        width: 80%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .container * {
        box-sizing: border-box;
    }

    .flex-outer{
        list-style-type: none;
        padding: 0;
    }

    .flex-outer {
        max-width: 800px;
        margin: 0 auto;
    }

    .flex-outer li{
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .flex-outer > li:not(:last-child) {
        margin-bottom: 20px;
    }

    .flex-outer li label{
        padding: 8px;
        font-weight: 300;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .flex-outer > li > label{
        flex: 1 0 120px;
        max-width: 220px;
    }

    .flex-outer > li > label + *{
        flex: 1 0 220px;
    }

    .flex-outer li input:not([type='checkbox']){
        padding: 15px;
        border: none;
    }

    .flex-outer li button {
        margin-left: auto;
        padding: 8px 16px;
        border: none;
        background: #00B4B9;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: .09em;
    }

    .flex-inner li {
        width: 100px;
    }
</style>
<body>
    <div class="container">
        <form class="fibonacci-form">
            <ul class="flex-outer">
                <li>
                    <label for="from">From</label>
                    <input type="number" name="from" id="from" required>
                </li>
                <li>
                    <label for="to">To</label>
                    <input type="number" name="to" id="to" required>
                </li>
                <li>
                    <button type="submit">Submit</button>
                </li>
            </ul>
        </form>
        <div class="fibonacci-list">

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            let form = document.querySelector('.fibonacci-form');
            form.addEventListener('submit',function(e){
               e.preventDefault();
                if(cleanRequest()){
                    let from = document.getElementById("from").value;
                    let to = document.getElementById("to").value;
                    // console.log(form);
                    alert(getFibonacciSegment(from,to))
                }
            });
            function cleanRequest() {
                result = true;
                document.querySelectorAll('.fibonacci-form input').forEach(function(elem){
                    if(0 > elem.value){
                        result = false;
                        alert('Число '+elem.getAttribute('name')+' должно быть больше 0');
                    }
                    if(elem.id == 'to' && parseInt(elem.value) < parseInt(document.getElementById('from').value)){
                        result = false;
                        alert('Число to должно быть больше или равно числу from');
                    }
                });
                return result;
            }

            function getFibonacciSegment(from,to) {
                n = 0;
                result = [];
                do{
                    value = fibonacci(n);
                    if(value > from && value < to){
                        result.push(value);
                    }
                    n++
                }while (value < to)
                return result;
            }

            function fibonacci(n) {
                let a = 1;
                let b = 1;
                for (let i = 3; i <= n; i++) {
                    let c = a + b;
                    a = b;
                    b = c;
                }
                return b;
            }
        });
    </script>
</body>
</html>
