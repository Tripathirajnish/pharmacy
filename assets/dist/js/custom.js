$('document').ready(function(){
  //------------- Permission --------------------//
 $('.permission-ul li').click(function(){
     $('.permission-ul li').removeClass('permission-active');
     $(this).addClass('permission-active');
 });
  
  $('.permission-ul li').click(function(){
    var tab_location = $(this).find('a').attr('profile_id');
    window.location.href = $(location).attr("href").replace(/\?.*/,'')+'?tab_name='+tab_location;
  });
  var values = new Array();
  var check_value = 0;
  $('.assign_permission').click(function(){
    var profile_id = $('#profile_id').val();
    var check_id = $(this).attr('check-id');
    var data = check_id.split("_");
    if($(this).prop("checked") == true){
      check_value = 1;
     } else {
      check_value = 0;
     }
     var role_id = data[0];
     var permission = data[1];
     var tab_id  = data[2];
    $.ajax({
      url:'permissionController/submitPermission',
      type:'post',
      data:{role_id:role_id,permission:permission,check_value:check_value,tab_id:tab_id},
      success:function(data_value){
        if(data_value == 'updated'){
          showmessage('success','Updated Successfully');
        } else  {
          showmessage('error','Error...!');
        }
      }
    });
  });
  $(".nav-treeview").each(function( index ) {
        var text = $(this).find('li').length;
        if(text == 0){
          $(this).parent().css('display', 'none');
        }
    });
});
function showmessage(type,message){
  var html = '';
  if(type == 'success') {
    html = '<div class="showmsg success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><p>'+message+'</p></div>';
  } else {
    html = '<div class="showmsg success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><p>'+message+'</p></div>';
  }
  $('body').append(html);
  setTimeout(function(){
    $('.showmsg').remove();
  },1000)
  
}

