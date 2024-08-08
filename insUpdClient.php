<?php
require_once "src/service/clientService.php";

$clientService = new ClientService();
$action = $_GET["action"];
if (isset($_POST['btnNew']) && $action == "new") {
  $clients = $clientService->insert($_POST['cnpj'], $_POST['name'], $_POST['phone'], $_POST['email']);
} 

if ($action == "upd"){
  $client = $clientService->getToUuid($_GET['uuid']);
}

if (isset($_POST['btnUpd']) && $action == "upd") {
  $clients = $clientService->update($_POST['uuid'],$_POST['cnpj'], $_POST['name'], $_POST['phone'], $_POST['email'],$_POST['status']);
}

if ($action == "enable") {
  $client = $clientService->getToUuid($_GET['uuid']);
  $clients = $clientService->update($client->getUuid(),$client->getCnpj(), $client->getName(), $client->getPhone(), $client->getEmail(),'A');
}

if ($action == "disable") {
  $client = $clientService->getToUuid($_GET['uuid']);
  $clients = $clientService->update($client->getUuid(),$client->getCnpj(), $client->getName(), $client->getPhone(), $client->getEmail(),'I');
}

?>
<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Codes</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />


  <link href="plugins/prism/prism.css" rel="stylesheet" />



  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />




  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />

  <script src="plugins/nprogress/nprogress.js"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
  <script>
    NProgress.configure({
      showSpinner: false
    });
    NProgress.start();
  </script>



  <!-- ====================================
    ——— WRAPPER
    ===================================== -->
  <div class="wrapper">


    <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
    <aside class="left-sidebar sidebar-dark" id="left-sidebar">
      <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
          <a href="/index.php">
            <img src="images/logoCODES.png">
          </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">



            <li>
              <a class="sidenav-item-link" href="index.php">
                <i class="mdi mdi-chart-line"></i>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>


            <li class="section-title">
              Funções
            </li>

            <li class="active">
              <a class="sidenav-item-link" href="client.php">
                <i class="mdi mdi-clipboard-account"></i>
                <span class="nav-text">Clientes</span>
              </a>
            </li>


            <li>
              <a class="sidenav-item-link" href="Lei.php">
                <i class="mdi mdi-library-books"></i>
                <span class="nav-text">Lei do BEM</span>
              </a>
            </li>





            <li>
              <a class="sidenav-item-link" href="contacts.html">
                <i class="mdi mdi-map-search-outline"></i>
                <span class="nav-text">Auditoria Lei </br>de Informática</span>
              </a>
            </li>

          </ul>

        </div>

        <div class="sidebar-footer">
          <div class="sidebar-footer-content">
            <ul class="d-flex">
              <li class="sidenav-item-link">
                <a class="dropdown-link-item" href="sign-in.html"> <i class="mdi mdi-logout"></i> Sair </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </aside>



    <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
    <div class="page-wrapper">

      <!-- Header -->
      <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>

          <span class="page-title">Clientes</span>

          <div class="navbar-right ">


            <ul class="nav navbar-nav">
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" />
                  <span class="d-none d-lg-inline-block">Julio Basso</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-footer">
                    <a class="dropdown-link-item" href="sign-in.html"> <i class="mdi mdi-logout"></i> Sair </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>


      </header>

      <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
      <div class="content-wrapper">
        <div class="content"><!-- For Components documentaion -->

          <!-- Products Inventory -->
          <div class="card card-default">
            <div class="card-header">

            </div>
            <div class="card-body">
              <div class="collapse" id="collapse-data-tables">
                <pre class="language-html mb-4">
<code >
  
</code>
      </pre>
              </div>
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control input-lg" id="cnpj" name="cnpj" 
                      <?php if($action == 'upd') {?>
                        value="<?=$client->getCnpj()?>"
                      <?php }?>
                      >
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control input-lg" id="name" name="name" 
                    <?php if($action == 'upd') {?>
                        value="<?=$client->getName()?>"
                      <?php }?>
                    >
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <label for="phone">Telefone</label>
                    <input type="text" class="form-control input-lg" id="phone" name="phone" 
                    <?php if($action == 'upd') {?>
                        value="<?=$client->getPhone()?>"
                      <?php }?>
                    >
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control input-lg" id="email" name="email" aria-describedby="emailHelp" 
                    <?php if($action == 'upd') {?>
                      value=<?=$client->getEmail()?>
                      <?php }?>
                    
                    >
                  </div>
                  <div class="col-md-12">
                    <?php if($action == 'new') {?>
                        <button name="btnNew" type="submit" class="btn btn-primary btn-pill mb-4">Gravar</button>
                    <?php }?>
                    <?php if($action == 'upd') {?>
                        <input type="hidden" name="uuid" value="<?=$client->getUuid()?>">
                        <input type="hidden" name="status" value="<?=$client->getStatus()?>">
                        <button name="btnUpd" type="submit" class="btn btn-primary btn-pill mb-4">Atualizar</button>
                    <?php }?>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

      <!-- Footer -->
      <footer class="footer mt-auto">
        <div class="copyright bg-white">
        </div>
        <script>
          var d = new Date();
          var year = d.getFullYear();
          document.getElementById("copy-year").innerHTML = year;
        </script>
      </footer>

    </div>
  </div>





  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



  <script src="plugins/prism/prism.js"></script>



  <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>



  <script src="plugins/apexcharts/apexcharts.js"></script>


  <script src="js/mono.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/map.js"></script>
  <script src="js/custom.js"></script>




  <!--  -->


</body>

</html>