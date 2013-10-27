$(document).ready(function(){
 $("#shout_button").click(function(){
   var msg = $("#shout_message").val();
   var nam = $("#shout_name").val();
   var value =  $(this).val();
   $(this).val('sending...');
    var datastring = 'name='+nam+'&msg='+msg;
	$.ajax({
	type:'POST',
	url:'shout.php',
	data:datastring,
	cache:false,
	success:function(){
	 //$("#shouts ul").prepend("<li><span class='shout_post_name'>"+nam+"</span>:"+msg+"</li>").fadeIn();
	 $("#shout_button").val(value);
	 $("#shout_message").val('');
	 $("#shout_name").val('');
	}
	});  
	 
 });

 $("#shouts ul").load("shout.php?show");
  setInterval(function(){
   $("#shouts ul").load("shout.php?show");
 },1000);
 
 $("#chathead").click(function(e) {
    $("#chat").hide();
	 $("#chathead_bottom").show(); 
});
 
 $("#chathead_bottom").hide(); 
 
  
 $("#chathead_bottom").click(function(e) {
    $("#chat").slideToggle();
	 $("#chathead_bottom").hide(); 
});



});