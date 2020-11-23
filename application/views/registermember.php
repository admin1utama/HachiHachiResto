<link   href="<?php echo base_url("asset/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css">
<script src="<?php  echo base_url("asset/js/jquery.js"); ?>" language="javascript"></script>
<script src="<?php  echo base_url("asset/js/bootstrap.js"); ?>" language="javascript"></script>


<div class="container">
    <?php 
        echo form_open("Registermember/index"); 
    ?>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><p class="text-center">Member Registration</h5></p>
                <form>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">First and last name</span>
                            </div>
                            <?php 
                                echo form_input("txtfirstname", "", ['id'=>'txtfirstname', 'type'=>'text', 'class'=>'form-control']);
                                echo form_input("txtlastname", "", ['id'=>'txtlastname', 'type'=>'text', 'class'=>'form-control']);
                            ?>
                        </div>
                    
                    <label>Alamat Email</label>
                    <?php 
                        echo form_input("txtemail", "", ['id'=>'txtemail', 'type'=>'email', 'class'=>'form-control']);
                    ?>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <?php 
                            echo form_input("txtkota", "", ['id'=>'txtkota', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <?php 
                            echo form_input("txtzip", "", ['id'=>'txtzip', 'type'=>'text', 'class'=>'form-control']);
                        ?>
                        </div>
                    </div>

                    <label>Nomor Telepon</label>
                    <?php 
                        echo form_input("txtnotelp", "", ['id'=>'txtnotelp', 'type'=>'text', 'class'=>'form-control']);
                    ?>
                    <!--<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">-->
                    
                    </div>

                    <?php 
                        echo form_submit("btnregister", "Register", ['id'=>'btnregister', 'class'=>'btn btn-warning']);
                    ?>
                    <!--<button type="submit" class="btn btn-primary">Register</button>-->
                </form>               
            </div>
        </div>
    </div>    
    </div>
    <?php 
        echo form_close(); 
    ?>
</div>