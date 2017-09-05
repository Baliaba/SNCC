<?php
class Composant_Entity 
{
   private $_id_composant;
   private $_Nom_Composant;
   private $_Date_MiseEnService_composant;
   private $_Stock_Initial_composant;
   private $_Sous_Systeme_id;
   
   public function __construct(array $donnees) {
       $this->hydrate($donnees);
   }
   function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            $method ='set_'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
             
            }            
        }
    }
   //getter and setters
   function get_id_composant() {
       return $this->_id_composant;
   }

   function get_Nom_Composant() {
       return $this->_Nom_Composant;
   }

   function get_Date_MiseEnService_composant() {
       return $this->_Date_MiseEnService_composant;
   }

   function get_Stock_Initial_composant() {
       return $this->_Stock_Initial_composant;
   }

   function get_Sous_Systeme_id() {
       return $this->_Sous_Systeme_id;
   }

   function set_id_composant($_id_composant) {
       $this->_id_composant = $_id_composant;
   }

   function set_Nom_Composant($_Nom_Composant) {
       $this->_Nom_Composant = $_Nom_Composant;
   }

   function set_Date_MiseEnService_composant($_Date_MiseEnService_composant) {
       $this->_Date_MiseEnService_composant = $_Date_MiseEnService_composant;
   }

   function set_Stock_Initial_composant($_Stock_Initial_composant) {
       $this->_Stock_Initial_composant = $_Stock_Initial_composant;
   }

   function set_Sous_Systeme_id($_Sous_Systeme_id) {
       $this->_Sous_Systeme_id = $_Sous_Systeme_id;
   }
}