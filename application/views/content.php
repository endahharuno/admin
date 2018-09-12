<?php include ('header.php');?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tabel Admin</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php
                        $info = $this->session->flashdata('info');
                        $alert = $this->session->flashdata('alert');
                        if ($info) {
                            echo '<div class="alert alert-success alert-dismissible fade in" role="alert">'.$info.'</div>';
                        } elseif($alert) {
                            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">'.$alert.'</div>';
                        }
                        ?>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($admin as $row) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++;?></th>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td>
                                            <a href="<?php echo base_url('dashboard/form_admin/' .$row['id']);?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url('dashboard/delete_admin/' .$row['id']);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                    ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include ('footer.php');?>