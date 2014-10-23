
 <?php foreach($merchantnews as $news):?>
 	 <div style="clear:both;width=100%;float:right;padding-right:20px;">
        	<span style="text-transform: uppercase;" class="projectheading2" ><a href="<?php echo site_url('home/mndc/'.$news->cateid); ?>"><?php echo $news->catename;?></a></span>
        </div>

 	<?php if($merchantrelates <> null):?> 
        <div id="projectbg" style="height:305px;" style="margin-right:5px;margin-left:5px;">
        <?php else:?>
        <div id="projectbg" style="height:185px;" style="margin-right:5px;margin-left:5px;">
        <?php endif;?>
          <table valign="top" width="100%">
        	<tr>
        		<td>
        		
				</td>
        		<td  align="right">
        			
        		</td>
        	</tr>
        	<tr valign="top" >
        		<td>
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
 					
				</td>
        		<td>
					<div id="projecttxtblank"> 
		            <div id="projecttxt"> 
		            <span class="projectboldtxt" style="text-transform: uppercase; font-size:11px;"> 
						<a href="<?php echo site_url('home/mnd/'.$news->id)?>" class="title"><?php echo $news->name?></a><br/>
						 <span style="font-size:8px;color:grey;"><i><?php echo $news->createdate;?></i></span> 
					</span> 
		            		<br/><?php echo substr($news->des,0,350) ;?><br/>
		            </div> 
		          </div>
				</td>
        	</tr>
        	
        </table>
        <?php if($merchantrelates <> null):?>
        <table width="100%"> 
        	<?php foreach($merchantrelates as $relate):?> 
        	<tr>
        		<td>
	        		<div id="projectthumbal">
		          		<?php if($relate->image == null):?>
					     <img src="<?php echo base_url().'images/image.gif'?>" alt="Image" title="Image"
						class="image"  width=130px; height="117px;"/>
						<?php else:?>
						 <img src="<?php echo base_url().'/uploads/'.$relate->image;?>"
								width=130px; height="117px;"alt="Image" title="Image"
						class="image"/>
						<?php endif;?>
	          		</div>
 					
				</td>
        		<td>
					<div id="projecttxtblank"> 
		            <div id="projecttxt" style="padding-left:35px;"> 
		            <span class="projectboldtxt" style="text-transform: uppercase; font-size:11px;"> 
						<a href="<?php echo site_url('home/mnd/'.$relate->id)?>" class="title"><?php echo $relate->name?></a><br/>
						 <span style="font-size:8px;color:grey;"><i><?php echo $relate->createdate;?></i></span> 
					</span> 
		            		<br/><?php echo substr($relate->des,0,200) ;?><br/>
		            </div> 
		          </div>
				</td>
        	</tr>
        	<?php endforeach;?> 
        	 
        </table>
        <?php endif;?>  
        </div> 
<?php endforeach;?>

 



