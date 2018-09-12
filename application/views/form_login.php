<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">\
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Page</title>

    <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="<?php echo base_url('dashboard/login_adm');?>">
                    <h1>Login Form</h1>
                    <?php
                    $info = $this->session->flashdata('info');
                    $alert = $this->session->flashdata('alert');
                    if ($info) {
                        echo '<div class="alert alert-success alert-dismissible fade in" role="alert">'.$info.'</div>';
                    } elseif($alert) {
                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'.$alert.'</div>';
                    }
                    ?>

                    <div>
                        <input name="email" type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input name="pwd" type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Log in</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Do you not have an account?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form method="post" action="<?php echo base_url('dashboard/save_admin');?>" onsubmit="return checkPwd()">
                    <h1>Create Account</h1>
                    <div>
                        <input name="username" type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input name="email" type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input id="pwd" minlength="8" name="password" type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script>
    function checkPwd() {
        var pwd = document.getElementById('pwd');

        var regularExpression = /^[0-9a-zA-Z]+$/;
        if (pwd.value.match(regularExpression)) {
            return true;
        } else {
            alert('Your password invalid, please mix character and number');
            pwd.focus();
            return false;
        }
    }
</script>
</body>
</html>