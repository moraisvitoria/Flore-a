<?php
require('includes/config.php');

if (isset($_COOKIE[$c['ucookie']]))
$user = json_decode($_COOKIE[$c['ucookie']], true);

$route = trim(htmlentities($_SERVER['QUERY_STRING']));

if ($route == '') $route = 'home';

$route = explode('/', $route)[0];

$page = array(
    'php' => "pages/{$route}/index.php",
    'css' => "pages/{$route}/index.css",
    'js' => "pages/{$route}/index.js",
  );

  if (!file_exists($page['php'])) :
    $page = array(
        'php' => "pages/404/index.php",
        'css' => "pages/404/index.css",
        'js' => "pages/404/index.js",
      );
    endif;

    require($page['php']);

    if (file_exists($page['css']))
    $page_css = "<link rel=\"stylesheet\" href=\"/{$page['css']}\">";

    if (file_exists($page['js']))
    $page_js = "<script src=\"/{$page['js']}\"></script>";

    if ($page_title == '')
      $title = "{$c['sitename']} {$c['titlesep']} {$c['siteslogan']}";
    else
      $title = "{$c['sitename']} {$c['titlesep']} {$page_title}";

    $fsocial = '<nav>
      <h4>Redes sociais:</h4>';

      for ($i = 0; $i < count($s); $i++) :

    $fsocial .= <<<HTML

        <a href="{$s[$i]['link']}" target="_blank" title="Acesse nosso {$s[$i]['name']}">
  <i class="fa-brands {$s[$i]['icon']} fa-fw"></i>
  <span>{$s[$i]['name']}</span>
</a>
HTML;

endfor;

$fsocial .= '
</nav>';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="<?php echo $c['sitefavicon'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="/style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="scripts/cep.js"></script>
  <?php

  echo $page_css;
  ?>
  <title><?php echo $title ?></title>
</head>  

<body>
  <a id="top"></a>
  <div id="wrap">

    <header>
      <a href="/" title="Página inicial">
        <?php echo $c['sitelogo'] ?>
      </a>
      <h1>
        <?php echo $c['sitename'] ?>
        <small><?php echo $c['siteslogan'] ?></small>
      </h1>
    </header>

    <nav class="nav">
      <ul>
         <li><a href="home" title="Página inicial" class="dropable"><span>Início</span></a>
         <li class="drop"><a href="about" title="Opções de Tratamentos" class="dropable"><span>Tratamentos</span></a>
            <ul class="dropdown">
              <li><a href="#">Diagnósticos</a></li>
              <li><a href="#">Tratamento facial</a></li>
              <li><a href="#">Tratamento corporal</a></li>
            </ul>
         </li>
         <li><a href="vlog" title="Estéticas em Vlog" class="dropable"><span>Vlog</span></a>
         <li><a href="contacts" title="Faça contato" class="dropable"><span>Contatos</span></a>
      </ul>

      <?php

  ?>
  <a href="/?menu" id="menu__box" tiltle="Abre/fecha menu"></a>
  </nav>

  <div id="dropable">
   <nav>
    <a href="/?search" title="Pesquisar no site">
    <i class="fa-solid fa-magnifying-glass fa-fw"></i>
    <span>Procurar</span></a>
    <hr>
    <a href="/?home" title="In">
    <span>Contatos</span>
    </a>
   </nav>

   <div class="container-fluid footer">
   <div class="row text-center ">
    <div class="col-md-3 footer">
    <h4> Institucional</h4>
    <ul class="navbar-nav">
      <li class="navbar-nav"><a href="index.php">Home</a></li>
      <li class="navbar-nav"><a href="index.php">Nossa Academia</a></li>
      <li class="navbar-nav"><a href="about.php">Conheca os Planos</a></li>
      <li class="navbar-nav"><a href="login.php">Área do Cliente</a></li>
      </ul>
    </div>
   <div class="col-md-3 footer">
      <h4>Atividades</h4>
      <ul class="navbar-nav">
        <li class="navbar-nav"><a href="spinning.php">Spinning</a></li>
        <li class="navbar-nav"><a href="jumpp.php">Jumpp</a></li>
        <li class="navbar-nav"><a href="funcional.php">Funcional</a></li>
        <li class="navbar-nav"><a href="pilates.php">Pilates</a></li>
      </ul>
    </div>
    
    <div class="col-md-3 footer">
      <h4>Funcionamento</h4>
      <p>Segunda á Sábado - 06:00 ás 23:00</p>
      <p>Domingo - 07:00 ás 13:00</p>
    </div>
    <div class="col-md-3 mapa">
        <h4>Localização</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.356219020248!2d-43.56103518503453!3d-22.900228385015083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9be15839e68c4f%3A0x588a284ae162bc38!2sSenac%20Campo%20Grande!5e0!3m2!1spt-BR!2sbr!4v1669141476114!5m2!1spt-BR!2sbr"
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> 
   </div>
   <div class="row text-center">
    <div class="col-md-12 sociais">
      <a href="https://facebook.com/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i></a>
      <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
      <a href="https://web.whatsapp.com/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
    </div>
   </div>
</div>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  </body>
</html>