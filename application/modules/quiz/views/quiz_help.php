<a class="button bg-color-green fg-color-white" id="quiz-back-btn"  ><i class="icon-arrow-left-2" ></i>Kembali ke Kuis</a>

<hr />

<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/pagecontrol.js"></script>

<br>

<div class="span8">
    <div id="list-quiz-resource-area">
        <img src="<?php echo site_url().'asset/help/cara-membuat-kuis.jpg'?>" width="99%"/>
    </div>
    
</div>


<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>

<script type="text/javascript">


    $('a#quiz-back-btn').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        $('#content-right').load("<?php echo site_url('quiz/index') ?>",function(){
            $('#loading-template').fadeOut("slow");
        });
    });


</script>