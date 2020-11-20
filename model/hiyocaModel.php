<?php

require 'db/dbhelper.php';


Class Student extends DBHelper{
    private $table = 'blyat';
    private $fields = array(
        'content_name',
        'spons_lname',
        'company_lname',
        'ratings',
        'date',
    );
//constructor
    function __construct(){
        return DBHelper::__construct();
    }
// Create
function addStud($data){
    return DBHelper::insertRecord($data,$this->fields,$this->table); 
 }
// Retreive
 function getAllStud(){
     return DBHelper::getAllRecord($this->table);
 }
 function getStudById($ref_id){
     return DBHelper::getRecordById($this->table,'content_name',$ref_id);
 }
 function getStud($ref_id){
     return DBHelper::getRecord($this->table.' s','s.content_name',$ref_id);
 }
// Update
function updateStud($data,$ref_id){
    return DBHelper::updateRecord($this->table.' s',$this->fields,$data,'s.content_name',$ref_id); 
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'content_name',$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.content_name','s.content_name',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('content_name',$this->table);
    }
}
