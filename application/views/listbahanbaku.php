<link   href="<?php echo base_url("asset/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css">
<script src="<?php  echo base_url("asset/js/jquery.js"); ?>" language="javascript"></script>
<script src="<?php  echo base_url("asset/js/bootstrap.js"); ?>" language="javascript"></script>


<div class="container">
    <?php 
        echo form_open("Bahanbaku/index"); 
    ?>        
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><p class="text-center">Bahan Baku</h5></p>
                    <form>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="card-body">
                            <!--<h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>-->
                            <div class="col-md-4">
                                <label>No</label>
                                <?php 
                                    echo form_input("txtnolist", "", ['id'=>'txtnolist', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Product Description</label>
                                <?php 
                                    echo form_input("txtproductdesc", "", ['id'=>'txtproductdesc', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Quantity</label>
                                <?php 
                                    echo form_input("txtquantity", "", ['id'=>'txtquantity', 'type'=>'number', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        
                                <?php 
                                    echo form_submit("btnAdd", "Tambah Bahan", ['id'=>'btnAdd', 'class'=>'btn btn-success']);
                                    echo form_submit("btnUpdate", "Update Bahan", ['id'=>'btnUpdate', 'class'=>'btn btn-warning']);  
                                    echo form_submit("btnRemove", "Hapus Bahan", ['id'=>'btnRemove  ', 'class'=>'btn btn-danger']);   
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