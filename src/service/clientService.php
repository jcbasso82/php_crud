<?php

require_once "src/repository/clientRepository.php";
require_once "src/generic/guidGenerator.php";
require_once "src/generic/dateTimeLocation.php";

class ClientService
{

    public function getAll()
    {
        try {
            $clientRepository = new ClientRepository();
            $clients = $clientRepository->getAll();

            return $clients;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insert(string $cnpj, string $name, string $phone, string $email)
    {
        try {

            $guid = new GuidGenerator();
            $dateTime = new DateTimeLocation();
            $client = new ClientModel();

            $client->setUuid($guid->New());
            $client->setCnpj($cnpj);
            $client->setName($name);
            $client->setEmail($email);
            $client->setPhone($phone);
            $client->setEmail($email);
            $client->setInputDate($dateTime->get());
            $client->setUpdateDate($dateTime->get());
            $client->setStatus('A');
            $client->setUser('ADMIN');

            $clientRepository = new ClientRepository();
            $clientRepository->insert($client);

            header("Location: client.php");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function update(string $uuid, string $cnpj, string $name, string $phone, string $email, string $status)
    {
        try {

            $clientRepository = new ClientRepository();
            $record = $clientRepository->getToUuid($uuid);

            $dateTime = new DateTimeLocation();

            $client = new ClientModel();
            $client->setUuid($record->getUuid());
            $client->setCnpj($cnpj);
            $client->setName($name);
            $client->setEmail($email);
            $client->setPhone($phone);
            $client->setEmail($email);
            $client->setInputDate($record->getInputDate());
            $client->setUpdateDate($dateTime->get());
            $client->setStatus($status);
            $client->setUser('ADMIN');

            
            $clientRepository->update($client);

            header("Location: client.php");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getToUuid(string $uuid)
    {
        try {

            $clientRepository = new ClientRepository();
            $record = $clientRepository->getToUuid($uuid);

            return $record;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
