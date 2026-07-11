<?php
// Auto-generate a unique Prescription Number
$current_date_string = date('Ymd');
$p_id = isset($patients->id) ? $patients->id : 0;
$c_id = isset($consultation->id) ? $consultation->id : 0;
$formatted_p_id = sprintf("%02d", $p_id);
$formatted_c_id = sprintf("%02d", $c_id);
$rx_id = "RX-" . $current_date_string . "-" . $formatted_p_id . "-" . $formatted_c_id;
?>

<style>
  .prescription-rx {
    font-family: Garamond, Georgia, serif;
    font-size: 2.8rem;
    line-height: 1;
  }

  .form-control-plaintext {
    outline: none;
    box-shadow: none !important;
  }

  textarea.form-control-plaintext {
    resize: none;
  }

  .vitals-table td {
    padding: 0.35rem 0;
  }
</style>

<main class="app-main py-4" id="">
  <div class="app-content-header d-print-none mb-4">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 text-body-emphasis fw-semibold">Doctor Prescription</h3>
        </div>
        <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
          <div class="btn-group shadow-sm">
            <button onclick="window.print();" class="btn btn-primary btn-sm">
              <i class="bi bi-printer me-1"></i> Print Layout
            </button>
            <button class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-download me-1"></i> Export PDF
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

          <div class="row align-items-start border-bottom pb-4 mb-4 g-3">
            <div class="col-md-7">
              <h2 class="fw-bold text-primary mb-1"><?= htmlspecialchars($doctor->name) ?></h2>
              <div class="text-secondary small">
                <div class="qualification" style="margin: 0px !important;">
                  <?= $doctor->qualification ?>
                </div>
              </div>
            </div>

            <div class="col-md-5 d-flex justify-content-md-end">
              <table class="table table-sm table-borderless mb-0 w-100 small text-secondary" style="max-width: 300px;">
                <tr>
                  <th width="45%" class="text-start fw-normal">Patient ID:</th>
                  <td class="text-start fw-bold text-dark"><?= isset($patients->patient_code) ? htmlspecialchars($patients->patient_code) : ''; ?></td>
                </tr>
                <tr>
                  <th class="text-start fw-normal">Prescription ID:</th>
                  <td class="text-start fw-bold text-dark">#<?= $rx_id; ?></td>
                </tr>
                <tr>
                  <th class="text-start fw-normal">Date:</th>
                  <td class="text-start text-dark fw-medium"><?= date('d F Y') ?></td>
                </tr>
              </table>

              <div>
                <input hidden class="consultation_id" type="text" value="<?= isset($consultation->id) ? $consultation->id : ''; ?>">
                <input hidden class="doctor_id" type="text" value="<?= isset($doctor->id) ? $doctor->id : ''; ?>">
                <input hidden class="patient_id" type="text" value="<?= isset($patients->id) ? $patients->id : ''; ?>">
              </div>
            </div>
          </div>

          <div class="row border-bottom pb-3 mb-4 g-3 bg-light rounded-2 py-2 mx-0 small text-body-secondary">
            <div class="col-md-5"><strong class="text-body-emphasis">Patient Name:</strong> <?= htmlspecialchars(ucfirst($patients->name)) ?></div>
            <div class="col-md-2"><strong class="text-body-emphasis">Age:</strong> <?= calculateAge($patients->date_of_birth) ?></div>
            <div class="col-md-2"><strong class="text-body-emphasis">Gender:</strong> <?= htmlspecialchars(ucfirst($patients->gender)) ?></div>
            <div class="col-md-3"><strong class="text-body-emphasis">Mobile:</strong> <?= htmlspecialchars($patients->phone); ?></div>
          </div>

          <div class="row g-4">
            <div class="col-lg-4 border-end-lg pe-lg-4">

              <section class="mb-4">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Chief Complaint</h6>
                <textarea class="form-control form-control-plaintext cc text-dark small" rows="2" placeholder="No complaints documented..."><?= htmlspecialchars($consultation->chief_complaint) ?></textarea>
              </section>

              <section class="mb-4">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Patient Vitals</h6>
                <table class="table table-sm table-borderless mb-0 small text-secondary vitals-table">
                  <tr>
                    <td>Blood Pressure (BP)</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->blood_pressure) ? htmlspecialchars($consultation->blood_pressure) : '—' ?></td>
                  </tr>
                  <tr>
                    <td>Pulse Rate</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->pulse) ? htmlspecialchars($consultation->pulse) . ' bpm' : '—' ?></td>
                  </tr>
                  <tr>
                    <td>Weight</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->weight) ? htmlspecialchars($consultation->weight) . ' kg' : '—' ?></td>
                  </tr>
                  <tr>
                    <td>Height</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->height) ? htmlspecialchars($consultation->height) . ' cm' : '—' ?></td>
                  </tr>
                  <tr>
                    <td>Body Mass Index (BMI)</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->bmi) ? htmlspecialchars($consultation->bmi) : '—' ?></td>
                  </tr>
                  <tr>
                    <td>Temperature</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->temperature) ? htmlspecialchars($consultation->temperature) . ' °F' : '—' ?></td>
                  </tr>
                  <tr>
                    <td>Oxygen Saturation (SpO2)</td>
                    <td class="text-end fw-bold text-dark"><?= !empty($consultation->spo2) ? htmlspecialchars($consultation->spo2) . ' %' : '—' ?></td>
                  </tr>
                </table>
              </section>

              <section class="mb-4">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Clinical Notes</h6>
                <textarea class="form-control form-control-plaintext clinical_notes text-dark small" rows="2" placeholder="Add clinical history or physical diagnostic summaries..."><?= htmlspecialchars($consultation->clinical_notes) ?></textarea>
              </section>

              <section class="mb-3">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-2">Advice & Lifestyle Guidance</h6>
                <textarea class="form-control form-control-plaintext advice text-dark small" rows="3" placeholder="Type customized directives for patient follow up here..."></textarea>
              </section>
            </div>

            <div class="col-lg-8">
              <div class="ps-lg-2">
                <div class="d-flex align-items-center pb-2 mb-2">
                  <h1 class="prescription-rx text-primary fw-bold mb-0">℞</h1>
                </div>

                <div class="table-responsive border rounded shadow-sm bg-white">
                  <table class="table table-hover align-middle mb-0 small">
                    <thead class="table-light text-body-emphasis fw-bold border-bottom">
                      <tr>
                        <th style="width: 40%;" class="ps-3 py-2">Medicine Details</th>
                        <th style="width: 15%;" class="text-center py-2">Dose Matrix</th>
                        <th style="width: 15%;" class="text-center py-2">Duration</th>
                        <th style="width: 18%;" class="ps-2 py-2">Intake Instructions</th>
                        <th style="width: 12%;" class="text-center py-2">
                          <button class="btn btn-link link-danger btn-xs p-0 text-decoration-none fw-bold btn_clear d-print-none">Clear All</button>
                        </th>
                      </tr>
                      <tr class="table-group-divider align-top d-print-none bg-light-subtle">
                        <th class="ps-3 py-2">
                          <div class="medicine-select-wrapper">
                            <?= Medicine::html_select("medicine_id"); ?>
                          </div>
                        </th>
                        <th class="py-2">
                          <?= Dose::html_select("dose_id"); ?>
                        </th>
                        <th class="py-2">
                          <?= Duration::html_select("duration_id"); ?>
                        </th>
                        <th class="py-2 pe-2">
                          <?= Instruction::html_select("instruction_id"); ?>
                        </th>
                        <th class="text-center py-2">
                          <button class="btn btn-primary btn-sm w-100 add_cart py-1">
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

          <div class="row mt-5 pt-4 mx-0 px-2">
            <div class="col-sm-5 ms-auto text-center">
              <div style="height:55px;" class="d-flex align-items-center justify-content-center">
                <button class="btn btn-success btn-sm btn_process shadow-sm d-print-none">
                  <i class="bi bi-check-circle me-1"></i> Save & Authorize Prescription
                </button>
              </div>
              <hr class="my-2">
              <h6 class="fw-bold text-body-emphasis mb-1">Dr. Sirajee Shafiqul Islam</h6>
              <p class="mb-1 text-secondary small">Stroke & Endovascular Neurologist</p>
              <small class="text-muted text-uppercase tracking-wider" style="font-size: 9px; letter-spacing: 0.5px;">Signature & Official Seal</small>
            </div>
          </div>

          <div class="border-top mt-5 pt-4 mx-2">
            <div class="row g-3 small text-secondary">
              <div class="col-sm-5">
                <h6 class="fw-bold text-body-emphasis mb-2"><i class="bi bi-building text-primary me-1"></i> Chamber Information</h6>
                <p class="mb-1 fw-semibold text-body-emphasis">Bangladesh Specialized Hospital PLC.</p>
                <p class="mb-0">21 Shyamoli, Mirpur Road, Dhaka-1207</p>
              </div>
              <div class="col-sm-4">
                <h6 class="fw-bold text-body-emphasis mb-2"><i class="bi bi-clock text-primary me-1"></i> Visiting Hours</h6>
                <p class="mb-1">Saturday - Thursday (6:00 PM - 9:00 PM)</p>
                <p class="mb-0 text-danger fw-medium">Friday: Closed</p>
              </div>
              <div class="col-lg-3">
                <h6 class="fw-bold text-body-emphasis mb-2"><i class="bi bi-telephone text-primary me-1"></i> Hotlines & Inquiries</h6>
                <p class="mb-1">+88017XXXXXXXX</p>
                <p class="mb-0">sirajee.neuro@gmail.com</p>
              </div>
            </div>
          </div>

          <div class="border-top mt-4 pt-3 mx-2 mb-0">
            <div class="d-flex flex-column flex-sm-row justify-content-between small text-muted text-center text-sm-start gap-2" style="font-size: 11px;">
              <span>System Metadata Reference ID: <strong class="text-body-emphasis">#<?= $rx_id; ?></strong></span>
              <span>Generated via Health Automation Web App Framework</span>
              <span>Printed Stamp: <strong><?= date('d M Y h:i A'); ?></strong></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<script>
  $(function() {
    let prescription = new Cart("prescription");
    printCart();

    $(".table select").addClass("form-select form-select-sm shadow-sm");

    $(".add_cart").click(function() {
      let medicine_id = $("#medicine_id").val();
      let medicine_name = $("#medicine_id option:selected").text();

      let dose_id = $("#dose_id").val();
      let dose_name = $("#dose_id option:selected").text();

      let duration_id = $("#duration_id").val();
      let duration_name = $("#duration_id option:selected").text();

      let instruction_id = $("#instruction_id").val();
      let instruction_name = $("#instruction_id option:selected").text();

      if (!medicine_id) {
        alert("Please select a medicine before appending onto layout matrix.");
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

    function printCart() {
      let pres = prescription.getData() ?? [];
      let html = "";

      if (pres.length === 0) {
        html = `<tr><td colspan="5" class="text-center text-muted py-4 small">No interactive therapeutic lines added to this prescription section yet.</td></tr>`;
      } else {
        pres.forEach((item, i) => {
          html += `
           <tr>
             <td class="ps-3 py-3">
               <strong class="text-body-emphasis text-primary">${i + 1}. ${item.medicine_name}</strong>
             </td>
             <td class="text-center fw-semibold text-secondary">${item.dose_name}</td>
             <td class="text-center text-body-secondary">${item.duration_name}</td>
             <td class="ps-2">
               <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 fw-medium">${item.instruction_name}</span>
             </td>
             <td class="text-center d-print-none">
               <button data-id='${item.id}' class="btn btn-sm btn-link link-danger del p-1 text-decoration-none" title="Remove Medicine">
                 <i class="bi bi-trash fs-6"></i>
               </button>
             </td>
           </tr>`;
        });
      }

      $(".prescription_body").html(html);
    }

    $("body").on("click", ".del", function() {
      let itemId = $(this).data("id");
      prescription.delItem(itemId);
      printCart();
    });

    $(".btn_clear").on("click", function() {
      if (confirm("Are you sure you want to completely clear the item arrays?")) {
        prescription.clearCart();
        printCart();
      }
    });

    $(".btn_process").on("click", function() {
      let consultation_id = $(".consultation_id").val();
      let doctor_id = $(".doctor_id").val();
      let patient_id = $(".patient_id").val();
      let additional_notes = $(".advice").val();
      let cc = $(".cc").val();
      let medicine = prescription.getData();

      $.ajax({
        url: "<?php echo $base_url ?>/api/prescription/processprescription",
        method: "post",
        data: {
          consultation_id,
          doctor_id,
          patient_id,
          additional_notes,
          cc,
          medicine
        },
        success: function(res) {
          alert("Prescription entry successfully processed!");
          console.log(res);
        },
        error: function(err) {
          console.error("Prescription pipeline fault error:", err);
        }
      });
    });
  });
</script>

<script>
    function printprescription() {
        let content = document.getElementById("prescription").innerHTML;

        let printWindow = window.open("", "", "width=900,height=700");

        printWindow.document.write(`
        <html>
        <head>
            <title>prescription</title>

            <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

            <style>
                body{
                    padding:20px;
                }

                @media print{
                    .no-print{
                        display:none;
                    }
                }
            </style>
        </head>
        <body>
            ${content}
        </body>
        </html>
    `);

        printWindow.document.close();
        printWindow.focus();

        setTimeout(() => {
            printWindow.print();
            printWindow.close();
        }, 500);
    }

    function downloadPDF() {

    const prescription = document.getElementById("prescription");

    const options = {
        margin: 5,
        filename: 'prescription.pdf',
        image: {
            type: 'jpeg',
            quality: 1
        },
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'portrait'
        }
    };

    html2pdf().set(options).from(prescription).save();
}
</script>