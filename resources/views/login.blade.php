
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/nanis1.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #toast-container {
            min-width: 10%;
            top: 80%;
            right: 50%;
            transform: translateX(50%) translateY(50%);
        }
        .red{
            background-color:#972a7a !important
        }
        .darken-1{
            background-color:#b94f9d !important
        }
        .red.darken-1{
            background-color:#972a7a !important
        }
    
    </style>
    <script type="text/javascript">
     /* var verifyCallback = function(response) {
         console.log(response)
            if(response!=''){
                $('#btnEntrar').prop('disabled', false);
            }else{
                $('#btnEntrar').prop('disabled', true);
            }
        };

        var onloadCallback = function() {
          grecaptcha.render('html_element', {
            'sitekey' : '6LfltVcdAAAAAJQCglht4OV2cnI06mTtc0TAuUu-',
          'callback' : verifyCallback,
          'theme' : 'dark'

          });
        };  */
      </script>
      <style>
        .input-field input:focus + label {
            color: #c62828 !important;
        }
        
        .input-field textarea:focus + label {
            color: #c62828 !important;
        }
        
        .row .input-field input:focus {
            border-bottom: 1px solid #c62828 !important;
            box-shadow: 0 1px 0 0 #c62828 !important
        }
        
        .row .input-field textarea:focus {
            border-bottom: 1px solid #c62828 !important;
            box-shadow: 0 1px 0 0 #c62828 !important
        }
        
        </style>
</head>
<body style="background:   #cccccc  ;">
    <div class="container">
        <div class="row">
            <div class="section"></div>
            <main>
                <form action="{{route('login.store')}}" method="POST">
                    @csrf 
                <center>
                    <div class="container">
                        <div  class="z-depth-2 y-depth-2 x-depth-2 grey green-text lighten-4 row" style="display: inline-block; padding: 20px 18px 0px 18px; border: 1px; margin-top: 100px; solid #EEE; border-radius:10px;">
                            <div class="section left"><img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeeUl9IZDN97pBQNgeunx6dD1df-4g7vkPFw&usqp=CAU" width="50px"/></div>
                            <div class="section left"></div>                
                            <div class="section"><i class="mdi-alert-error red-text"></i></div>               
                            <div class='row left'>
                                <div class='section col s12'>
                                    <b style="color: #006391;font-size:25px;">Bienvenido</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='input-field col s12'>
                                    <input class='validate' type="text" name='username' id='email' required />
                                    <label for='email'>Usuario</label>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='input-field col s12'>
                                    <input class='validate' type='password' name='password' id='password' required />
                                    <label for='password'>Contraseña</label>
                                </div>
                                <label style='float: right;'>
                                    <a><b style="color: #9b0b0b;">¿Olvidaste tu contraseña?</b></a>
                                </label>
                                
                            </div>
                        <br/>
                            <center>
                                <div id="html_element" style="margin: 10px;"></div>
                            </center>                          

                            <center>
                                <div class='row'>
                                    <button id="btnEntrar" class="btn waves-effect waves-light red darken-1 btn-large" type="submit">Entrar<i class="material-icons right">send</i></button>                            
                                </div>
                            </center>                
                        </div>
                    </div>
                </center>
                </form>
            </main>    
        </div>
    </div>

    @if(!empty(session('errorMessageDuration')))
        <script>
            $(document).ready(function(){
                var message = "{{ session('errorMessageDuration') }}";
                M.toast({html: message})
            });
            
        </script>
    @endif
    {{-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer> --}}
</script>

    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script> 
</body>
</html>