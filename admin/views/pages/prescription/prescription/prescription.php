<?php 

print_r($data)



?>





<!-- Custom CSS for A4 Page Print Optimization -->
<style>
@media print {
  /* AdminLTE Er layout overflow content control abong sidebar/header hide */
  body, .app-wrapper, .app-main, .app-content, .container-fluid {
    background: none !important;
    background-color: #fff !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow: visible !important;
  }

  /* AdminLTE components globally block out korar jonno layout tags targeting */
  .app-sidebar, .app-header {
    display: none !important;
  }

  /* Prescription Wrapper Card padding and shadow configuration for professional pad */
  .card {
    border: none !important;
    box-shadow: none !important;
    margin: 0 !important;
    padding: 0 !important;
    width: 100% !important;
  }
  
  .card-body {
    padding: 0 !important;
  }

  /* Force table layouts structure properly */
  .table-responsive {
    border: none !important;
    box-shadow: none !important;
    overflow: visible !important;
  }

  /* Target exact elements by global helper and template specific triggers */
  .btn_clear, .add_cart, .medicine-select-wrapper, select {
    display: none !important;
  }

  /* A4 Scale Definition */
  @page {
    size: A4;
    margin: 15mm;
  }
}
</style>

<main class="app-main py-3">
  <div class="app-content-header d-print-none mb-3">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 text-body-emphasis fw-semibold">Doctor Prescription</h3>
        </div>
        <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
          <div class="float-sm-end">
            <button onclick="window.print();" class="btn btn-primary btn-sm me-1">
              <i class="bi bi-printer me-1"></i> Print
            </button>
            <button class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-download me-1"></i> PDF
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card shadow-sm border-0">
        <div class="card-body p-4 p-md-5">

          <div class="row align-items-center border-bottom pb-4 mb-4">
            <div class="col-lg-8 invoice-col">
              <h3 class="fw-bold text-body-emphasis mb-1">Dr. Sirajee Shafiqul Islam</h3>
              <p class="mb-1 text-secondary fw-semibold">MBBS, MD (Neuromedicine), FINR</p>
              <p class="mb-1 text-body-secondary small">Clinical Fellow, Medanta Institute of Neuroscience (India)</p>
              <p class="mb-1 text-body-secondary small">Visiting Fellow, Alfried Krupp Hospital (Germany)</p>
              <p class="mb-1 text-body-secondary small">Advanced Training, Lausanne University Hospital (Switzerland)</p>
              <p class="mb-1 text-body-secondary small">Stroke & Endovascular Neurologist</p>
              <p class="mb-1 text-secondary small">Associate Professor</p>
              <p class="mb-1 text-secondary small">National Institute of Neurosciences & Hospital, Dhaka, Bangladesh</p>
            </div>

            <div>
                <input  class="consultation_id"  type="text"   value="<?php echo  $consultation->id  ?>">
                <input  class="doctor_id"  type="text"   value="<?php echo  $doctor->id  ?>">
                <input  class="patient_id"  type="text"   value="<?php echo  $patients->id  ?>">
            </div>

            <div class="col-lg-4 text-left">
              <table class="table table-borderless table-sm mb-0 float-lg-start" style="max-width: 280px;">
                <tr>
                  <th width="45%" class="text-start pe-2 text-secondary fw-normal">Patient ID:</th>
                  <td class="text-start fw-bold text-body-emphasis">PT-00000001</td>
                </tr>
                <tr>
                  <th width="45%" class="text-start pe-2 text-secondary fw-normal">Prescription:</th>
                  <td class="text-start fw-bold text-body-emphasis">RX-20260001</td>
                </tr>
                <tr>
                  <th class="text-start pe-2 text-secondary fw-normal">Visit No:</th>
                  <td class="text-start">#15</td>
                </tr>
                <tr>
                  <th class="text-start pe-2 text-secondary fw-normal">Date:</th>
                  <td class="text-start">05 Jul 2026</td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row border-bottom pb-3 mb-4 g-2 invoice-info small text-body-secondary">
            <div class="col-md-6 invoice-col"><strong class="text-body-emphasis">Patient Name:</strong> Mr. Hasan</div>
            <div class="col-md-2 invoice-col"><strong class="text-body-emphasis">Age:</strong> 25 Years</div>
            <div class="col-md-2 invoice-col"><strong class="text-body-emphasis">Gender:</strong> Male</div>
            <div class="col-md-2 invoice-col"><strong class="text-body-emphasis">Mobile:</strong> 017XXXXXXXX</div>
          </div>

          <div class="row g-4">
            <div class="col-lg-3 border-end-md">

              <section class="mb-4">
                <h6 class="text-body-emphasis fw-bold border-bottom pb-2 mb-2">Chief Complaint</h6>
                <!-- <ul class="list-unstyled small text-secondary mb-0">
                  <li class="mb-1"><i class="bi bi-dot text-primary fs-5 align-middle"></i> Severe Headache</li>
                  <li class="mb-1"><i class="bi bi-dot text-primary fs-5 align-middle"></i> Neck Pain</li>
                  <li class="mb-1"><i class="bi bi-dot text-primary fs-5 align-middle"></i> Dizziness</li>
                  <li><i class="bi bi-dot text-primary fs-5 align-middle"></i> Left Hand Numbness</li>
                </ul> -->

                 <textarea class="cc"></textarea>
              </section>

              <section class="mb-4">
                <h6 class="text-body-emphasis fw-bold border-bottom pb-2 mb-2">Physical Examination</h6>
                <table class="table table-sm table-borderless mb-0 small text-secondary">
                  <tr>
                    <td>BP</td>
                    <td class="text-end fw-bold text-body-emphasis">120/80</td>
                  </tr>
                  <tr>
                    <td>Pulse</td>
                    <td class="text-end fw-bold text-body-emphasis">78 bpm</td>
                  </tr>
                  <tr>
                    <td>Weight</td>
                    <td class="text-end fw-bold text-body-emphasis">65 Kg</td>
                  </tr>
                  <tr>
                    <td>Temperature</td>
                    <td class="text-end fw-bold text-body-emphasis">98.4°F</td>
                  </tr>
                  <tr>
                    <td>Height</td>
                    <td class="text-end fw-bold text-body-emphasis">5'6"</td>
                  </tr>
                </table>
              </section>

              <section class="mb-4 mb-lg-0">
                <h6 class="text-body-emphasis fw-bold border-bottom pb-2 mb-2">Advice</h6>
                <ul class="list-unstyled small text-secondary mb-0">
                  <!-- <li class="mb-1"><i class="bi bi-arrow-right-short text-primary"></i> Take medicine regularly.</li>
                  <li class="mb-1"><i class="bi bi-arrow-right-short text-primary"></i> Drink plenty of water.</li>
                  <li class="mb-1"><i class="bi bi-arrow-right-short text-primary"></i> Adequate sleep.</li>
                  <li class="mb-1"><i class="bi bi-arrow-right-short text-primary"></i> Avoid stress.</li>
                  <li><i class="bi bi-arrow-right-short text-primary"></i> Follow-up after 30 days.</li> -->

                  <textarea class="advice"></textarea>
                </ul>
              </section>
            </div>

            <div class="col-lg-9">
              <div class="ps-lg-3">
                <div class="d-flex align-items-center pb-2 mb-3">
                  <h1 class="display-4 text-primary fw-bold me-3 mb-0" style="font-family: serif; line-height: 1;">℞</h1>
                </div>

                <div class="table-responsive border rounded shadow-sm">
                  <table class="table table-striped align-middle mb-0">
                    <thead class="table-light text-body-emphasis fw-bold border-bottom">
                      <tr>
                        <th style="width: 35%;" class="ps-3 py-2">Medicine</th>
                        <th style="width: 15%;" class="text-center py-2">Dose</th>
                        <th style="width: 15%;" class="text-center py-2">Duration</th>
                        <th style="width: 20%;" class="ps-3 py-2">Instruction</th>
                        <th style="width: 15%;" class="text-center py-2 ">
                          <button class="btn btn-warning btn-xs text-dark btn_clear">Clear All</button>
                        </th>
                      </tr>
                      <!-- Added d-print-none to fully exclude inputs from compilation page views -->
                      <tr class="table-group-divider align-top d-print-none">
                        <th class="ps-3 py-2">
                          <div class="medicine-select-wrapper">
                            <?php echo Medicine::html_select("medicine_id"); ?>
                          </div>
                        </th>
                        <th class="py-2">
                          <?php echo Dose::html_select("dose_id"); ?>
                        </th>
                        <th class="py-2">
                          <?php echo Duration::html_select("duration_id"); ?>
                        </th>
                        <th class="py-2">
                          <?php echo Instruction::html_select("insturction_id"); ?>
                        </th>
                        <th class="text-center py-2">
                          <button class="btn btn-success btn-sm w-100 add_cart">
                            <i class="bi bi-plus-lg me-1"></i>Add
                          </button>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="prescription_body">
                      <!-- Initial Static row inside tbody (For reference before JS compilation loads) -->
                      <tr>
                        <td class="ps-3 py-3">
                          <strong class="text-body-emphasis">1. Napa 500 mg</strong><br>
                          <small class="text-body-secondary">Paracetamol</small>
                        </td>
                        <td class="text-center fw-semibold text-secondary">1+1+1</td>
                        <td class="text-center text-body-secondary">7 Days</td>
                        <td class="ps-3">
                          <span class="badge bg-secondary-subtle text-secondary border px-2 py-1 small">After Food</span>
                        </td>
                        <td class="text-center d-print-none">
                          <button class="btn btn-sm btn-outline-danger py-1 px-2"><i class="bi bi-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-5 pt-4 mx-0 px-4">
            <div class="col-sm-5 ms-auto text-center invoice-col">
              <div style="height:60px;">
                <!-- <img src="assets/img/signature.png" class="img-fluid h-100" style="max-height:60px;" alt="Signature"> -->
                 <button class="btn btn-success btn_process">Process</button>
              </div>
              <hr class="my-2">
              <h5 class="fw-bold text-body-emphasis mb-1">Dr. Sirajee Shafiqul Islam</h5>
              <p class="mb-1 text-secondary small">Stroke & Endovascular Neurologist</p>
              <small class="text-secondary text-uppercase" style="font-size: 10px; letter-spacing: 0.5px;">Signature & Official Seal</small>
            </div>
          </div>

          <div class="border-top mt-5 pt-4 mx-4">
            <div class="row g-4 invoice-info small text-secondary">
              <div class="col-sm-5 invoice-col">
                <h6 class="fw-bold text-body-emphasis mb-2">Chamber Information</h6>
                <p class="mb-1 fw-semibold text-body-emphasis">Bangladesh Specialized Hospital PLC.</p>
                <p class="mb-1">21 Shyamoli, Mirpur Road</p>
                <p class="mb-1">Dhaka-1207, Bangladesh</p>
              </div>
              <div class="col-sm-4 invoice-col">
                <h6 class="fw-bold text-body-emphasis mb-2">Visiting Hours</h6>
                <p class="mb-1">Saturday - Thursday</p>
                <p class="mb-1 text-body-emphasis fw-semibold">6:00 PM - 9:00 PM</p>
                <p class="mb-1 text-danger fw-medium">Friday: Closed</p>
              </div>
              <div class="col-lg-3 invoice-col">
                <h6 class="fw-bold text-body-emphasis mb-2">Contact</h6>
                <p class="mb-1">+88017XXXXXXXX</p>
                <p class="mb-1">sirajee.neuro@gmail.com</p>
                <p class="mb-0">www.yourclinic.com</p>
              </div>
            </div>
          </div>

          <div class="border-top mt-4 pt-3 mx-4 mb-4">
            <div class="d-flex flex-column flex-sm-row justify-content-between small text-secondary text-center text-sm-start gap-2">
              <span>Prescription ID: <strong class="text-body-emphasis">#RX-20260001</strong></span>
              <span>Generated by faisalwebapp.com</span>
              <span>Printed: <strong><?= date('d M Y h:i A'); ?></strong></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<script>
