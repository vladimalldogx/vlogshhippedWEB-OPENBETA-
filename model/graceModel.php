<?php

require 'db/dbhelper.php';


Class Student extends DBHelper{
    private $table = 'fnatic';
    private $fields = array(
        'pr_id',
        'p_id',
        'receipt_no',
        'item_desc',
        'user_id',
        'lname',
        'user_type',
        'amount',
        'date_purchases',
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
     return DBHelper::getRecordById($this->table,'pr_id',$ref_id);
 }
 function getStud($ref_id){
     return DBHelper::getRecord($this->table.' s','s.pr_id',$ref_id);
 }
// Update
function updateStud($data,$ref_id){
    return DBHelper::updateRecord($this->table.' s',$this->fields,$data,'s.pr_id',$ref_id); 
 }
 // Delete
 function deleteStud($ref_id){
          return DBHelper::deleteRecord($this->table,'pr_id',$ref_id);
}
// Some Functions
      function getStudentDepts($data){
        return DBHelper::getByRelation('sample s, '.$this->table.' d','d.pr_id','s.pr_id',$data);
    }
    function getCountStud(){
        return DBHelper::countRecord('pr_id',$this->table);
    }
}
