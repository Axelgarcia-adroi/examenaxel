<?php
session_start();

$v = $_POST['nombre'];
$v1 = $_POST['usuario'];
$v2 = $_POST['password'];

if ($v1 == 'examen' && $v2 == 'axel123') { 
    // Login correcto
    $_SESSION['user'] = $v;
    header("Location: ./preguntas.php"); // ← aquí el cambio importante
    exit();          
} else {
    // Usuario o contraseña incorrectos
    echo "<script language='javascript'> 
            alert('Usuario o contraseña incorrectos');
            window.location='./acceso.html'; 
          </script>"; 
}
?>