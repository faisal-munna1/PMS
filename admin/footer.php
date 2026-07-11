         </div>
         </div>
         </main>

         <footer class="app-footer">
             <div class="float-end d-none d-sm-inline">
                 Version 1.0.0
             </div>

             <strong>
                 Copyright &copy; <?= date('Y') ?>
                 <a href="<?= $base_url ?>" class="text-decoration-none">
                     Patient Management System
                 </a>.
             </strong>

             All rights reserved.
         </footer>

         </div>

         <!-- jQuery -->


         <!-- Bootstrap -->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

         <!-- OverlayScrollbars -->
         <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.12.0/browser/overlayscrollbars.browser.es6.min.js"></script>

         <!-- AdminLTE -->
         <script src="<?= $base_url ?>/asset/js/adminlte.js"></script>

         <!-- DataTables -->
         <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"></script>

         <script src="https://cdn.datatables.net/responsive/3.0.7/js/dataTables.responsive.min.js"></script>
         <script src="https://cdn.datatables.net/responsive/3.0.7/js/responsive.bootstrap5.min.js"></script>

         <script src="https://cdn.datatables.net/buttons/3.2.5/js/dataTables.buttons.min.js"></script>
         <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.bootstrap5.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.20/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.20/vfs_fonts.js"></script>

         <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.html5.min.js"></script>
         <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.print.min.js"></script>

         <!-- Select2 -->
         <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

         <!-- Flatpickr -->
         <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

         <!-- SweetAlert -->
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

         <!-- Toastify -->
         <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

         <!-- ApexCharts -->
         <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

         <!-- Custom -->
         <script src="<?= $base_url ?>/asset/js/app.js"></script>

         <!-- Include the Quill library -->
         <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

         <script>
             $(function() {

                 // ==========================================
                 // DataTable
                 // ==========================================

                 $('.datatable').each(function() {

                     new DataTable(this, {
                         responsive: true,
                         autoWidth: false,
                         ordering: true,
                         searching: true,
                         paging: true,
                         info: true,
                         pageLength: 10,
                         lengthMenu: [10, 25, 50, 100],

                         layout: {
                             topStart: 'pageLength',
                             topEnd: 'search',
                             bottomStart: 'info',
                             bottomEnd: 'paging'
                         }
                     });

                 });

                 // ==========================================
                 // Export DataTable
                 // ==========================================

                 $('.datatable-export').each(function() {

                     new DataTable(this, {
                         responsive: true,
                         autoWidth: false,
                         ordering: true,
                         searching: true,
                         paging: true,
                         info: true,
                         pageLength: 10,
                         lengthMenu: [10, 25, 50, 100],

                         layout: {
                             topStart: {
                                 buttons: [
                                     'copy',
                                     'excel',
                                     'pdf',
                                     'print'
                                 ]
                             },
                             topEnd: 'search',
                             bottomStart: 'info',
                             bottomEnd: 'paging'
                         }
                     });

                 });

                 // ==========================================
                 // Select2 (Only .select2)
                 // ==========================================

                 $('.select2').select2({
                     theme: 'bootstrap-5',
                     width: '100%'
                 });

                 // ==========================================
                 // Select2 (All Select)
                 // ==========================================

                 $('select').select2({
                     theme: 'bootstrap-5',
                     width: '100%'
                 });

                 // ==========================================
                 // Flatpickr
                 // ==========================================

                 $('.datepicker').flatpickr({
                     dateFormat: "Y-m-d",
                     allowInput: true
                 });

                 // ==========================================
                 // Quill Editor
                 // ==========================================

                 document.querySelectorAll('.quill-editor').forEach(function(editor) {

                     const textarea = document.getElementById(editor.dataset.target);

                     if (!textarea) return;

                     const quill = new Quill(editor, {

                         theme: 'snow',

                         placeholder: editor.dataset.placeholder || '',

                         modules: {
                             toolbar: [
                                 [{
                                     font: []
                                 }, {
                                     size: []
                                 }],
                                 [{
                                     header: [1, 2, 3, 4, 5, 6, false]
                                 }],

                                 ['bold', 'italic', 'underline', 'strike'],

                                 [{
                                     color: []
                                 }, {
                                     background: []
                                 }],

                                 [{
                                     script: 'sub'
                                 }, {
                                     script: 'super'
                                 }],

                                 [{
                                     list: 'ordered'
                                 }, {
                                     list: 'bullet'
                                 }],
                                 [{
                                     indent: '-1'
                                 }, {
                                     indent: '+1'
                                 }],

                                 [{
                                     align: []
                                 }],

                                 ['blockquote', 'code-block'],

                                 ['link', 'image'],

                                 ['clean']
                             ]
                         }

                     });

                     // Edit Page Support
                     quill.root.innerHTML = textarea.value;

                     // Save HTML
                     editor.closest('form').addEventListener('submit', function() {
                         textarea.value = quill.root.innerHTML;
                     });

                 });

                 // ==========================================
                 // OverlayScrollbars
                 // ==========================================

                 if (typeof OverlayScrollbars !== "undefined") {

                     const sidebar = document.querySelector('.sidebar-wrapper');

                     if (sidebar) {

                         OverlayScrollbars(sidebar, {
                             scrollbars: {
                                 autoHide: 'leave'
                             }
                         });

                     }

                 }

             });
         </script>

         </body>

         </html>