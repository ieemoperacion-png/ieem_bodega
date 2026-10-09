<?php
// index.php - Pantalla de inicio del Sistema ieem_bodega
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DIRECCION DE ADMINISTRACION</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    
    <style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        align-items: center;      /* Centrado vertical */
        justify-content: center;  /* Centrado horizontal */
        background-color: #f3f3f9; 
    }

    .splash-container {
        width: 100%;
        max-width: 375px;
        padding: 15px;
        margin: 0 auto;
    }

    /* --- ALINEACIÓN CENTRAL Y SEPARACIÓN DE LOS CAMPOS --- */
    .form-control-centered {
        text-align: center;
        width: 100%;             /* Fuerza a ocupar el 100% del contenedor igual que el botón */
        box-sizing: border-box;
    }

    /* Genera el espacio vertical entre el campo Usuario y Contraseña */
    .espacio-campo {
        margin-bottom: 20px;     
    }

    /* --- ANIMACIÓN DE ROTACIÓN PARA EL LOGO --- */
    .logo-rotar {
        animation: rotarLogo 1.5s ease-out forwards;
        transform-origin: center;
    }

    @keyframes rotarLogo {
        from {
            transform: rotate(-360deg) scale(0.3);
            opacity: 0;
        }
        to {
            transform: rotate(0deg) scale(1);
            opacity: 1;
        }
    }

    /* --- DISEÑO EXCLUSIVO BOTÓN AZUL 3D --- */
    .btn-3d-container {
        text-align: center;
        width: 100%;
        padding-top: 5px;
    }

    .btn-blue-3d {
        position: relative;
        display: inline-block;
        width: 100%;
        background: #007bff; 
        color: white;
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 1px;
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        cursor: pointer;
        outline: none;
        box-shadow: 0 6px 0 #0056b3, 0 10px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.1s ease;
    }

    .btn-blue-3d:hover {
        background: #1a88ff;
        color: white;
    }

    .btn-blue-3d:active {
        box-shadow: 0 2px 0 #0056b3, 0 4px 6px rgba(0, 0, 0, 0.2);
        transform: translateY(4px); 
    }

    /* Leyenda de error en rojo */
    .error-mensaje {
        color: #dc3545;
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
        text-align: center;
        display: none;
    }
    </style>
    
    <!-- URL corregida de SweetAlert vía CDN UNPKG para asegurar las ventanas emergentes -->
    <script src="https://unpkg.com"></script>
    
    <script type="text/javascript">
        function validar() {
            var contenedorError = document.getElementById("mensaje-error");
            
            contenedorError.style.display = "none";
            contenedorError.innerHTML = "";

            // Acceso limpio a los campos del formulario usando el DOM estándar
            var txtRfc = document.getElementById("rfc");
            var txtPassword = document.getElementById("password");

            var usuarioIngresado = txtRfc.value.trim();
            var contrasenaIngresada = txtPassword.value;

            if (usuarioIngresado === "") { 
                swal("Usuario", "El campo de USUARIO es requerido", "warning");
                txtRfc.focus();		
                return false;
            }
            if (contrasenaIngresada === "") { 
                swal("Contraseña", "La CONTRASEÑA es requerida", "warning");
                txtPassword.focus();		
                return false;
            }
        
            var usuariosValidos = {
                "DIRADMIN": "Pr0c3s0.",
                "IGNACIO": "admin",
                "DOMINGO" :"admin"
            };

            var usuarioBusqueda = usuarioIngresado.toUpperCase();

            if (usuariosValidos[usuarioBusqueda] && usuariosValidos[usuarioBusqueda] === contrasenaIngresada) {
                // Redirección hacia la plataforma externa de Google Sites
                window.location.href = "https://sites.google.com/view/ieem-controlpatrimonial/p%C3%A1gina-principal"; 
                return false; 
            } else {
                contenedorError.innerHTML = "Contraseña incorrecta";
                contenedorError.style.display = "block";
                swal("Error de Acceso", "Usuario o contraseña incorrectos", "error");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">
                <!-- Se asume que ieemlogo.png está en la raíz junto al index.php -->
                <img class="logo-img logo-rotar" src="ieemlogo.png" alt="logo" width="90%">
                <br><br>
                <span class="splash-description"><strong>Escriba el usuario y la contraseña para acceder al sistema</strong></span>
            </div>
            <div class="card-body">
                <form id="Reg" name="Reg" method="post" action="#">
                    <div class="form-group espacio-campo">
                        <input class="form-control form-control-lg form-control-centered" id="rfc" name="rfc" maxlength="13" type="text" placeholder="USUARIO">
                    </div>
                    <div class="form-group espacio-campo">
                        <input class="form-control form-control-lg form-control-centered" id="password" name="password" type="password" placeholder="CONTRASEÑA" autocomplete="off">
                    </div>
                    
                    <div id="mensaje-error" class="error-mensaje"></div>

                    <div class="btn-3d-container">
                        <button type="button" onClick="validar()" class="btn-blue-3d">INGRESAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
