<div id="sidebarcontent">
    <div id="centercontent">
        
    </div>
    <div id="centercontent">
        <?php if($this->session->userdata('lang')=="vietnam"):?>
         Trân trọng cảm ơn bạn: <?php echo $user;?> <br/>
        Mikes Hotel đã nhận được đánh giá của bạn, chúng tôi hy vọng được phục vụ bạn <?php echo $user;?> tốt hơn nữa. Rất vui vì được gặp bạn lần nữa. 
        
        Trân trọng. 
        <?php elseif($this->session->userdata('lang')=="english"):?>
            Thank <?php echo $user;?> for your comment. We hope you will happy with us.
            
            Best Regards.
        <?php else:?>
            <?php echo $user;?>: Merci votre évaluation avis!
        <?php endif;?>
        
    </div>
    <div id="photogallerycontent">
        <?php $this->load->view('widgetright');?>
    </div>
</div>