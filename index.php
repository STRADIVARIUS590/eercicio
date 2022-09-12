<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- https://api.themoviedb.org/3/authentication/token/validate_with_login?api_key=1218b32df060ddecbbee15f7b375f2b0 -->
</head>
<body>
    <h1></h1>
    <div id="contenedor">
        <input type="text" v-model = 'email'>
        <input type="text" v-model = 'password'>
        <button @click='login'>Entrar</button>
    </div>
</body>
<script>
    const { createApp } = Vue
    const app =  createApp({
        data(){
            return {    
             /*    API = 'https://api.themoviedb.org/3/authentication/token/new?api_key=',
                API_KEY = '28c88a739bbf2b35db9a7f618f7cc6d7', */
                email:'joel121',
                password: '1234'
            }
        },
        methods:{
            login(e){
                e.preventDefault();
               // var axios = require('axios');
               // var FormData = require('form-data');
                var data = new FormData();
                data.append('username', this.email);//joel121
                data.append('password', this.password);//1234
                data.append('request_token', '');

                var config = {
                method: 'post',
                url: 'https://api.themoviedb.org/3/authentication/token/validate_with_login?api_key=1218b32df060ddecbbee15f7b375f2b0',
                headers: { 
                    // ...data.getHeaders()
                },
                data : data
                };
                let _email = this.email;
                axios(config)
                .then(function (response) {
                    console.log(response);
                    if(response.data.success){
                        // console.log('asdasd');
                        var temp_user = {
                            email : _email
                        }
                        // console.log(_email);
                        sessionStorage.setItem('user',JSON.stringify( temp_user)    );
                        console.log ('fsdf', sessionStorage.getItem('user'));

            
                      window.location.href = 'data.html';
                    } 
                // console.log(JSON.stringify(response.data));
                }
                )
                .catch(function (error) {
                    alert('Datos incorrectos');
                console.log(error);
                }); 
            }
        }
    }) .mount('#contenedor')
</script>
</html>
