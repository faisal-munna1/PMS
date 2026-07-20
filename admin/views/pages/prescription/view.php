<style>
@page {
  size: A4;
  margin: 0; /* Managed by paper padding for better print consistency */
}

:root {
  --primary: #1e3a8a;       /* Deep clinical navy blue */
  --primary-light: #eff6ff; /* Soft tint for highlights */
  --secondary: #4b5563;     /* Muted slate text */
  --border: #e2e8f0;        /* Clean structural line color */
  --light: #f8fafc;         /* Bright gray background */
  --text: #0f172a;          /* Charcoal text for better readability */
  --accent: #0284c7;        /* Medical cyan accent */
}

body {
  margin: 0;
  padding: 40px 0;
  background: #f1f5f9;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
  color: var(--text);
  -webkit-font-smoothing: antialiased;
}

/* Paper Container */
.paper {
  width: 210mm;
  min-height: 297mm;
  margin: auto;
  background: #fff;
  padding: 20mm 18mm;
  border-radius: 16px;
  box-shadow: 
    0 10px 25px -5px rgba(0, 0, 0, 0.05),
    0 8px 10px -6px rgba(0, 0, 0, 0.05);
  border: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

/* Header Area styling */
.paper .row:first-child {
  border-bottom: 2px solid var(--primary) !important;
  padding-bottom: 20px;
  margin-bottom: 24px !important;
}

h2 {
  color: var(--primary) !important;
  font-weight: 700 !important;
  font-size: 26px !important;
  letter-spacing: -0.5px;
  margin-bottom: 4px;
}

.text-primary {
  color: var(--primary) !important;
}

/* Sub-header text styles */
.paper .row:first-child .col-8 div:nth-child(2) {
  font-weight: 600;
  color: var(--accent);
  font-size: 15px;
}

.paper .row:first-child .col-8 div:nth-child(3),
.paper .row:first-child .col-8 div:nth-child(4) {
  font-size: 13px;
  color: var(--secondary);
  margin-top: 2px;
}

/* Doctor Metadata Information Table */
.table-borderless th {
  color: var(--secondary);
  font-weight: 500;
  font-size: 13px;
  padding: 3px 0 !important;
}

.table-borderless td {
  font-weight: 600;
  color: var(--text);
  font-size: 13px;
  text-align: right;
  padding: 3px 0 !important;
}

/* Patient Card Component */
.info-card {
  background: var(--light);
  border: 1px solid var(--border);
  border-left: 4px solid var(--primary);
  border-radius: 8px;
  padding: 14px 18px;
  margin-bottom: 24px;
}

.info-card b {
  color: var(--secondary);
  font-weight: 500;
  font-size: 13px;
}

.info-card .row div {
  font-size: 14px;
  font-weight: 600;
}

/* Left side panel cards */
.col-4 .info-card {
  background: transparent;
  border: none;
  border-left: none;
  padding: 0;
  margin-bottom: 20px;
  font-size: 13.5px;
  line-height: 1.5;
}

.section-title {
  font-size: 11px;
  text-transform: uppercase;
  font-weight: 700;
  color: var(--primary);
  letter-spacing: 0.8px;
  margin-bottom: 6px;
  padding-bottom: 4px;
  border-bottom: 2px solid var(--primary-light);
}

/* Rx Symbol */
.rx {
  font-size: 55px;
  color: var(--primary);
  font-family: 'Garamond', Georgia, serif;
  line-height: 0.9;
  font-weight: bold;
  margin-bottom: 10px;
}

/* Medicine Prescription Table */
.table-bordered {
  border: 1px solid var(--border) !important;
  border-radius: 8px;
  overflow: hidden;
  border-collapse: separate;
}

.table thead th {
  background: var(--primary) !important;
  color: #fff !important;
  border: none !important;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 12px 14px !important;
  font-weight: 600;
}

.table tbody td {
  padding: 14px !important;
  vertical-align: middle;
  border-color: var(--border) !important;
  font-size: 14px;
}

.table tbody tr:nth-child(even) {
  background: var(--light) !important;
}

.table tbody tr:hover {
  background: var(--primary-light) !important;
}

.table strong {
  color: var(--primary);
  font-weight: 600;
}

/* Footer Element Area */
.footer {
  border-top: 1px solid var(--border);
  margin-top: 40px;
  padding-top: 16px;
  font-size: 12px;
  color: var(--secondary);
  line-height: 1.5;
}

.footer b {
  color: var(--primary);
  font-weight: 600;
}

/* Signature & Seal Block */
hr {
  border-top: 1.5px solid var(--text);
  opacity: 1;
  width: 200px;
  margin: 0 auto 6px auto;
}

.col-5.ms-auto.text-center b {
  font-weight: 600;
  color: var(--text);
  font-size: 14px;
  display: block;
}

small {
  color: var(--secondary);
  font-size: 11px;
}

/* Print Button Custom Elements */
.btn-primary {
  background: var(--primary);
  border: none;
  padding: 10px 24px;
  border-radius: 6px;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.2s ease;
}

.btn-primary:hover {
  background: #1d4ed8;
  transform: translateY(-1px);
}

/* Professional Print Overrides */
@media print {
  body {
    background: #fff;
    padding: 0;
  }

  .paper {
    width: 100%;
    min-height: 100vh;
    margin: 0;
    padding: 15mm 12mm;
    border: none;
    border-radius: 0;
    box-shadow: none;
  }

  .no-print {
    display: none !important;
  }

  .table thead th {
    background: var(--primary) !important;
    color: #fff !important;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }

  .table tbody tr:nth-child(even) {
    background: var(--light) !important;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }

  .info-card {
    background: var(--light) !important;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }
}
</style>

<div class="container-fluid no-print py-3 text-end">
    <button class="btn btn-primary" onclick="printInvoice()">Print Prescription</button>
</div>

<div class="paper" id="invoice">

    <div class="row border-bottom pb-3 mb-3">
        <div class="col-8">
            <h2 class="text-primary fw-bold mb-1">Dr. Sirajee Shafiqul Islam</h2>
            <div>Stroke & Endovascular Neurologist</div>
            <div>MBBS, MD (Neurology)</div>
            <div>Bangladesh Specialized Hospital</div>
        </div>
        <div class="col-4 text-end">
            <table class="table table-sm table-borderless">
                <tr>
                    <th>Rx ID</th>
                    <td>RX-20260711-001</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>11 Jul 2026</td>
                </tr>
                <tr>
                    <th>Patient ID</th>
                    <td>P00001</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="info-card">
        <div class="row">
            <div class="col-md-4"><b>Patient:</b> John Doe</div>
            <div class="col-md-2"><b>Age:</b> 45 Y</div>
            <div class="col-md-2"><b>Gender:</b> Male</div>
            <div class="col-md-2"><b>Weight:</b> 72 kg</div>
            <div class="col-md-2"><b>Phone:</b> 017XXXXXXXX</div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="info-card">
                <div class="section-title">Chief Complaint</div>
                Fever, headache and weakness.
            </div>
            <div class="info-card">
                <div class="section-title">Vitals</div>
                BP:120/80<br>Pulse:76 bpm<br>Temp:98.6 F<br>SpO2:99%
            </div>
            <div class="info-card">
                <div class="section-title">Clinical Notes</div>
                Patient is stable. Continue monitoring.
            </div>
            <div class="info-card">
                <div class="section-title">Advice</div>
                Drink water, take rest, follow-up after 7 days.
            </div>
        </div>

        <div class="col-8">
            <div class="d-flex align-items-center mb-2">
                <div class="rx">?</div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Medicine</th>
                        <th>Dose</th>
                        <th>Duration</th>
                        <th>Instruction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><strong>Tab Paracetamol 500 mg</strong></td>
                        <td>1+1+1</td>
                        <td>5 Days</td>
                        <td>After Meal</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><strong>Cap Omeprazole 20 mg</strong></td>
                        <td>1+0+0</td>
                        <td>14 Days</td>
                        <td>Before Breakfast</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="height:220px"></td>
                    </tr>
                </tbody>
            </table>

            <div class="row mt-5">
                <div class="col-5 ms-auto text-center">
                    <div style="height:60px"></div>
                    <hr>
                    <b>Dr. Sirajee Shafiqul Islam</b><br>
                    <small>Signature & Seal</small>
                </div>
            </div>

        </div>
    </div>

    <div class="footer">
        <div class="row">
            <div class="col-md-6">
                <b>Bangladesh Specialized Hospital</b><br>
                21 Shyamoli, Mirpur Road, Dhaka
            </div>
            <div class="col-md-6 text-md-end">
                Phone: +88017XXXXXXXX<br>
                Email: doctor@example.com
            </div>
        </div>
    </div>

</div>

<script>
    function printInvoice() {
        let content = document.getElementById("invoice").innerHTML;

        let printWindow = window.open("", "", "width=900,height=700");

        printWindow.document.write(`
        <html>
        <head>
            <title>Invoice</title>

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
</script>