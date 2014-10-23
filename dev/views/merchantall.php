 		<?php if($merchantnews <> null):?>
		<div class="midheading" style="text-transform: uppercase; padding-left:35px; font-size:18px;">
         	<span class="projectheading2" style="float:right;color:#129EEF;"><a href="<?php echo site_url('home/mndc/'.$cateid); ?>"><?php echo $catename;?></a></span>
        </div>
        <?php endif;?>
        <?php foreach($merchantnews as $news):?>
		<div id="projectbg" style="margin-right:5px;margin-left:5px;">
          <div id="projectthumnail">
          	<?php if($news->image == null):?>
		          	<img src="<?php echo base_url().'images/image.gif'?>" alt="Image" title="Image"
			class="image"  width=130px; height="117px;"/>
			<?php else:?>
				<img src="<?php echo base_url().'/uploads/'.$news->image;?>"
					width=130px; height="117px;" alt="Image" title="Image"
			class="image"/>
			<?php endif;?>
          </div>
          <div id="projecttxtblank">
            <div id="projecttxt">
				<b> <a style="" href="<?php echo site_url('home/mnd/'.$news->id)?>" class="title"><?php echo $news->name?></a></b><br />
					<?php echo substr($news->des,0,120) ;?>  
            </div>
   			  <div id="moreproject"> 
			</div> 
          </div>
        </div>
      
        <?php endforeach;?>
  