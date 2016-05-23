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
    <section>
      <div class="slider fullscreen">
        <ul class="slides">
          <li>
            <img src="http://wallpapercave.com/wp/X0W5i4w.jpg">
            <div class="caption center-align">
              <h3>Pokedex Oficial</h3>
              <h5 class="light grey-text text-lighten-3">Encuentra todo sobre los Pokemon en un solo lugar</h5>
              <a class="waves-effect waves-light btn blue" href="pokedex.php"><i class="material-icons left">input</i>Comenzar Ahora</a>
            </div>
          </li>
          <li>
            <img src="http://i.imgur.com/PydH6S0.jpg">
            <div class="caption left-align">
              <h3>Tipos Elementales</h3>
              <h5 class="light grey-text text-lighten-3">Aprende sobre los tipos de Pokemon</h5>
              <a class="waves-effect waves-light btn blue" href="tipos.php"><i class="material-icons left">input</i>Comenzar Ahora</a>
            </div>
          </li>
        </ul>
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
      </script>
    </section>
  </body>
  <footer class="page-footer grey darken-3">
    <div class="footer-copyright">
      <div class="container">
        © 2016 Javier Maldonado
      </div>
    </div>
  </footer>
</html>