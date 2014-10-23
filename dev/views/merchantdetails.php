<?php foreach($mrtsdetail as $row):?>  
		 <div id="projecttxtblank">
            <div id="projecttxt">
			<b><?php echo $row->name;?></b><br/>Registed in: <span class="projectheading">(<?php echo $row->createdate;?>)</span> 
			</div>
		</div>
        <div id="projectbg" style=" clear:both;">
          <div id="projectthumnail">
          	<?php if($row->logo == null):?> 
          		
          	<?php else:?>
          		<img src="<?php echo base_url().'/uploads/'.$row->logo;?>" width="130px"/>
          	<?php endif;?>
          </div> 
        </div>
        <div id="projecttxtblank" style="width:100%;">
            <div id="purposetxt" style="width:90%;padding-right:10px; padding-left:10px;margin-bottom:10px;">
           	 	<?php echo $row->des;?>
            </div> 
          </div>
	 
		<div style="clear:both;">
        <div id="purposetxt">
			<?php echo $row->hint;?>
		</div>
        <div id="purposetxt">
        	<table>
        		<tr>
        			<td>Category: </td>
        			<td><a class="purposenav" href="<?php echo site_url('home/mndc/'.$row->catemerchantid); ?>"><?php echo $row->catenamemerchant;?></a></td>
        		</tr>
        		<tr>
        			<td>Telephone: </td>
        			<td><?php echo $row->tel;?></td>
        		</tr>
        		<tr>
        			<td>Fax: </td>
        			<td><?php echo $row->fax;?></td>
        		</tr>
        		<tr>
        			<td>Address: </td>
        			<td><?php echo $row->location;?></td>
        		</tr>
        		<tr>
        			<td>Website: </td>
        			<td><a href="<?php echo $row->web;?>"><?php echo $row->web;?></a></td>
        		</tr>
        	</table> 
        	<p><a href="<?php echo site_url('home/mrtsc').'/'.$row->userid?>">All Contents that created by <?php echo $row->name;?></a></p> 
         </div>
         </div>
<?php endforeach;?>