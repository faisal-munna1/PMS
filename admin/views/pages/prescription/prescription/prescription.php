<?php 
// ব্যাকএন্ড ডেটা বাইন্ডিং এবং ফলব্যাক ডিফাইন
$patient_name = isset($patients->name) ? htmlspecialchars($patients->name) : 'Mr. Hasan';
$patient_age  = isset($patients->age) ? htmlspecialchars($patients->age) : '25 Years';
$patient_gender = isset($patients->gender) ? htmlspecialchars($patients->gender) : 'Male';
$patient_mobile = isset($patients->mobile) ? htmlspecialchars($patients->mobile) : '017XXXXXXXX';
$rx_id = isset($prescription->rx_number) ? htmlspecialchars($prescription->rx_number) : 'RX-20260001';
$visit_no = isset($consultation->visit_number) ? htmlspecialchars($consultation->visit_number) : '#15';
$date_prescribed = isset($consultation->created_at) ? date('d M Y', strtotime($consultation->created_at)) : '05 Jul 2026';
?>

<style>
@media print {
  /* AdminLTE v4 layout wrappers reset */
  body, .app-wrapper, .app-main, .app-content, .container-fluid {
    background: none !important;
    background-color: #fff !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow: visible !important;
  }

  /* AdminLTE v4 sidebar, header এবং অ্যাকশন বাটন হাইড */
  .app-sidebar, .app-header, .d-print-none, .btn_clear, .add_cart, .medicine-select-wrapper, select, .btn_process {
    display: none !important;
  }

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

  .table-responsive {
    border: none !important;
    box-shadow: none !important;
    overflow: visible !important;
  }

  /* প্রিন্ট মোডে টেক্সট-এরিয়া বর্ডার ও স্ক্রলবার হাইড করার জন্য */
  .form-control-plaintext {
    border: none !important;
    resize: none !important;
    background: transparent !important;
    padding: 0 !important;
    overflow: hidden !important;
  }

  @page {
    size: A4;
    margin: 15mm;
  }
}
</style>

