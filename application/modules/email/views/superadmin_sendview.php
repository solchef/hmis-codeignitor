 <link href="common/extranal/css/email/superadmin_sendview.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-9">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('send_email'); ?>

                    <div id="templatebar" class="pull-right col-md-6 btn-toolbar">
                        <button class='btn green pull-right' onclick="location.href = 'email/sent'" type="button">
                            <?php echo lang('sent_messages'); ?></button>
                        <button class='btn green pull-right' onclick="location.href = 'email/manualEmailTemplate'" type="button">
                            <?php echo lang('template'); ?></button>
                        <button class='btn green pull-right' data-toggle="modal" data-target="#myModal1" type="button">
                            <?php echo lang('add'); ?> <?php echo lang('template'); ?></button>
                    </div>

                </header>

                <div class="panel-body">  
                    <form role="form" class="clearfix" action="email/superadminSend" method="post">
                        <label class="control-label">         
                            <?php echo lang('send_email_to'); ?>
                        </label>    
                        <?php if ($this->ion_auth->in_group(array('superadmin'))) { ?>
                            <div class="radio radio_button">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios1" value="allhospital">
                                    <?php echo lang('all_hospital'); ?> 
                                </label>
                            </div>                      
                            
                        <?php } ?>
                        


                        




                        <div class="radio radio_button">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="single_hospital">
                                <?php echo lang('single_hospital'); ?> 
                            </label>
                        </div>

                        <div class="radio single_hospital radio_button">
                            <label>
                                <?php echo lang('select_hospital'); ?> 
                                <select class="form-control m-bot15" id="patientchoose" name="hospital" value=''>
                                    
                                </select>
                            </label>

                        </div>

                        <div class="radio radio_button">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="other">
                                <?php echo lang('others'); ?>
                            </label>
                        </div>

                        <div class="radio other">
                            <label>
                                <?php echo lang('email'); ?> <?php echo lang('address'); ?>
                                <input type="email" name="other_email" value="" class="form-control">
                            </label>

                        </div>

                        <div class="">
                            <label>
                                <?php echo lang('select_template'); ?>
                                <select class="form-control m-bot15" id='selUser5' name="templatess">
                                   <!-- <option value='0'><?php echo lang('select_template'); ?></option>-->
                                </select>
                            </label>

                        </div>


                        <div class="form-group">
                            <label class="control-label"><?php echo lang('subject'); ?></label>
                            <input type="text" class="form-control" name="subject" rows="10">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo lang('message'); ?></label>
                            <?php
                            $count = 0;
                            foreach ($shortcode as $shortcodes) {
                                ?>
                                <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext(this);">
                                <?php
                                $count += 1;
                                if ($count === 7) {
                                    ?>
                                    <br>
                                    <?php
                                }
                            }
                            ?> <br><br>
                            <textarea class="ckeditor" id="editor1" name="message" value="" cols="70" rows="10"></textarea>
                        </div>
                        <input type="hidden" name="id" value=''>

                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info col-md-3 pull-right"><i class="fa fa-location-arrow"></i> <?php echo lang('send_email'); ?></button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->







<div class="modal fade" id="myModal1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <form role="form" name="myform1" action="email/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                        if (!empty($templatename->name)) {
                            echo $templatename->name;
                        }
                        if (!empty($setval)) {
                            echo set_value('name');
                        }
                        ?>' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count1 = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                            <?php
                            $count1 += 1;
                            if ($count1 === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>

                        <textarea class="ckeditor" id="editor2"name="message" value='<?php
                        if (!empty($templatename->message)) {
                            echo $templatename->message;
                        }
                        if (!empty($setval)) {
                            echo set_value('message');
                        }
                        ?>' cols="70" rows="10"placeholder="" required> <?php
                                      if (!empty($templatename->message)) {
                                          echo $templatename->message;
                                      }
                                      if (!empty($setval)) {
                                          echo set_value('message');
                                      }
                                      ?></textarea>
                    </div>
                    <input type="hidden" name="id" value='<?php
                    if (!empty($templatename->id)) {
                        echo $templatename->id;
                    }
                    ?>'>
                    <input type="hidden" name="type" value='email'>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var select_hospital = "<?php echo lang('select_hospital'); ?>";</script>
<script type="text/javascript">var select_template = "<?php echo lang('select_template'); ?>";</script>
<script src="common/extranal/js/email/superadmin_sendview.js"></script>