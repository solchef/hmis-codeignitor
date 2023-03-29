<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <link href="common/css/package.css" rel="stylesheet">
        <link href="common/extranal/css/settings/change_plan.css" rel="stylesheet">
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-hospital-o"></i>  <?php echo lang('packages'); ?>(Current Package-<?php echo $package_details->name; ?>)

            </header>





            <div class="panel-body">
                <div class="adv-table editable-table">
                    <div class="space15"></div>
                    <div class="cd-pricing-switcher">
                        <p class="fieldset" id="fieldset_p">
                            <input type="radio" name="duration-1" class="duration" value="monthly" id="monthly-1" checked="">
                            <label for="monthly-1" class="monthly_text"><?php echo lang('monthly'); ?></label>
                            <input type="radio" name="duration-1" class="duration" value="yearly" id="yearly-1">
                            <label for="yearly-1" class="yearly_text"><?php echo lang('yearly'); ?></label>
                            <span class="cd-switch"></span>
                        </p>
                    </div>
                    <div class="package-container">
                        <?php
                        foreach ($packages as $package) {
                            $all_packages[] = $package;
                        }
                        $modules_list = ['accountant', 'appointment', 'lab', 'bed', 'department', 'donor', 'finance', 'pharmacy', 'laboratorist', 'medicine', 'nurse', 'patient', 'pharmacist', 'prescription', 'receptionist', 'report', 'notice', 'email', 'sms', 'file', 'payroll', 'attendance', 'leave', 'chat'];

                        if (!empty($all_packages)) {

                            foreach ($all_packages as $package1) {
                                ?>
                                <div class="col-lg-3 col-sm-3 package_div">
                                    <div class="pricing-table">
                                        <div class="pricing-head">
                                            <h1 <?php if ($package1->recommended == 'Yes') { ?> class="package_recommend" <?php } else { ?>
                                                                                                    class="package_recommend1"
                                                                                                <?php } ?>> <?php echo $package1->name; ?> </h1>
                                            <h2 class="text1"> <span class="note"><?php echo $settings->currency; ?></span><?php echo $package1->monthly_price; ?> </h2>
                                            <h2 class="text2 hidden"> <span class="note"><?php echo $settings->currency; ?></span><?php echo $package1->yearly_price; ?> </h2>


                                        </div>
                                        <?php $modules = explode(',', $package1->module) ?>
                                        <ul class="list-unstyled">
                                            <?php
                                            for ($i = 0; $i < count($modules_list); $i++) {
                                                if (in_array($modules_list[$i], $modules)) {
                                                    //foreach ($modules as $module) { 
                                                    ?>
                                                    <li class="module_select"><i class="fa fa-check"></i> <?php echo $modules_list[$i]; ?> </li>
                                                <?php } else { ?> 
                                                    <li class="module_select"><i class="fa fa-times"></i> <?php echo $modules_list[$i]; ?> </li>                
                                                <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <div class="price-actions">
                                            <button type="button" data-package-id="<?php echo $package1->id; ?>" data-package-type="monthly" data-is-free="0" class="btn btn-success waves-effect waves-light selectPackage monthlyPackage" title="Choose Plan"><i class="icon-anchor display-small"></i><span class="display-big">Choose Plan</span>
                                            </button>
                                            <button type="button" data-package-id="<?php echo $package1->id; ?>" data-package-type="yearly" data-is-free="0" class="btn btn-success waves-effect waves-light selectPackage yearlyPackage hidden" title="Choose Plan"><i class="icon-anchor display-small"></i><span class="display-big">Choose Plan</span>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                // }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('change_plan'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="editChangeForm" action="settings/changePlanPayment" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('package'); ?> <?php echo lang('name'); ?></label> 
                        <input type="text" class="form-control package_name" name="package" value='' placeholder="" readonly="">
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('package'); ?> <?php echo lang('price'); ?></label> 
                        <input type="text" class="form-control pay_in package_price" name="package_price" value='' placeholder="" readonly="">
                    </div>
                    <input type="hidden" name="deposit_type" value="Card">
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('package'); ?> <?php echo lang('type'); ?></label> 
                        <input type="text" class="form-control pay_in package_type" name="package_type" value='' placeholder="" readonly="">
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('next_due_date'); ?> </label> 
                        <input type="text" class="form-control pay_in next_due_date" name="next_due_date" value='' placeholder="" readonly="">
                    </div>
                    <?php
                    $payment_gateway = $settings1->payment_gateway;
                    if ($payment_gateway == 'PayPal') {
                        ?>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <?php echo lang('card'); ?></label>
                            <select class="form-control  js-example-basic-single" id="" name="card_type" value=''>  

                                <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>   
                                <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                <option value="American Express" > <?php echo lang('american_express'); ?> </option>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="cardholder" id="exampleInputEmail1" value='' placeholder="">
                        </div>

                    <?php } ?>
<?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack') { ?>


                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                            <input type="text" class="form-control" id="card" name="card_number" value='' placeholder="">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                            <input type="text" class="form-control" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="" required="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1"> <?php echo lang('cvv'); ?></label>
                            <input type="text" class="form-control" id="cvv" name="cvv_number" value="" placeholder="" maxlength="3" required="">
                        </div>

                        <?php
                    }
                    ?>
                    <div id="token"></div>
                    <input type="hidden" name="hospital_id" id="hospital_id" value='<?php echo $hospital->id; ?>'>
                    <input type="hidden" name="id" id="package_id" value=''>
                    <div class="col-md-12 panel">
                        <button type="submit" value="submit" class="btn btn-info btn-group pull-center pull submit_button" id="submit-btn" <?php
                                if ($settings1->payment_gateway == 'Stripe') {
                                    ?>onClick="stripePay(event);"<?php }
                                ?>> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">var gateway = "<?php echo $gateway->publish; ?>";</script>
<script src="common/extranal/js/settings/change_plan.js"></script>