<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title><?= $this->_titlepage ?></title>
  <link rel="stylesheet" type="text/css" href="/scripts/carousel/carousel.css">
  <link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/skins/page/css/global.css?v=1.05">
  <link rel="stylesheet" href="/skins/page/css/estiloseditor.css">
  <link rel="stylesheet" href="/components/bootstrap-fileinput/css/fileinput.css">
  <link href='https://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css2?family=Euphoria+Script&family=Homemade+Apple&family=Miss+Fajardose&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="/favicon.ico">
  <script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js" async=""></script>
  <script src="https://www.youtube.com/player_api"></script>
</head>

<body>

  <script src="/components/jquery/dist/jquery.min.js"></script>
  <script src="/scripts/popper.min.js"></script>
  <script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/scripts/carousel/carousel.js"></script>
  <script src="/components/bootstrap-validator/dist/validator.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <script src="/skins/page/js/main.js?v=1.01"></script>

  <?php if ($_GET['mod'] != "detalle_solicitud") { ?>
    <header class="header-menu">
      <?= $this->_data['header']; ?>
    </header>
  <?php } ?>
  <div><?= $this->_content ?></div>
  <?= $this->_data['botones']; ?>
  <footer>
    <?= $this->_data['footer']; ?>
  </footer>




  <link rel="stylesheet" href="/components/bootstrap-fileinput/css/fileinput.css">
  <script src="/components/bootstrap-fileinput/js/fileinput.min.js"></script>
  <script src="/components/bootstrap-fileinput/js/locales/es.js"></script>
  <div class="modal fade" id="modaleditor" tabindex="-1" role="dialog" aria-labelledby="modaleditorLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"></div>
    </div>
  </div>
  <script>
    $('.ls-modal').on('click', function(e) {
      e.preventDefault();
      $('#modaleditor').modal('show').find('.modal-content').load($(this).attr('href'));
    });
  </script>
</body>

</html>