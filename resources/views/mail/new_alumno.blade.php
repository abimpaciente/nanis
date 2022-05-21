<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        h1{
            color:red;
        }
    </style>
</head>
<body>
    <div style="width:100%;text-align:center;">
        <div style="margin-top:50px;margin-left:50px;margin-right:50px;">
            <div >
                <img src="https://cuzzi-app.com.mx/img/logo.png" width="200px">
            </div>
            <div >
                <h3 style="font-family: Arial, Helvetica, sans-serif;">Bienvenido a <font style="color:lightblue;">Aula Virtual</font>!</h3><br/>
                    <h1><strong>{{$details['saludo']}}</strong></h1>

                    <p>{{$details['message']}}</p>
        
                    Verifica tu correo electrónico ya que sin esto no podemos proceder a darte la autorización.
        
                </font>
                <br/>
                <div style="margin-top:35px;">
                    <a style="background:black;color:white;padding:25px;border-radius:5px;text-decoration: none;font-family: Arial, Helvetica, sans-serif;" >Verificar Correo</a>
                </div>
            </div>
        </div>
        <div style="margin-top:35px;margin-bottom:25px;width:auto;height:1px;background:lightgray;"></div>
        <div style="margin-top:30px;margin-left:50px;margin-right:50px;">
            <div style="margin-top:25px;font-family: Arial, Helvetica, sans-serif;">
                <font style="color:gray;">Si tiene alguna pregunta, responda este correo electrónico o contáctenos en</font> <br/><a href="mailto:admin@cuzzi-app.com.mx?Subject=Support" target="_top" style="color:black;text-decoration: none;">soporte@cuzzi-app.com.mx</a> 
            </div>
        </div>
        </div>   
    
</body>
</html>