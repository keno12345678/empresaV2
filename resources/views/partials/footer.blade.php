<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <style>
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000; /* Asegurarse de que el footer esté siempre en la parte superior */
        }
        .footer a {
            color: #000;
            text-decoration: none;
            margin: 0 15px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        body {
            margin-bottom: 60px; /* Añadir espacio en la parte inferior para el footer */
        }
    </style>
</head>
<body>

<div class="footer">
    <p>
        &copy; <?php echo date("Y"); ?> Tu Empresa. Todos los derechos reservados.
    </p>
    <p>
        <a href="index.php">Inicio</a> |
        <a href="{{ route('personas') }}">Empresa</a> |
        <a href="{{ route('contacto') }}">Contacto</a>
    </p>
</div>

</body>
</html>
