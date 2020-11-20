<?php

require 'db/dbhelper.php';


Class Student extends DBHelper{
    private $table = 'susbs';
    private $fields = array(
        'sub_id',
        'plan_id',
        'user_id',
        'user_lname',
        'subscription_type',
        'date_started',
        'date_due',
        'status',
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
     return DBHelper::getRecordById($this->table,'sub_id',$ref_id);
 }
 function getStud($ref_id){
     return DBHelper::getRecord($this->table.' s','s.sub_id',$ref_id);
 }
// Update
function updateStud($data,$ref_id){
    return DBHelper::updateRecord($this->table.' s',$this->fields,$data,'s.sub_id',$ref_id); 
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'sub_id',$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.sub_id','s.sub_id',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('sub_id',$this->table);
    }
}
