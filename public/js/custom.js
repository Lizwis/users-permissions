
$(function() {
  $("[name=toggleRoles]").click(function(){
          $('.toHide').hide();
          $("#toggle-role-"+$(this).val()).show('slow');
  });
});

// $("#toggle-role-1").click(function() {
//   $("#customRoleName").val("");
// });

$('input[type=radio][name=toggleRoles]').change(function() {
  if (this.value == '1') {
    $("#customRoleName").val("");
      $( "#permission1" ).prop( "checked", false );
      $( "#permission2" ).prop( "checked", false );
      $( "#permission3" ).prop( "checked", false );
      $( "#permission4" ).prop( "checked", false );
      $( "#permission5" ).prop( "checked", false );
  }
  else if (this.value == '2') {
    $("#role").val("");
    
  }
});