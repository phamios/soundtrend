<div id="sidebarcontent">
    <div id="centercontent">
        
    </div>
    <div id="centercontent">
        <?php foreach($contents as $content):?>
            <p><h2><?php echo $content->name?></h2></p>
                <center><img src="<?php echo base_url().'uploads/'.$content->image?>" width="230px" height="150px;" alt="null"/></center>
             <br/>
            <?php echo $content->des; ?>
            
        <?php endforeach;?>
    </div>
    <div id="photogallerycontent">
        <?php $this->load->view('widgetright');?>
    </div>
</div>