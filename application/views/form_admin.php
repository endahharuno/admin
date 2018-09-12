<?php include ('header.php');?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Admin</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('dashboard/save_admin/'.$id);?>" method="post">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $username;?>" type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $email;?>" type="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $pwd;?>" type="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include ('footer.php');?>