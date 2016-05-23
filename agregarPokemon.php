<!DOCTYPE html>
<html>
  <head>
    <title>Pokedex</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="icon" type="image/png" href="http://wahackforo.com/images/smilies/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper red">
        <a href="/Pokedex/pokedex.php" class="brand-logo left">&nbsp;<img src="Pokedex.png" alt=""></a>
        <a href="/Pokedex/Pokedex.php" data-activates="mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li>
            <form action="pokedex.php?search=" method="GET">
              <input type="search" name="search" id="" placeholder="BUSCAR">
            </form>
          </li>          
          <li class="active"><a class="dropdown-button" data-activates="dropdown2">Pokedex<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="tipos.php" >Tipos Elementales</a></li>
          <li><a class="dropdown-button" data-activates="dropdown3">Exportar a PDF<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button" data-activates="dropdown4">Exportar a EXCEL<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="about.php">Acerca de</a></li>
        </ul>
        <ul class="side-nav" id="mobile">  <!-- Menu del movil-->
        <li class="active"><a href="Pokedex.php">Pokedex</a></li>
        <li><a href="tipos.php">Tipos Elementales</a></li>
        <li><a href="about.php">Acerca de</a></li>
      </ul>
      <ul id="dropdown2" class="dropdown-content">
        <li><a href="pokedex.php">Ver Pokemon</a></li>
        <li class="active"><a href="agregarPokemon.php">Agregar Pokemon</a></li>
      </ul>
      <ul id="dropdown3" class="dropdown-content">
        <li><a href="">Nombre</a></li>
        <li><a href="">Tipo</a></li>
        <li><a href="">Tipo2</a></li>
      </ul>
      <ul id="dropdown4" class="dropdown-content">
        <li><a href="">Nombre</a></li>
        <li><a href="">Tipo</a></li>
        <li><a href="">Tipo2</a></li>
      </ul>
    </div>
  </nav>
  <section>
    <?php
    // conectar
    $m = new MongoClient( "mongodb://root:root@ds019482.mlab.com:19482/pokemon");
    // seleccionar una base de datos
    $db = $m->pokemon;
    // seleccionar una colección (equivalente a una tabla en una base de datos relacional)
    $colección = $db->Pokedex;
    // encontrar todo lo que haya en la colección
    $cursor = $colección->find();
    ?>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card-panel light-blue darken-4">
            <span class="white-text">
              <center>
              <h4>En este apartado podras agregar nuevos POKEMON a tu Pokedex.</h4>
              </center>
            </span>
          </div>
        </div>
      </div>
    </section>
    <section alt"formulario">
      <div class="container">
        <div class="row">
          <form class="col s12" action="pokemonAgregado.php" method="POST">
            <div class="row">
              <div class="input-field col s6">
                <input name="nombre" type="text" class="validate" required>
                <label for="first_name">Nombre</label>
              </div>
              <div class="input-field col s6">
                <select name="tipo1">
                  <option value="PLANTA">PLANTA</option>
                  <option value="VENENO">VENENO</option>
                  <option value="FUEGO">FUEGO</option>
                  <option value="VOLADOR">VOLADOR</option>
                  <option value="AGUA">AGUA</option>
                  <option value="ACERO">ACERO</option>
                  <option value="BICHO">BICHO</option>
                  <option value="DRAGON">DRAGON</option>
                  <option value="ELECTRICO">ELECTRICO</option>
                  <option value="FANTASMA">FANTASMA</option>
                  <option value="HIELO">HIELO</option>
                  <option value="LUCHA">LUCHA</option>
                  <option value="NORMAL">NORMAL</option>
                  <option value="HADA">HADA</option>
                  <option value="PSIQUICO">PSIQUICO</option>
                  <option value="ROCA">ROCA</option>
                  <option value="TIERRA">TIERRA</option>
                  <option value="N/A">N/A</option>
                </select>
                <label>1er Tipo Elemental</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <select name="tipo2">
                  <option value="PLANTA">PLANTA</option>
                  <option value="VENENO">VENENO</option>
                  <option value="FUEGO">FUEGO</option>
                  <option value="VOLADOR">VOLADOR</option>
                  <option value="AGUA">AGUA</option>
                  <option value="ACERO">ACERO</option>
                  <option value="BICHO">BICHO</option>
                  <option value="DRAGON">DRAGON</option>
                  <option value="ELECTRICO">ELECTRICO</option>
                  <option value="FANTASMA">FANTASMA</option>
                  <option value="HIELO">HIELO</option>
                  <option value="LUCHA">LUCHA</option>
                  <option value="NORMAL">NORMAL</option>
                  <option value="HADA">HADA</option>
                  <option value="PSIQUICO">PSIQUICO</option>
                  <option value="ROCA">ROCA</option>
                  <option value="TIERRA">TIERRA</option>
                  <option value="N/A">N/A</option>
                </select>
                <label>2do Tipo Elemental</label>
              </div>
              <div class="input-field col s6">
                <input name="evolucion" type="text" class="validate" value="N/A" required>
                <label for="last_name">Evolucion</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="imagen" type="text" class="validate" required>
                <label for="last_name">URL Imagen</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">Agregar Pokemon
            <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
      </div>
    </section>
    <section>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
      $(".button-collapse").sideNav();
      $(".dropdown-button").dropdown({ hover: false });
      $('.slider').slider({full_width: true});
      $('.parallax').parallax();
      $('.slider').slider({full_width: true});
      $('select').material_select();
      </script>
    </section>
  </body>
<footer class="page-footer grey darken-3">
<div class="footer-copyright">
  <div class="container">
    © 2016 Pokedex
  </div>
</div>
</footer>
</html>