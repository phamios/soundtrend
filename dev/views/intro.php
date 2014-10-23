<div id="sidebarcontent">
    <div id="centercontent">
        <?php foreach($intros as $intro):?>
            <h4><?php echo $intro->title;?></h4>
            <?php if($intro->images == null):?>
            <?php else:?>
            <p><img src="<?php echo base_url().'/uploads/'.$intro->images; ?>" alt="" width="260" height="207" class="map" /></p>
            <?php endif;?>
            <p><?php echo $intro->des;?></p>
        <?php endforeach;?>
    </div>
    <div id="photogallerycontent">
        <?php $this->load->view('widgetright');?>
    </div>
</div>