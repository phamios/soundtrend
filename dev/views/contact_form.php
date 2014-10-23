 <div class="midtxt">
           <span class="midboldtxt">
 				<?php if($notification <> null): ?> 
					 <?php echo $notification;?> 
				<?php endif;?>
 			</span>  
        
            <?php echo form_open_multipart('home/contact_form'); ?>
			<table border="0" >
				<tr>
					<td>Name:</td>
					<td>&nbsp;&nbsp;<input type="text" name="name_comment" /></td>
				</tr>
				<tr>
					<td>Phone: </td>
					<td>&nbsp;&nbsp;<input type="text" name="phone_comment" /></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>&nbsp;&nbsp;<input type="text" name="email_comment" /></td>
				</tr>
				<tr>
					<td>Title:</td>
					<td>&nbsp;&nbsp;<input type="text" name="subject_comment" /></td>
				</tr>
				<tr>
					<td>Content:</td>
					<td>&nbsp;&nbsp;<textarea name="text_comment" rows=8 cols=35 id="text_comment"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><?php echo $captcha;?>
					 <script type="text/javascript">
					 var RecaptchaOptions = {
					    theme : 'white'
					 };
					 </script>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>&nbsp;&nbsp;<input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
			
			<?php echo form_close(); ?> 
  
 </div>