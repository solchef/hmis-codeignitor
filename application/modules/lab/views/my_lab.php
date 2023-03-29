
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->

        <link href="common/extranal/css/lab/lab.css" rel="stylesheet">

        <section class="col-md-12">
            <header class="panel-heading">
                <?php echo lang('lab_report'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2">
                            <label><?php echo lang('status'); ?></label>
                            <select class="form-control status">
                                <option value="all"><?php echo lang('all'); ?></option>
                                <option value="pending"><?php echo lang('pending'); ?></option>
                                <option value="drafted"><?php echo lang('drafted'); ?></option>
                                <option value="completed"><?php echo lang('completed'); ?></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label><?php echo lang('category'); ?></label>
                            <select class="form-control category">
                                <option value="all"><?php echo lang('all'); ?></option>
                                <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>From</label>
                            <input type="text" class="form-control pay_in default-date-picker readonly" name="" id="from_date" readonly="">
                        </div>
                        <div class="col-md-3">
                            <label>To</label>
                            <input type="text" class="form-control pay_in default-date-picker readonly" name="" id="to_date" readonly="">
                        </div>
                        <div class="col-md-2">
                            <label>Date Filter</label><br>
                            <button class="btn btn-success dateFilter" style="width: 100%">Filter</button>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th><?php echo lang('patient_id'); ?></th>
                                <th><?php echo lang('patient'); ?></th>
                                <th><?php echo lang('phone'); ?></th>
                                <th><?php echo lang('invoice_no'); ?></th>
                                <th><?php echo lang('invoice_date_time'); ?></th>
                                <th><?php echo lang('test_name'); ?></th>
                                <th><?php echo lang('status'); ?></th>
                                <th><?php echo lang('bill_status'); ?></th>
                                <th><?php echo "Updated On"; ?></th>
                                <th><?php echo "Reported By"; ?></th>
                                <th class=""><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var select_doctor = "<?php echo lang('select_doctor'); ?>";</script>
<script type="text/javascript">var select_patient = "<?php echo lang('select_patient'); ?>";</script>
<script src="common/extranal/js/lab/my_lab.js"></script>
<script>
    $(document).ready(function () {
        let status = $('.status').val();
        let category = $('.category').val();
                let fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();
        "use strict";
        var table = $('#editable-sample1').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "lab/getMyLab?status="+status+"&category="+category+"&from="+fromDate+'&to='+toDate,
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[4, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
    
    $('.status').on("change", function() {
        let status = $('.status').val();
        let category = $('.category').val();
                let fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();
         "use strict";
         $('#editable-sample1').DataTable().destroy().clear();
        var table = $('#editable-sample1').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "lab/getMyLab?status="+status+"&category="+category+"&from="+fromDate+'&to='+toDate,
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[4, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    })
    
    $('.category').on("change", function() {
        let status = $('.status').val();
        let category = $('.category').val();
                let fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();
         "use strict";
         $('#editable-sample1').DataTable().destroy().clear();
        var table = $('#editable-sample1').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "lab/getMyLab?status="+status+"&category="+category+"&from="+fromDate+'&to='+toDate,
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], }},
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[4, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    })
    
    $(document).on("change", '.test_status', function() {
        let id = $(this).data("id");
        let status = $(this).val();
        let data = new FormData();
        data.append('id', id);
        data.append('status', status);
        axios.post('<?php echo site_url('lab/changeReportStatus'); ?>', data)
    })
    
        $('.dateFilter').on("click", function() {
        let status = $('.status').val();
        let category = $('.category').val();
        let fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();
        "use strict";
        $('#editable-sample1').DataTable().destroy().clear();
        var table = $('#editable-sample1').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "lab/getMyLab?status="+status+"&category="+category+"&from="+fromDate+'&to='+toDate,
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[4, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
        
    })
</script>