$(function(){
  let prescription = new Cart("prescription");
  printCart();

  $(".table select").addClass("form-select form-select-sm");

  $(".add_cart").click(function(){
    let medicine_id = $("#medicine_id").val(); 
    let medicine_name = $("#medicine_id option:selected").text(); 

    let dose_id = $("#dose_id").val(); 
    let dose_name = $("#dose_id option:selected").text();

    let duration_id = $("#duration_id").val(); 
    let duration_name = $("#duration_id option:selected").text();

    let insturction_id = $("#insturction_id").val(); 
    let insturction_name = $("#insturction_id option:selected").text();

    let item = {
         id: medicine_id,
         medicine_name,
         dose_id,
         dose_name,
         insturction_id,
         insturction_name,
         duration_id,
         duration_name
    }

    prescription.AddItem(item);
    printCart();
  });

  function printCart(){
     let pres = prescription.getData() ?? [];
     let html = "";
     
     pres.forEach((item, i)=>{
       html += `
         <tr>
           <td class="ps-3 py-3">
             <strong class="text-body-emphasis">${item.medicine_name}</strong><br>
             <small class="text-secondary">Paracetamol</small>
           </td>
           <td class="text-center fw-semibold text-secondary">${item.dose_name}</td>
           <td class="text-center text-body-secondary">${item.duration_name}</td>
           <td class="ps-3">
             <span class="badge bg-secondary-subtle text-secondary border px-2 py-1 small">${item.insturction_name}</span>
           </td>
           <!-- Added d-print-none explicitly on dynamic rows generation mapping -->
           <td class="text-center d-print-none">
             <button data-id='${item.id}' class="btn btn-xs btn-outline-danger del px-2 py-1">
               <i class="bi bi-trash"></i> Remove
             </button>
           </td>
         </tr>`;
     });

     $(".prescription_body").html(html);
  }


   $("body").on("click", ".del", function(){
     let itemId= $(this).data("id")
      prescription.delItem(itemId);
      printCart();
   })

   $(".btn_process").on("click", function(){
       
     let consultation_id= $(".consultation_id").val();
     let doctor_id= $(".doctor_id").val();
     let patient_id= $(".patient_id").val();
     let additional_notes= $(".advice").val();
     let cc= $(".cc").val();
     let medicine= prescription.getData()

     let data={
      consultation_id,
      doctor_id,
      patient_id,
      additional_notes,
      cc,
      medicine
     }

     console.log(data);

     $.ajax({
      url:"<?php echo $base_url?>/api/prescription/processprescription",
      method:"post",
      data:{  
      consultation_id,
      doctor_id,
      patient_id,
      additional_notes,
      cc,
      medicine},
      success:function(res){
        console.log(res);
        
      },
      error: function(err){
          console.log(err); 
      }
     });
     

   })


});


</script>