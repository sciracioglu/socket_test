<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Socket</title>
    </head>
    <body>
        <div class="content" id='app'>
            <h1>Socket Test</h1>
            <ul>
                <li v-for='kullanici in kullanicilar'> @{{ kullanici }}</li>
            </ul>
        </div>

        <script src='js/app.js'></script>
        <script>
            var socket = io('http://redis.test:3000');
            var vue = new Vue({
                el:'#app',
                data:{
                    kullanicilar:[],
                },
                mounted(){
                    var self = this;
                    socket.on('deneme:App\\Events\\UserSignUp',function(data){
                        self.kullanicilar.push(data.username);
                    })
                },
            })
        </script>
    </body>
</html>
