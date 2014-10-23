<div class="midtxt">
<?php foreach($contents as $news):?>
<a href="<?php echo base_url(); ?>" >Home</a> -> <a href="<?php echo base_url().'index.php/home/merchant/' ?>" >Merchant</a> -> <a href="<?php echo base_url().'index.php/home/mndc/'.$news->cateid; ?>" ><?php echo $news->catename ?></a>
<br/><br/>
<div class="headercate"><h3><?php echo $news->name;?></h3><?php echo $news->createdate;?></div>
<div style="clear: both;">
<?php if($news->image == null):?> 
	<img width="100px" height="100px" src="<?php echo base_url('uploads/defaultimage.jpg');?>" alt="<?php echo $news->name;?>"/> 		
<?php else:?>
	<img width="100px" height="100px" src="<?php echo base_url('uploads/'.$news->image);?>" alt="<?php echo $news->name;?>"/>
<?php endif;?>

</div>
<div style="clear: both;">
<?php echo $news->des;?>
</div>

<hr/>
<div style="float:right; padding-right:10px; clear:both;">
<img src="http://code.google.com/p/pidgin-facebookchat/logo?cct=1327744633" width=30px height=30px />
<img src="http://www.easychirp.com/images/iconsSocial/twitter.png" width=30px height=30px />
<img src="http://cdn1.iconfinder.com/data/icons/socialnetworkspro/64/Tumblr.png" width=30px height=30px />
<img src="http://cdn4.iconfinder.com/data/icons/elegantmediaicons/PNG/stumbleupon.png" width=30px height=30px />
<img src="http://icons.iconarchive.com/icons/danleech/simple/256/path-icon.png" width=30px height=30px />
</div>
<br/>
<br/>
<b><font color="red"><?php echo $error;?></font></b>
<?php echo form_open_multipart('home/mnd/'.$news->id); ?>
<input type="hidden" value="<?php echo $news->id;?>" name="idcontent" />
<input type="hidden" value="<?php echo $news->name;?>" name="contentname" />

<table>
	<tr>
		<td></td>
		<td><input type="text" name="name_comment" /> Name ( email )</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="link_yoursite" /> Link web</td>
	</tr>
	<tr>
		<td></td>
		<td><textarea name="text_comment" id="text_comment" cols="45%" rows="10" tabindex="4"></textarea></td>
	</tr>
	<tr>
		<td></td> 
		<td><input type="submit" name="makecomment" value="Post Comment "/></td>
	</tr>
</table>
<?php echo form_close(); ?>
<?php endforeach;?> 
</div>
<?php foreach($comments as $comment):?>
<div id="purposetxt">
	<b><?php echo $comment->name;?></b>:&nbsp; <?php echo $comment->message;?><br/>
	<i><?php echo $comment->created_at	;?></i>
	
 </div>
 <?php endforeach;?>