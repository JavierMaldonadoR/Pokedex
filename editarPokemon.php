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
    $coleccion = $db->Pokedex;
    $id = (int) $_GET['id'];
    $editQuery = array('numero' => $id);
    $item = $coleccion->findOne($editQuery);
    ?>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card-panel light-blue darken-4">
            <span class="white-text">
              <center>
              <h4>En este apartado podras editar nuevos POKEMON a tu Pokedex.</h4>
              </center>
            </span>
          </div>
        </div>
      </div>
    </section>
    <section alt"formulario">
      <div class="container">
        <div class="row">
          <form class="col s12" action="pokemonEditado.php?id=<?php echo $id; ?>" method="POST">
            <div class="row">
              <div class="input-field col s4">
                <input disabled name="numero" type="text" class="validate" id="disabled" value="<?php echo $id;?>" required>
                <label for="disabled">Numero</label>
              </div>
              <div class="input-field col s4">
                <input name="nombre" type="text" class="validate" value="<?php echo $item['nombre']; ?>" required>
                <label for="first_name">Nombre</label>
              </div>
              <div class="input-field col s4">
                <select name="tipo1" value="<?php echo $item['tipos'][0]; ?>">
                  <option value="PLANTA"     <?php echo $item['tipos'][0] == 'PLANTA' ? 'selected' : ''; ?>>PLANTA</option>
                  <option value="VENENO"     <?php echo $item['tipos'][0] == 'VENENO' ? 'selected' : ''; ?>>VENENO</option>
                  <option value="FUEGO"      <?php echo $item['tipos'][0] == 'FUEGO' ? 'selected' : ''; ?> >FUEGO</option>
                  <option value="VOLADOR"    <?php echo $item['tipos'][0] == 'VOLADOR' ? 'selected' : ''; ?>>VOLADOR</option>
                  <option value="AGUA"       <?php echo $item['tipos'][0] == 'AGUA' ? 'selected' : ''; ?> >AGUA</option>
                  <option value="ACERO"      <?php echo $item['tipos'][0] == 'ACERO' ? 'selected' : ''; ?>>ACERO</option>
                  <option value="BICHO"      <?php echo $item['tipos'][0] == 'BICHO' ? 'selected' : ''; ?>>BICHO</option>
                  <option value="DRAGON"     <?php echo $item['tipos'][0] == 'DRAGON' ? 'selected' : ''; ?> >DRAGON</option>
                  <option value="ELECTRICO"  <?php echo $item['tipos'][0] == 'ELECTRICO' ? 'selected' : ''; ?>>ELECTRICO</option>
                  <option value="FANTASMA"   <?php echo $item['tipos'][0] == 'FANTASMA' ? 'selected' : ''; ?>>FANTASMA</option>
                  <option value="HIELO"      <?php echo $item['tipos'][0] == 'HIELO' ? 'selected' : ''; ?>>HIELO</option>
                  <option value="LUCHA"      <?php echo $item['tipos'][0] == 'LUCHA' ? 'selected' : ''; ?>>LUCHA</option>
                  <option value="NORMAL"     <?php echo $item['tipos'][0] == 'NORMAL' ? 'selected' : ''; ?>>NORMAL</option>
                  <option value="HADA"       <?php echo $item['tipos'][0] == 'HADA' ? 'selected' : ''; ?>>HADA</option>
                  <option value="PSIQUICO"   <?php echo $item['tipos'][0] == 'PSIQUICO' ? 'selected' : ''; ?>>PSIQUICO</option>
                  <option value="ROCA"       <?php echo $item['tipos'][0] == 'ROCA' ? 'selected' : ''; ?>>ROCA</option>
                  <option value="TIERRA"     <?php echo $item['tipos'][0] == 'TIERRA' ? 'selected' : ''; ?>>TIERRA</option>
                  <option value="N/A"        <?php echo $item['tipos'][0] == 'N/A' ? 'selected' : ''; ?>>N/A</option>
                </select>
                <label>1er Tipo Elemental</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <select name="tipo2">
                  <option value="PLANTA"     <?php echo $item['tipos'][1] == 'PLANTA' ? 'selected' : ''; ?>>PLANTA</option>
                  <option value="VENENO"     <?php echo $item['tipos'][1] == 'VENENO' ? 'selected' : ''; ?>>VENENO</option>
                  <option value="FUEGO"      <?php echo $item['tipos'][1] == 'FUEGO' ? 'selected' : ''; ?> >FUEGO</option>
                  <option value="VOLADOR"    <?php echo $item['tipos'][1] == 'VOLADOR' ? 'selected' : ''; ?>>VOLADOR</option>
                  <option value="AGUA"       <?php echo $item['tipos'][1] == 'AGUA' ? 'selected' : ''; ?> >AGUA</option>
                  <option value="ACERO"      <?php echo $item['tipos'][1] == 'ACERO' ? 'selected' : ''; ?>>ACERO</option>
                  <option value="BICHO"      <?php echo $item['tipos'][1] == 'BICHO' ? 'selected' : ''; ?>>BICHO</option>
                  <option value="DRAGON"     <?php echo $item['tipos'][1] == 'DRAGON' ? 'selected' : ''; ?> >DRAGON</option>
                  <option value="ELECTRICO"  <?php echo $item['tipos'][1] == 'ELECTRICO' ? 'selected' : ''; ?>>ELECTRICO</option>
                  <option value="FANTASMA"   <?php echo $item['tipos'][1] == 'FANTASMA' ? 'selected' : ''; ?>>FANTASMA</option>
                  <option value="HIELO"      <?php echo $item['tipos'][1] == 'HIELO' ? 'selected' : ''; ?>>HIELO</option>
                  <option value="LUCHA"      <?php echo $item['tipos'][1] == 'LUCHA' ? 'selected' : ''; ?>>LUCHA</option>
                  <option value="NORMAL"     <?php echo $item['tipos'][1] == 'NORMAL' ? 'selected' : ''; ?>>NORMAL</option>
                  <option value="HADA"       <?php echo $item['tipos'][1] == 'HADA' ? 'selected' : ''; ?>>HADA</option>
                  <option value="PSIQUICO"   <?php echo $item['tipos'][1] == 'PSIQUICO' ? 'selected' : ''; ?>>PSIQUICO</option>
                  <option value="ROCA"       <?php echo $item['tipos'][1] == 'ROCA' ? 'selected' : ''; ?>>ROCA</option>
                  <option value="TIERRA"     <?php echo $item['tipos'][1] == 'TIERRA' ? 'selected' : ''; ?>>TIERRA</option>
                  <option value="N/A"        <?php echo $item['tipos'][1] == 'N/A' ? 'selected' : ''; ?>>N/A</option>
                </select>
                <label>2do Tipo Elemental</label>
              </div>
              <div class="input-field col s6">
                <input name="evolucion" type="text" class="validate" value="<?php echo $item['evolucion']; ?>" required>
                <label for="last_name">Evolucion</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="imagen" type="text" class="validate" value="<?php echo $item['imagen']; ?>" required>
              <label for="last_name">URL Imagen</label>
            </div>
          </div>
          <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action">Editar Pokemon
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