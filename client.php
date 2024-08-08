<?php
    require "src/service/clientService.php";

    $clientService = new ClientService();
    $clients = $clientService->getAll();

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

  

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/nprogress/nprogress.js"></script>
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
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
                

                
                  <li
                   >
                    <a class="sidenav-item-link" href="index.php">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                  </li>
                
                
                  <li class="section-title">
                    Funções
                  </li>
                
                  <li
                  class="active"
                  >
                   <a class="sidenav-item-link" href="client.php">
                     <i class="mdi mdi-clipboard-account"></i>
                     <span class="nav-text">Clientes</span>
                   </a>
                 </li>
    
                
                  <li
                   >
                    <a class="sidenav-item-link" href="Lei.php">
                      <i class="mdi mdi-library-books"></i>
                      <span class="nav-text">Lei do BEM</span>
                    </a>
                  </li>
                

                

                
                  <li
                   >
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
<div  class="card card-default">
  <div class="card-header">
      <form method="get" action="insUpdClient.php">
         <button name="action" value="new" type="submit" class="btn btn-primary btn-pill mb-4">Novo</button>
      </form>
  </div>
  <div class="card-body">
    <div class="collapse" id="collapse-data-tables">
      <pre class="language-html mb-4">
<code >
  
</code>
      </pre>
    </div>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
      <thead>
        <tr>
          <th>CNPJ</th>
          <th>Nome</th>
          <th>Telefone</th>
          <th>e-mail</th>
          <th>Status</th>
          <th>Inclusão</th>
          <th>Atualização</th>
          <th>USUARIO</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
          <td><?= $client->getCnpj() ?></td>
          <td><?= $client->getName() ?></td>
          <td><?= $client->getPhone() ?></td>
          <td><?= $client->getEmail() ?></td>
          <td><?= $client->getStatus() ?></td>
          <td><?= $client->getInputDate() ?></td>
          <td><?= $client->getUpdateDate() ?></td>
          <td><?= $client->getUser() ?></td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                   <a class="dropdown-item" href="insUpdClient.php?action=upd&uuid=<?=$client->getUuid()?>">Editar</a>
                   <a class="dropdown-item" href="insUpdClient.php?action=disable&uuid=<?=$client->getUuid()?>">Inativar</a>
                   <a class="dropdown-item" href="insUpdClient.php?action=enable&uuid=<?=$client->getUuid()?>">Ativar</a>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>


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
