/**
 * JavaScript desta página.
 */

// Define o <title> desta página:
setTitle("Sobre...");

// Detecta clique nos cads
$(document).on('click', '.card', getHref);

// Processa cliques nos cards
function getHref() {
    loadPage($(this).attr('data-href'));
}

// Monta menu auxiliar:
$('.about-menu').html(aboutMenu);