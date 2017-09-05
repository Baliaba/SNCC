<?php
class Suivi_Equip_Entity 
{    
    private $_id_suiviE;
    private $_function_suiviE;
    private $_date_defaill_suiviE;
    private  $_nature_deffaill_suivie;
    private $_cause_defaill_suiviE;
    private $_effet_suiviE;
    private $_detection_suiviE;
    private $_code_erreur_suiviE;
    private $_action_curative_suiviE;
    private  $_nom_intervenant_suiviE;
    private $_id_composant_suiviE;
    private $_id_user_suiviE;
    private $_date_remise_en_service_suiviE;

        //constructeur
    public function __construct($id,$fonction,$date,$nature,$cause,$effet,
            $detection,$code,$action,$nom_intervenant,$id_compos,$id_user,$date_remise_en_service) {
       
        $this->set_id_suiviE($id);
        $this->set_function_suiviE($fonction);
        $this->set_date_defaill_suiviE($date);
        $this->set_nature_deffaill_suivie($nature);
        $this->set_cause_defaill_suiviE($cause);
        $this->set_effet_suiviE($effet);
        $this->set_detection_suiviE($detection);
        $this->set_code_erreur_suiviE($code);
        $this->set_action_curative_suiviE($action);
        $this->set_nom_intervenant_suiviE($nom_intervenant);
        $this->set_id_user_suiviE($id_user);
        $this->set_id_composant_suiviE($id_compos);
        $this->set_date_remise_en_service_suiviE($date_remise_en_service);
    }

    //getters and setters
    function get_id_suiviE() {
        return $this->_id_suiviE;
    }

    function get_function_suiviE() {
        return $this->_function_suiviE;
    }

    function get_date_defaill_suiviE() {
        return $this->_date_defaill_suiviE;
    }

    function get_nature_deffaill_suivie() {
        return $this->_nature_deffaill_suivie;
    }

    function get_cause_defaill_suiviE() {
        return $this->_cause_defaill_suiviE;
    }

    function get_effet_suiviE() {
        return $this->_effet_suiviE;
    }

    function get_detection_suiviE() {
        return $this->_detection_suiviE;
    }

    function get_code_erreur_suiviE() {
        return $this->_code_erreur_suiviE;
    }

    function get_action_curative_suiviE() {
        return $this->_action_curative_suiviE;
    }

    function get_nom_intervenant_suiviE() {
        return $this->_nom_intervenant_suiviE;
    }

    function get_id_composant_suiviE() {
        return $this->_id_composant_suiviE;
    }

    function get_id_user_suiviE() {
        return $this->_id_user_suiviE;
    }

    function set_id_suiviE($_id_suiviE) {
        $this->_id_suiviE = $_id_suiviE;
    }

    function set_function_suiviE($_function_suiviE) {
        $this->_function_suiviE = $_function_suiviE;
    }

    function set_date_defaill_suiviE($_date_defaill_suiviE) {
        $this->_date_defaill_suiviE = $_date_defaill_suiviE;
    }

    function set_nature_deffaill_suivie($_nature_deffeill_suivie) {
        $this->_nature_deffaill_suivie = $_nature_deffeill_suivie;
    }

    function set_cause_defaill_suiviE($_cause_defaill_suiviE) {
        $this->_cause_defaill_suiviE = $_cause_defaill_suiviE;
    }

    function set_effet_suiviE($_effet_suiviE) {
        $this->_effet_suiviE = $_effet_suiviE;
    }

    function set_detection_suiviE($_detection_suiviE) {
        $this->_detection_suiviE = $_detection_suiviE;
    }

    function set_code_erreur_suiviE($_code_erreur_suiviE) {
        $this->_code_erreur_suiviE = $_code_erreur_suiviE;
    }

    function set_action_curative_suiviE($_action_curative_suiviE) {
        $this->_action_curative_suiviE = $_action_curative_suiviE;
    }

    function set_nom_intervenant_suiviE($_nom_intervenant_suiviE) {
        $this->_nom_intervenant_suiviE = $_nom_intervenant_suiviE;
    }

    function set_id_composant_suiviE($_id_coposant_suiviE) {
        $this->_id_composant_suiviE = $_id_coposant_suiviE;
    }

    function set_id_user_suiviE($_id_user_suiviE) {
        $this->_id_user_suiviE = $_id_user_suiviE;
    }
    function get_date_remise_en_service_suiviE() {
        return $this->_date_remise_en_service_suiviE;
    }

    function set_date_remise_en_service_suiviE($_date_remise_en_service_suiviE) {
        $this->_date_remise_en_service_suiviE = $_date_remise_en_service_suiviE;
    }
}