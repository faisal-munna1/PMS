<?php 

class PrescriptionApi{

 function index(){
   echo json_encode(["success"=>"api is working"]);
 }
 function processPrescription(){
   global $db;

   try {
  
   $db->begin_transaction();
  $prescription= new Prescription();
  $prescription->consultation_id= $_POST["consultation_id"];
  $prescription->doctor_id= $_POST["doctor_id"];
  $prescription->patient_id= $_POST["patient_id"];
  $prescription->prescription_date= date("Y-m-d H:i:s");
//   $prescription->additional_notes= $_POST["additional_notes"];
//   $prescription->cc= $_POST["cc"];
  $prescription_id = $prescription->create();

  $medicines= array_map( fn($d)=> (object) $d,$_POST['medicine']);

  foreach ( $medicines as $key =>  $medicine) {
  
   
   $pres_medicine= new PrescriptionMedicine();
   $pres_medicine->prescription_id=  $prescription_id;
   $pres_medicine->medicine_id= $medicine->id;
   $pres_medicine->dose_id= $medicine->dose_id;
   $pres_medicine->duration_id= $medicine->duration_id;
   $pres_medicine->instruction_id= $medicine->insturction_id;
   $pres_medicine->create();

  }
  
  $db->commit();
  echo json_encode(["success"=> "successfully created"]);

   } catch (\Throwable $th) {
     $db->rollback();
     echo json_encode(["error"=>$th->getMessage()]);
   }
 }

}

?>

