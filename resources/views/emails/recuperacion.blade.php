<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recuperación de contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        h1 {
            color: #e91e63; /* Color principal rosa */
            margin-top: 0;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 24px;
            text-align: center;
        }
        
        p {
            margin-bottom: 20px;
            color: #555;
        }
        
        .btn {
            display: block;
            background-color: #e91e63; /* Color principal rosa */
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            border-radius: 4px;
            text-align: center;
            font-weight: 500;
            margin: 30px 0;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #d81b60; /* Rosa más oscuro al pasar el cursor */
        }
        
        .small-text {
            font-size: 14px;
            color: #777;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #e91e63;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">BOMU-SHOP</div>
        </div>
        
        <h1>Recuperar contraseña</h1>
        
        <p>Has solicitado restablecer tu contraseña. Haz clic en el siguiente botón para continuar:</p>
        
        <a href="{{ $resetUrl }}" class="btn">Restablecer mi contraseña</a>
        
        <p class="small-text">Este enlace expirará en 60 minutos.</p>
        <p class="small-text">Si no solicitaste este restablecimiento, ignora este correo.</p>
        <p class="small-text">Estamos comprometidos contigo y tu seguridad. Por favor asegurate de que haz sido tu quién solicitó el cambio de contraseña</p>
        <p class="small-text">Porque el que más nos importa eres tú</p>

    </div>
</body>
</html>