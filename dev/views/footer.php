  </div>
      <div id="contentright">
      	 <?php if($this->router->fetch_method() <> 'search'):?>
      	 <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">Search</span> 
			</span>
        </div>
        <div id="galleryblank">
        	<?php echo form_open_multipart('home/search'); ?>
        	<select name="searchtype">
        		<option value="1">Merchant Information</option>
        		<option value="2" selected>Content in site</option>
        	</select><br/>
        	<input type="text" value="" name="searchcontent" /><br/>
        	<span style="float:right;padding-right:25px;"><input type="submit" value="Search" name="submit" id="submit" /></span><br/><br/>
        	<?php echo form_close(); ?> 
        </div>
        <?php endif;?>
         <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">News</span> 
			</span>
        </div>
  
          <div class="righttxt">
          	<ul id="autocontentslide" class="jcarousel jcarousel-skin-tango" >
          		<?php foreach($newmercontents as $row):?>
			     <li class="rightcontenttxt" >
				 	<b>*</b> <a href="<?php echo site_url('home/mnd/'.$row->id)?>"><?php echo substr($row->name,0,30) ;?></a>   
				 	 
				</li> 
				<?php endforeach;?>
			  </ul>
         </div>
        <div id="leftheading">
	          <span class="projectheading" style="text-transform: uppercase; ">
				<span class="rightboldtxt" style="font-size:13px;font-weight:bold; ">Most viewed News</span> 
			</span>
        </div>
       <div id="galleryblank2"> 
          <ul> 
			<?php foreach($contenthots as $content):?>
			 <li><a href="<?php echo site_url('home/mnd').'/'.$content->id;?>">
			 	<?php echo $content->name;?></a>
			 </li> 
			<?php endforeach;?>
          </ul> 
<!--          <div id="rightpic"><a href="#" class="rightpic"></a></div>-->
<!--          <div id="rightpic02"><a href="#" class="rightpic02"></a></div>-->
<!--          <div id="rightpic03"><a href="#" class="rightpic03"></a></div>-->
<!--          <div class="viewbutton"><a href="#" class="view"> view more</a></div>-->
        </div>
        <br/><br/><br/><br/>
        
        <!-- 
        <div class="rightheading" style="padding-top:10px; padding-bottom:10px;">
          <h4>Category Most</h4>
        </div>
       <div id="leftnav"> 
          <ul> 
			<?php foreach($catehots as $cate):?>
			 <li><a href="<?php echo site_url('home/mndc').'/'.$cate->id;?>" class="leftnav">
			 	<?php echo $cate->name;?></a>
			 </li> 
			<?php endforeach;?>
          </ul> 
--><!--          <div id="rightpic"><a href="#" class="rightpic"></a></div>-->
<!--          <div id="rightpic02"><a href="#" class="rightpic02"></a></div>-->
<!--          <div id="rightpic03"><a href="#" class="rightpic03"></a></div>-->
<!--          <div class="viewbutton"><a href="#" class="view"> view more</a></div>-->
<!--        </div>-->
 
        
         
      </div>
    </div>
  </div>
</div>
<div id="footerbg">
  <div id="footerblank">
    	<div style="font-family: Verdana;float:left;font-size:12px;width:55%;color:#F4E7BD;padding-left:50px;padding-top:45px;">
      	  Online Gateway Service of OnePay<br/>
      	 © Copyright by OnePay JSC 2012. All Rights Reserved. <br/><br/>
      	 <img src="http://202.9.84.78/onepay/images/stories/logo_website.png" width="434" height="30" alt="logo"/>
      </div>
       
  </div>
</div>
</body>
</html>
