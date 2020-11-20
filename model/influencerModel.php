<?php

require 'db/dbhelper.php';


Class Student extends DBHelper{
    private $table = 'dick';
    private $fields = array(
        'user_id',
        'fname',
        'lname',
        'user_type',
        'ratings',
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
     return DBHelper::getRecordById($this->table,'user_id',$ref_id);
 }
 function getStud($ref_id){
     return DBHelper::getRecord($this->table.' s','s.user_id',$ref_id);
 }
// Update
function updateStud($data,$ref_id){
    return DBHelper::updateRecord($this->table.' s',$this->fields,$data,'s.user_id',$ref_id); 
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'user_id',$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.user_id','s.user_id',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('user_id',$this->table);
    }
}
