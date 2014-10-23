<script>
  $(document).ready(function(){
    $('#addcomment').submit(function() {
      msg = $('.input').val(); // get the message
      if (msg.length > 100) // make sure character are within the limit, this is optional
      {
        alert("Characters must be only 100");
      }else if (msg == ""){
        alert("Please enter a message");
      }else{
        $('input[type=submit]').attr('disabled', true); // to prevent multiple insert at once
        $.ajax({
          type: "POST",
          url: "/insertcomment.php",
          data: "msg=" + msg,
          cache: false,
          success: function(html){
            $('#listdiv').append(html);
            $('#listdiv .list:last').hide().slideDown('slow'); // for effects only
            $('.input').val("");// reset the textarea value
             $('input[type=submit]').attr('disabled', false);
          }
        });
      }
      return false;
    });
  });
</script>
<div id="sidebarcontent">
    
    <div id="centercontent"> 
        <div class="addcomment">
           <?php echo form_open_multipart('home/_addcomment'); ?>
                <div style="float:left;padding-left: 10px; padding-right: 10px;">
                    <img src="<?php echo base_url();?>images/icon.png" />
                </div>
                <div style="float:left;">
                    <div class="icon">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="usename" /></td>
                            </tr>
                            <tr>
                                <td>Your message:</td>
                                <td><textarea class="input" id="message" name=""message></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="submit" value="Comment"/></td>
                            </tr>
                        </table>
                    </div>
           <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    
    <div id="centercontent">
        <div class="list">
            <?php foreach($danhgia as $bai):?>
            <div class="message" style="-moz-border-radius: 10px;-webkit-border-radius: 10px; padding-left: 10px; border: grey solid 1px; clear: both; margin-bottom: 10px;">
                <span style="color:black;text-decoration: underline;font-weight: bold;"><?php echo $bai->name?></span>: <?php echo $bai->message;?><br />
                <span style="text-shadow: 10px; font-size: 9px;"><?php echo $bai->created_at; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    
    <div id="photogallerycontent">
        <?php $this->load->view('widgetright');?>
    </div>
</div>