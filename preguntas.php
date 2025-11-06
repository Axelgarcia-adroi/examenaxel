<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examen de Programación</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background:rgb(193, 84, 37);
      color: #222;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      width: 700px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }
    h1, h2 { text-align: center; }
    .pregunta { margin-bottom: 25px; }
    .pregunta p { font-weight: bold; }
    label { display: block; margin-left: 20px; }
    button {
      background: #1a2a6c;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      width: 300px ;
      font-size: 16px;
    }
    button:hover {
      background:rgb(50, 234, 148);
      width: 300px;
      color:black;
    }
    #resultado {
        bac
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
    }
    #detalle{
    }
  </style>
</head>
<body>
<div class="container" id="examen">
<h2>BIENVENIDO <?php echo $_SESSION['user']; ?></h2>
  <h2>Examen de Programación — Segundo Parcial</h2>
  <form id="formExamen">
    <div class="pregunta">
      <p>1.- ¿Qué es PHP?</p>
      <label><input type="radio" name="p1" value="a" required> Un programa para dibujar</label>
      <label><input type="radio" name="p1" value="b"> Un lenguaje de programación del lado del servidor</label>
      <label><input type="radio" name="p1" value="c"> Un sistema operativo</label>
    </div>

    <div class="pregunta">
      <p>2.- ¿Qué es HTML?</p>
      <label><input type="radio" name="p2" value="a" required> Lenguaje de etiquetas</label>
      <label><input type="radio" name="p2" value="b"> Lenguaje de Programación de Servidor</label>
      <label><input type="radio" name="p2" value="c"> Lenguaje de Consulta de Bases de Datos</label>
    </div>

    <div class="pregunta">
      <p>3.- ¿Para qué sirve CSS?</p>
      <label><input type="radio" name="p3" value="a" required> Para almacenar datos</label>
      <label><input type="radio" name="p3" value="b"> Para dar estilo y diseño a las páginas web</label>
      <label><input type="radio" name="p3" value="c"> Para ejecutar funciones matemáticas</label>
    </div>

    <div class="pregunta">
      <p>4.- ¿Qué hace JavaScript?</p>
      <label><input type="radio" name="p4" value="a" required> Añade interactividad a las páginas web</label>
      <label><input type="radio" name="p4" value="b"> Sirve para crear bases de datos</label>
      <label><input type="radio" name="p4" value="c"> Crea hojas de estilo</label>
    </div>

    <div class="pregunta">
      <p>5.- ¿Qué lenguaje se usa para trabajar con bases de datos?</p>
      <label><input type="radio" name="p5" value="a" required> SQL</label>
      <label><input type="radio" name="p5" value="b"> HTML</label>
      <label><input type="radio" name="p5" value="c"> CSS</label>
    </div>

    <div class="pregunta">
      <p>6.- ¿Qué significa la palabra "echo" en PHP?</p>
      <label><input type="radio" name="p6" value="a" required> Para borrar una variable</label>
      <label><input type="radio" name="p6" value="b"> Para mostrar texto o variables en pantalla</label>
      <label><input type="radio" name="p6" value="c"> Para detener un ciclo</label>
    </div>

    <div class="pregunta">
      <p>7.- ¿Qué es una variable?</p>
      <label><input type="radio" name="p7" value="a" required> Un espacio en memoria donde se guarda información</label>
      <label><input type="radio" name="p7" value="b"> Una etiqueta HTML</label>
      <label><input type="radio" name="p7" value="c"> Un color CSS</label>
    </div>

    <div class="pregunta">
      <p>8.- ¿Qué es un bucle "for"?</p>
      <label><input type="radio" name="p8" value="a" required> Una condición lógica</label>
      <label><input type="radio" name="p8" value="b"> Una forma de crear una función</label>
      <label><input type="radio" name="p8" value="c"> Una estructura que repite un bloque de código</label>
    </div>

    <div class="pregunta">
      <p>9.- ¿Qué significa "if" en programación?</p>
      <label><input type="radio" name="p9" value="a" required> Inicia un ciclo</label>
      <label><input type="radio" name="p9" value="b"> Evalúa una condición para ejecutar un bloque de código</label>
      <label><input type="radio" name="p9" value="c"> Define un estilo visual</label>
    </div>

    <div class="pregunta">
      <p>10.- ¿Qué es un arreglo o array?</p>
      <label><input type="radio" name="p10" value="a" required> Un solo número</label>
      <label><input type="radio" name="p10" value="b"> Una variable vacía</label>
      <label><input type="radio" name="p10" value="c"> Una colección de datos almacenados en una misma variable</label>
    </div>

    <center><button type="submit">Enviar respuestas</button></center>
  </form>
</div>

<div class="container resultado" id="resultado" style="display:none;">
  <h2 id="mensaje"></h2>
  <p id="detalle"></p>
</div>

<script>
  const form = document.getElementById('formExamen');
  const examen = document.getElementById('examen');
  const resultado = document.getElementById('resultado');
  const mensaje = document.getElementById('mensaje');
  const detalle = document.getElementById('detalle');

  const respuestasCorrectas = {
    p1: "b",
    p2: "a",
    p3: "b",
    p4: "a",
    p5: "a",
    p6: "b",
    p7: "a",
    p8: "c",
    p9: "b",
    p10: "c"
  };

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    let aciertos = 0;

    for (let pregunta in respuestasCorrectas) {
      const seleccionada = form[pregunta].value;
      if (seleccionada === respuestasCorrectas[pregunta]) aciertos++;
    }

    const nombre = "<?php echo $_SESSION['user']; ?>";
    examen.style.display = "none";
    resultado.style.display = "block";

    mensaje.textContent = `🎉 ¡Felicidades ${nombre}!`;
    detalle.textContent = `Tu calificación final es ${aciertos} de 10 puntos.`;
  });
</script>

</body>
</html>