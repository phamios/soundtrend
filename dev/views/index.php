<div id="sidebar">
    <div class="order">
           <?php $this->load->view('checkroom');?>
    </div>
    <div class="block">
            <h4>Địa chỉ </h4>
            <p>Lời dẫn đường </p>
            <img src="<?php echo base_url(); ?>images/map-mikes.png" alt="" width="304" height="207" class="map" /><br />
            <a  href="<?php echo base_url(); ?>images/map-mikes.png">ZOOM</a>
    </div>
    </div>
    <div id="center">
    <?php foreach($intros as $intro):?>    
    
    <div class="block">
            <h4><?php echo $intro->title;?></h4>
            <?php if($intro->images == null):?>
            <?php else:?>
            <p><img src="<?php echo base_url().'/uploads/'.$intro->images; ?>" alt="" width="100px" height="100px" class="map" /></p>
            <?php endif;?>
            <p><?php echo substr($intro->des,0,300) ;?></p>
            <?php if($this->session->userdata('lang')=="vietnam"):?>
            <a href="<?php echo base_url().'home/intro/'.$intro->id;?>" class="more">Xem tiếp </a>
            <?php elseif($this->session->userdata('lang')=="english"):?>
            <a href="<?php echo base_url().'home/intro/'.$intro->id;?>" class="more">More info</a>
            <?php else:?>
            <a href="<?php echo base_url().'home/intro/'.$intro->id;?>" class="more">Plus d'info</a>
            <?php endif;?>
            
    </div>
    <?php endforeach;?>
    
    </div>
    <div id="photogallery">
        <?php $this->load->view('widgetright');?>
    </div>