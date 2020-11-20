<?php

require 'db/dbhelper.php';


Class Student extends DBHelper{
    private $table = 'report';
    private $fields = array(
        'report_id',
        'user_id',
        'lname',
        'fname',
        'user_type',
        'email',
        'password',
        'date_created',
        
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
     return DBHelper::getRecordById($this->table,'report_id',$ref_id);
 }
 function getStud($ref_id){
     return DBHelper::getRecord($this->table.' s','s.report_id',$ref_id);
 }
// Update
function updateStud($data,$ref_id){
    return DBHelper::updateRecord($this->table.' s',$this->fields,$data,'s.report_id',$ref_id); 
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'report_id',$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.report_id','s.report_id',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('report_id',$this->table);
    }
}