<main class="app-main py-4">
  <div class="app-content-header d-print-none mb-4">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 text-body-emphasis fw-semibold">Doctor Prescription</h3>
        </div>
        <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
          <div class="btn-group shadow-sm">
            <button onclick="window.print();" class="btn btn-primary btn-sm">
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
      <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-body p-4 p-md-5">

          <div class="row align-items-center border-bottom pb-4 mb-4 g-3">
            <div class="col-lg-8">
              <h3 class="fw-bold text-primary mb-1">Dr. Sirajee Shafiqul Islam</h3>
              <p class="mb-1 text-body-emphasis fw-semibold fs-6">MBBS, MD (Neuromedicine), FINR</p>
              <div class="text-secondary small lh-sm">
                <p class="mb-1"><i class="bi bi-patch-check text-primary me-1"></i> Clinical Fellow, Medanta Institute of Neuroscience (India)</p>
                <p class="mb-1"><i class="bi bi-patch-check text-primary me-1"></i> Visiting Fellow, Alfried Krupp Hospital (Germany)</p>
                <p class="mb-1"><i class="bi bi-patch-check text-primary me-1"></i> Advanced Training, Lausanne University Hospital (Switzerland)</p>
                <p class="mb-1 fw-medium text-body-emphasis">Stroke & Endovascular Neurologist</p>
                <p class="mb-1">Associate Professor</p>
                <p class="mb-0">National Institute of Neurosciences & Hospital, Dhaka, Bangladesh</p>
              </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-lg-end">
              <table class="table table-sm table-borderless mb-0 w-100" style="max-width: 280px;">
                <tr>
                  <th width="45%" class="text-start pe-2 text-secondary fw-normal">Patient ID:</th>
                  <td class="text-start fw-bold text-body-emphasis"><?= isset($patients->patient_code) ? htmlspecialchars($patients->patient_code) : 'PT-00000001'; ?></td>
                </tr>
                <tr>
                  <th width="45%" class="text-start pe-2 text-secondary fw-normal">Prescription:</th>
                  <td class="text-start fw-bold text-body-emphasis"><?= $rx_id; ?></td>
                </tr>
                <tr>
                  <th class="text-start pe-2 text-secondary fw-normal">Visit No:</th>
                  <td class="text-start text-body-secondary"><?= $visit_no; ?></td>
                </tr>
                <tr>
                  <th class="text-start pe-2 text-secondary fw-normal">Date:</th>
                  <td class="text-start text-body-secondary"><?= $date_prescribed; ?></td>
                </tr>
              </table>
              
              <div>
                <input hidden class="consultation_id" type="text" value="<?php echo isset($consultation->id) ? $consultation->id : ''; ?>">
                <input hidden class="doctor_id" type="text" value="<?php echo isset($doctor->id) ? $doctor->id : ''; ?>">
                <input hidden class="patient_id" type="text" value="<?php echo isset($patients->id) ? $patients->id : ''; ?>">
              </div>
            </div>
          </div>

          <div class="row border-bottom pb-3 mb-4 g-3 bg-light rounded-2 py-2 mx-0 small text-body-secondary">
            <div class="col-md-6"><strong class="text-body-emphasis">Patient Name:</strong> <?= $patient_name; ?></div>
            <div class="col-md-2"><strong class="text-body-emphasis">Age:</strong> <?= $patient_age; ?></div>
            <div class="col-md-2"><strong class="text-body-emphasis">Gender:</strong> <?= $patient_gender; ?></div>
            <div class="col-md-2"><strong class="text-body-emphasis">Mobile:</strong> <?= $patient_mobile; ?></div>
          </div>

          <div class="row g-4">
            <div class="col-lg-3 border-end-lg">
              <section class="mb-4">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Chief Complaint</h6>
                <textarea class="form-control form-control-plaintext cc" rows="3" placeholder="Type complaints here..."></textarea>
              </section>

              <section class="mb-4">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Physical Examination</h6>
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
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Advice</h6>
                <textarea class="form-control form-control-plaintext advice" rows="4" placeholder="Type lifestyle advice..."></textarea>
              </section>
            </div>

            <div class="col-lg-9">
              <div class="ps-lg-3">
                <div class="d-flex align-items-center pb-2 mb-3">
                  <h1 class="display-4 text-primary fw-bold me-3 mb-0" style="font-family: serif; line-height: 1;">℞</h1>
                </div>

                <div class="table-responsive border rounded shadow-sm">
                  <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-body-emphasis fw-bold border-bottom">
                      <tr>
                        <th style="width: 35%;" class="ps-3 py-2">Medicine</th>
                        <th style="width: 15%;" class="text-center py-2">Dose</th>
                        <th style="width: 15%;" class="text-center py-2">Duration</th>
                        <th style="width: 20%;" class="ps-3 py-2">Instruction</th>
                        <th style="width: 15%;" class="text-center py-2">
                          <button class="btn btn-outline-danger btn-xs btn_clear d-print-none">Clear All</button>
                        </th>
                      </tr>
                      <tr class="table-group-divider align-top d-print-none bg-light-subtle">
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
                          <?php echo Instruction::html_select("instruction_id"); ?>
                        </th>
                        <th class="text-center py-2">
                          <button class="btn btn-primary btn-sm w-100 add_cart">
                            <i class="bi bi-plus-lg me-1"></i>Add
                          </button>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="prescription_body">
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-5 pt-4 mx-0 px-4">
            <div class="col-sm-5 ms-auto text-center">
              <div style="height:60px;" class="d-flex align-items-center justify-content-center">
                 <button class="btn btn-success btn-sm btn_process shadow-sm d-print-none"><i class="bi bi-check-circle me-1"></i> Save & Process</button>
              </div>
              <hr class="my-2">
              <h6 class="fw-bold text-body-emphasis mb-1">Dr. Sirajee Shafiqul Islam</h6>
              <p class="mb-1 text-secondary small">Stroke & Endovascular Neurologist</p>
              <small class="text-muted text-uppercase" style="font-size: 9px; letter-spacing: 0.5px;">Signature & Official Seal</small>
            </div>
          </div>

          <div class="border-top mt-5 pt-4 mx-4">
            <div class="row g-4 small text-secondary">
              <div class="col-sm-5">
                <h6 class="fw-bold text-body-emphasis mb-2"><i class="bi bi-building text-primary me-1"></i> Chamber Information</h6>
                <p class="mb-1 fw-semibold text-body-emphasis">Bangladesh Specialized Hospital PLC.</p>
                <p class="mb-1">21 Shyamoli, Mirpur Road, Dhaka-1207</p>
              </div>
              <div class="col-sm-4">
                <h6 class="fw-bold text-body-emphasis mb-2"><i class="bi bi-clock text-primary me-1"></i> Visiting Hours</h6>
                <p class="mb-1">Saturday - Thursday (6:00 PM - 9:00 PM)</p>
                <p class="mb-1 text-danger fw-medium">Friday: Closed</p>
              </div>
              <div class="col-lg-3">
                <h6 class="fw-bold text-body-emphasis mb-2"><i class="bi bi-telephone text-primary me-1"></i> Contact</h6>
                <p class="mb-1">+88017XXXXXXXX</p>
                <p class="mb-0">sirajee.neuro@gmail.com</p>
              </div>
            </div>
          </div>

          <div class="border-top mt-4 pt-3 mx-4 mb-2">
            <div class="d-flex flex-column flex-sm-row justify-content-between small text-muted text-center text-sm-start gap-2" style="font-size: 11px;">
              <span>Prescription ID: <strong class="text-body-emphasis">#<?= $rx_id; ?></strong></span>
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

  // AdminLTE v4 / Bootstrap 5 Form Elements Class Injector
  $(".table select").addClass("form-select form-select-sm shadow-sm");

  $(".add_cart").click(function(){
    let medicine_id = $("#medicine_id").val(); 
    let medicine_name = $("#medicine_id option:selected").text(); 

    let dose_id = $("#dose_id").val(); 
    let dose_name = $("#dose_id option:selected").text();

    let duration_id = $("#duration_id").val(); 
    let duration_name = $("#duration_id option:selected").text();

    let instruction_id = $("#instruction_id").val(); 
    let instruction_name = $("#instruction_id option:selected").text();

    if(!medicine_id) {
       alert("Please select a medicine first");
       return;
    }

    let item = {
         id: medicine_id,
         medicine_name,
         dose_id,
         dose_name,
         instruction_id,
         instruction_name,
         duration_id,
         duration_name
    }

    prescription.AddItem(item);
    printCart();
  });

  function printCart(){
     let pres = prescription.getData() ?? [];
     let html = "";
     
     if(pres.length === 0) {
       html = `<tr><td colspan="5" class="text-center text-muted py-4 fs-7">No medicines added to prescription layout yet.</td></tr>`;
     } else {
       pres.forEach((item, i)=>{
         html += `
           <tr>
             <td class="ps-3 py-3">
               <strong class="text-body-emphasis">${i + 1}. ${item.medicine_name}</strong>
             </td>
             <td class="text-center fw-semibold text-secondary">${item.dose_name}</td>
             <td class="text-center text-body-secondary">${item.duration_name}</td>
             <td class="ps-3">
               <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">${item.instruction_name}</span>
             </td>
             <td class="text-center d-print-none">
               <button data-id='${item.id}' class="btn btn-sm btn-outline-danger del py-1 px-2">
                 <i class="bi bi-trash"></i>
               </button>
             </td>
           </tr>`;
       });
     }

     $(".prescription_body").html(html);
  }

  $("body").on("click", ".del", function(){
     let itemId = $(this).data("id");
     prescription.delItem(itemId);
     printCart();
  });

  $(".btn_clear").on("click", function(){
     if(confirm("Are you sure you want to clear all fields?")) {
        prescription.clearCart(); 
        printCart();
     }
  });

  $(".btn_process").on("click", function(){
     let consultation_id = $(".consultation_id").val();
     let doctor_id = $(".doctor_id").val();
     let patient_id = $(".patient_id").val();
     let additional_notes = $(".advice").val();
     let cc = $(".cc").val();
     let medicine = prescription.getData();

     $.ajax({
       url: "<?php echo $base_url?>/api/prescription/processprescription",
       method: "post",
       data: {  
         consultation_id,
         doctor_id,
         patient_id,
         additional_notes,
         cc,
         medicine
       },
       success: function(res){
         alert("Prescription generated successfully!");
         console.log(res);
       },
       error: function(err){
         console.log(err); 
       }
     });
  });
});
</script>