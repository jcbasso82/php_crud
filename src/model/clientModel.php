<?php
class clientModel 
{
   private string $uuid;
   private string $cnpj;
   private string $name;
   private string $phone;
   private string $email;
   private string $status;
   private string $inputDate;
   private string $updateDate;
   private string $user;


   public function setUuid(string $uuid){
    $this->uuid = $uuid;
   }

   public function setCnpj(string $cnpj){
    $this->cnpj = $cnpj;
   }

   public function setName(string $name){
    $this->name = $name;
   }

   public function setPhone(string $phone){
    $this->phone = $phone;
   }

   public function setEmail(string $email){
    $this->email = $email;
   }

   public function setStatus(string $status){
    $this->status = $status;
   }

   public function setInputDate(string $inputDate){
    $this->inputDate = $inputDate;
   }

   public function setUpdateDate(string $updateDate){
    $this->updateDate = $updateDate;
   }

   public function setUser(string $user){
    $this->user = $user;
   }


   public function getUuid():string{
    return $this->uuid;
   }

   public function getCnpj():string{
    return $this->cnpj;
   }

   public function getName():string{
    return $this->name;
   }

   public function getPhone():string{
    return $this->phone;
   }

   public function getEmail():string{
    return $this->email;
   }

   public function getStatus():string{
    return $this->status;
   }

   public function getInputDate():string{
    return $this->inputDate;
   }

   public function getUpdateDate():string{
    return $this->updateDate;
   }

   public function getUser():string{
    return $this->user;
   }

}
