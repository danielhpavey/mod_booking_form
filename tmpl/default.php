<?php
defined( '_JEXEC' ) or die;

?>

<script src="media/com_customform/js/jquery-2.1.1.js"></script>
<script src="media/com_customform/js/picker.js"></script>
<script src="media/com_customform/js/picker.date.js"></script>
<script src="media/com_customform/js/picker.time.js"></script>
<script src="media/com_customform/js/legacy.js"></script>
<link rel="stylesheet" href="media/com_customform/css/datepicker/default.css" id="theme_base">
<link rel="stylesheet" href="media/com_customform/css/datepicker/default.date.css" id="theme_date">
<link rel="stylesheet" href="media/com_customform/css/datepicker/default.time.css" id="theme_time">
<form name="booking_form" class="form" id="form_idoverride" action="" method="post">        
            
<label for="name">Name
<input type="text" name="name" class="form_input" id="name" required="required"  />
</label>                    

<label for="phone">Phone
<input type="tel" name="phone" class="form_input" id="phone" required="required"  />
</label>                                        

<label for="date">Date Of Visit
<input type="text" name="date" class="form_date" id="datepick"  />
</label>
<script type="text/javascript">
$("#datepick").pickadate({
        min:+1
        ,onStart:function(){this.set("select",+1)}
        ,<?php echo $excludeddates; ?>  
        ,format: "dddd, dd mmm, yyyy"
    })
</script>               

<label for="time">Time Of Visit
<input type="text" name="time" class="form_time" id="timepick"  />
</label>
<script type="text/javascript">
var dateInput = $("#timepick").pickatime({min:[18,30],max:[21,00],onStart:function(){this.set("select",[18,30])},interval:15,}); 
</script>                   

<label for="guest">No Of Guest
<input type="number" name="guest" class="form_number" id="guest" required="required" max="99" min="1"  />
</label>                    

<label for="comment">Comment
<textarea name="comment" class="form_textarea" id="comment"  /></textarea>
</label>                    

<input type="submit" name="submit" class="form_submit" id="submit"  />          
</form> 
