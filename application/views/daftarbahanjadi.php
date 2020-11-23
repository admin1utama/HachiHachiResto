<link   href="<?php echo base_url("asset/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css">
<script src="<?php  echo base_url("asset/js/jquery.js"); ?>" language="javascript"></script>
<script src="<?php  echo base_url("asset/js/bootstrap.js"); ?>" language="javascript"></script>


<div class="container">
    <?php 
        echo form_open("Bahanjadi/index"); 
    ?>        
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><p class="text-center">Bahan Jadi</h5></p>
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
                                <label>Category</label>
                                <?php
                                    $options = array(
                                        'udon'         => 'Udon',
                                        'ramen'           => 'Ramen',
                                        'sushi'         => 'Sushi',
                                        'paketmenu'        => 'Paket Menu',
                                    );
                                    //$shirts_on_sale = array('small', 'large');
                                    echo form_dropdown('Choose', $options);
                                ?>
                                <br>
                                <label>Description</label>
                                <?php 
                                    echo form_input("txtdescfood", "", ['id'=>'txtdescfood', 'type'=>'text', 'class'=>'form-control']);
                                ?>
                                <label>Quantity</label>
                                <?php 
                                    echo form_input("txtquantityfood", "", ['id'=>'txtquantityfood', 'type'=>'number', 'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                        
                                <?php 
                                    echo form_submit("btnAddBahanJadi", "Tambah Menu", ['id'=>'btnAddBahanJadi', 'class'=>'btn btn-success']); 
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