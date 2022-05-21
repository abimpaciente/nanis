
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .active
        {
            color:red;
            font-weight: bold;
        }
    </style>
</head>
<body style="background:   #cccccc  ;">
    <div class="container">
        <div class="row">
            <div class="section"></div>
            <main>
                <center>
                    <div class="container">
                        <div  class="z-depth-2 y-depth-2 x-depth-2 grey green-text lighten-4 row" style="display: inline-block; padding: 20px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE; border-radius:10px;">
                            <div class="section"></div>
                            <div class="section"></div>                
                            <div class="section"><i class="mdi-alert-error red-text"></i></div>               
            
                            
                            
                        <br/>
                            <center>
                                <div id="html_element" style="margin: 10px;"></div>
                            </center>                          

                            <center>
                                <div class='row'>
                                    <a class="btn waves-effect waves-light red darken-1 btn-large" href="{{route('dashboard')}}">IR A LOGIN<i class="material-icons right">send</i></a>                            
                                </div>
                            </center>                
                        </div>
                    </div>
                </center>
            </main>    
        </div>
    </div>
    {{-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer> --}}
</script>

    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script> 
</body>
</html>