<link   href="<?php echo base_url("asset/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css">
<script src="<?php  echo base_url("asset/js/jquery.js"); ?>" language="javascript"></script>
<script src="<?php  echo base_url("asset/js/bootstrap.js"); ?>" language="javascript"></script>


<div class="container">
    <?php 
        echo form_open("Operator/index"); 
    ?>        
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><p class="text-center">Master Operator</h5></p>
                    <form>
                        <br>
                        <br>
                        <br>
                        <div class="card-body">
                            <!--<h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>-->
                            <div class="col-md-4">
                                <label>Outlet Branch</label>
                                <?php 
                                    echo form_input("txtBranch", "", ['id'=>'txtBranch', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Employee ID </label>
                                <?php 
                                    echo form_input("txtID_employee", "", ['id'=>'txtID_employee', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Employee Name</label>
                                <?php 
                                    echo form_input("txtName_employee", "", ['id'=>'txtName_employee', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Birth of Date</label>
                                <?php 
                                    echo form_input("txtdate", "", ['id'=>'txtdate', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Start Work</label>
                                <?php 
                                    echo form_input("txtstart", "", ['id'=>'txtstart', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>End Work</label>
                                <?php 
                                    echo form_input("txtend", "", ['id'=>'txtend', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        
                                <?php 
                                    echo form_submit("btnAdd_employee", "Tambah Pegawai", ['id'=>'btnAdd_employee', 'class'=>'btn btn-success']);
                                    echo form_submit("btnUpdate_employee", "Update Pegawai", ['id'=>'btnUpdate_employee', 'class'=>'btn btn-warning']);  
                                    echo form_submit("btnRemove_employee", "Hapus Pegawai", ['id'=>'btnRemove_employee  ', 'class'=>'btn btn-danger']);
                                    echo form_submit("btnBlock", "Block", ['id'=>'btnBlock', 'class'=>'btn btn-danger']);  
                                    echo form_submit("btnUnblock", "Unblock", ['id'=>'btnUnblock', 'class'=>'btn btn-warning']);   
                                ?>
                    </form>               
                </div>
            </div> 
        </div>
    </div>        
    <?php 
        echo form_close(); 
    ?>
</div>