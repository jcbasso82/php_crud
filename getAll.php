<?php
    require "src/db-conection.php";
    require "src/Repository/clientRepository.php";

    $clientRepository = new ClientRepository($pdo);
    $clients = $clientRepository->getAll();

    var_dump($clients);

?>