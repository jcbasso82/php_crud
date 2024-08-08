<?php


require_once "src/model/clientModel.php";

class ClientRepository
{

    private PDO $pdo;

    public function __construct()
    {
        require "src/dbConnection.php";

        $this->pdo = $pdo;
    }

    private function formarObjeto($record):ClientModel
    {
        $client = new ClientModel();

        $client->setUuid($record['uuid']);
        $client->setCnpj($record['cnpj']);
        $client->setName($record['name']);
        $client->setEmail($record['email']);
        $client->setPhone($record['phone']);
        $client->setStatus($record['status']);
        $client->setInputDate($record['inputDate']);
        $client->setUpdateDate($record['updateDate']);
        $client->setUser($record['user']);

        return $client;
    }

    public function getAll()
    {


        $sql = "SELECT * FROM client ORDER BY uuid";
        $statement = $this->pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $allRecord = array_map(function ($client) {
            return $this->formarObjeto($client);
        }, $result);

        return $allRecord;
    }

    public function insert(ClientModel $client)
    {
        try {
            $statement = $this->pdo->prepare("Insert into client (uuid, cnpj, name, phone, email, status, inputDate, updateDate, user)
                                          values (:uuid, :cnpj, :name, :phone, :email, :status, :inputDate, :updateDate, :user)");

            $statement->bindParam(':uuid', $client->getUuid());
            $statement->bindParam(':cnpj', $client->getCnpj());
            $statement->bindParam(':name', $client->getName());
            $statement->bindParam(':phone', $client->getPhone());
            $statement->bindParam(':email', $client->getEmail());
            $statement->bindParam(':status', $client->getStatus());
            $statement->bindParam(':inputDate', $client->getInputDate());
            $statement->bindParam(':updateDate', $client->getUpdateDate());
            $statement->bindParam(':user', $client->getUser());

            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getToUuid(string $uuid):ClientModel
    {

        try {
            $statement = $this->pdo->prepare("Select * From client Where uuid = :uuid");
            $statement->bindParam(':uuid', $uuid);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_FIRST);

            return $this->formarObjeto($result);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update(ClientModel $client)
    {
        try {

            $statement = $this->pdo->prepare("update client 
                                                 set cnpj=:cnpj
                                                   , name=:name
                                                   , phone=:phone
                                                   , email=:email
                                                   , status=:status
                                                   , inputDate=:inputDate
                                                   , updateDate=:updateDate
                                                   , user=:user
                                               where uuid = :uuid");
           
            $statement->bindParam(':cnpj', $client->getCnpj());
            $statement->bindParam(':name', $client->getName());
            $statement->bindParam(':phone', $client->getPhone());
            $statement->bindParam(':email', $client->getEmail());
            $statement->bindParam(':status', $client->getStatus());
            $statement->bindParam(':inputDate', $client->getInputDate());
            $statement->bindParam(':updateDate', $client->getUpdateDate());
            $statement->bindParam(':user', $client->getUser());
            $statement->bindParam(':uuid', $client->getUuid());

            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
