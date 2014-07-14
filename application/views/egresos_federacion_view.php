<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>Presupuesto de egresos de la federación 2014</title>
</head>
<body>
  <div id="main" class="egresos2014">
    <h1>Presupuesto de egresos de la federación 2014</h1>

    <!-- aquí van los controles para navegar en el presupuesto
         de egresos de la federación -->

    <form id="interface">
      <p><input type="text" name="query" id="query"></p>
    </form>

    <ul id="ramos-list"></ul>

  </div>

  <!-- carga el require.js 
       todo el código está dentro de js/apps/egresos2014  -->
  <script data-main="/js/apps/egresos2014/main" src="/js/vendor/require.js"></script>
</body>
</html>