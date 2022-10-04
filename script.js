function runApp() {
  loadPage('home');
   $(document).on('click', 'a', routerLink);

}

resize();

$(window).resize(resize);

function routerLink() {
   
  hideMenu();

  var href = $(this).attr('href');

  if (href == 'menu') {

    toggleMenu();

    return false;
  }

  if (
    // Se clicou em um link que começa com "http://...", OU
    href.substr(0, 7) == 'http://' ||

    // Se clicou em um link que começa com "https://...", OU
    href.substr(0, 8) == 'https://' ||

    // Se clicou em uma âncora que começa com "#"...
    href.substr(0, 1) == '#'
  ) {

    return true;
  }

  loadPage(href);

  return false;
}

/**
 * loadPage() → Aplicativo que processa os arquivos HTML, CSS e JavaScript da 
 * "rota" solicitada e abre estes no site:
 */
function loadPage(href) {

  // Cria objeto contendo todas as partes da página (HTML, CSS e JS):
  var page = {
    "html": `/pages/${href}/index.html`,
    "css": `/pages/${href}/style.css`,
    "js": `/pages/${href}/script.js`
  }

  // jQuery → Carrega o documento HTML da página na variável "content":
  $.get(page.html, function (content) {

    // jQuery → Carrega o CSS da página, no <head> da "index.html":
    $('#pageCSS').attr('href', page.css);

    // jQuery → Exibe HTML na página no elemento <main>:
    $('#content').html(content);

    // jQuery → Carrega e executa o JavaScript da página:
    $.getScript(page.js);

  });

  // Atualiza URL da página:
  // window.history.pushState({}, "", href);

}

function setTitle(title = '') {

  // Se não definiu um valor para title...
  if (title == '') {

    // jQuery → Título padrão da página será nomeDoSite + sloganDoSite:
    $('title').html("Absoluta & Bela .:. Centro de estética e beleza");

    // Se definiu "title"...
  } else {

    // jQuery → Título da página será nomeDoSite + nomeDaPágina:
    $('title').html("Absoluta & Bela .:. " + title);

  }

}

// Ajusta o menu dropdown:
function resize() {

  // jQuery → Oculta o menu:
  $('#dropable').hide('fast');

  // Se a largura da tela é maior que 574px...
  if (window.innerWidth > 574) {

    // jQuery → Oculta o botão do menu:
    $('#btnMenu').hide(0);

    // jQuery → Mostra o menu normal:
    $('.dropable').show(0);

    // Se não...
  } else {

    // jQuery → Oculta o menu normal:
    $('.dropable').hide(0);

    // jQuery → Mostra o botão do menu:
    $('#btnMenu').show(0);

  }
}

/**
 * toggleMenu() → Aplicativo que controla a exibição do menu dropdown.
 */
function toggleMenu() {

  // jQuery → Se o menu está visível...
  if ($('#dropable').is(":visible")) {

    // Chama a função que oculta o menu:
    hideMenu();
  } else {
    showMenu();
  }
}

function hideMenu() {
  $('#dropable').hide('fast');
  $('#btnMenu i').removeClass('fa-rotate-90');
}


function showMenu() {
  $('#dropable').show('fast');
  $('#btnMenu i').addClass('fa-rotate-90');
}

/**
 * setCookie() → Cria cookies:
 */
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/**
 * getCookie() → Lê o valor de um cookie:
 */
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

var aboutMenu = `
<a href="site"><i class="fa-solid fa-globe fa-fw"></i><span>Sobre o site</span></a>
<a href="team"><i class="fa-solid fa-users fa-fw"></i><span>Quem somos</span></a>
<a href="policies"><i class="fa-solid fa-user-lock fa-fw"></i><span>Sua privacidade</span></a>
<a href="contacts"><i class="fa-solid fa-comments fa-fw"></i><span>Contatos</span></a>
`;

$(document).ready(runApp);