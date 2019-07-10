// ========================================
// FB 程式 ===================================
// =============================================
window.fbAsyncInit = function() {
  FB.init({
    appId      : '319016928941764',
    status     : true,
    cookie     : true,
    xfbml      : true,
    version    : 'v3.3'
  });
    
  FB.AppEvents.logPageView();  
    
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

// ========================================
// FB 程式 ===================================
// =============================================



// ========================================
// Google 程式 ===================================
// =============================================
gapi.load('auth2', function(){
  // Retrieve the singleton for the GoogleAuth library and set up the client.
  auth2 = gapi.auth2.init({
    client_id: '16322482270-4qjqqd3drnf4j2uoa855a4ljj9m87bgb.apps.googleusercontent.com',
    cookiepolicy: 'https://cardu.srl.tw',
    // Request scopes in addition to 'profile' and 'email'
    //scope: 'additional_scope'
  });
  //attachSignin(document.getElementById('G_login'));

  //-- 套用登入到指定元素 --

  if ($('#G_login').length>0) {

    auth2.attachClickHandler(document.getElementById('G_login'), {},
        function(googleUser) {
          // console.log("Signed in: "+googleUser.getBasicProfile().getId());
          // console.log("Signed in: "+googleUser.getBasicProfile().getName());
          // console.log("Signed in: "+googleUser.getBasicProfile().getImageUrl());
          // console.log("Signed in: "+googleUser.getBasicProfile().getEmail());

          $.ajax({
            url: '../ajax/member_ajax.php',
            type: 'POST',
            data: {
             type:'F_G_aes_encrypt',
             id : googleUser.getBasicProfile().getId()
           },
           success:function (data) {
             $('[name="google_id"]').val(data);
           }
          });

          $('[name="google_email"]').val(googleUser.getBasicProfile().getEmail());
          $('[name="google_name"]').val(googleUser.getBasicProfile().getName());
          $('[name="google_img"]').val(googleUser.getBasicProfile().getImageUrl());
          
          $('[name="ud_email"]').val(googleUser.getBasicProfile().getEmail());
          $('[name="ud_nickname"]').val(googleUser.getBasicProfile().getName());
          check_ud_nickname($('[name="ud_nickname"]').val());

          $('.social_login').append('<p>已關聯google帳號：'+googleUser.getBasicProfile().getEmail()+'</p>');
          $('#G_login').css('display', 'none');

        }, function(error) {
          console.log(JSON.stringify(error, undefined, 2));
       });
  }
  
  else if($('#mem_G_login').length>0){

    auth2.attachClickHandler(document.getElementById('mem_G_login'), {},
        function(googleUser) {
          // console.log("Signed in: "+googleUser.getBasicProfile().getId());
          // console.log("Signed in: "+googleUser.getBasicProfile().getName());
          // console.log("Signed in: "+googleUser.getBasicProfile().getImageUrl());
          // console.log("Signed in: "+googleUser.getBasicProfile().getEmail());

          $.ajax({
            url: '../ajax/member_ajax.php',
            type: 'POST',
            data: {
              type: 'FB_G_login',
              ud_email: googleUser.getBasicProfile().getEmail()
            },
            success:function (data) {
              
              if (data!='') {
                 alert(data+'歡迎登入~');
                 location.reload();
              }
              else{
                 alert('您的Google帳號尚未註冊');
                 location.href="../member/sign_second.php";
              }
            }
          });

        }, function(error) {
          console.log(JSON.stringify(error, undefined, 2));
       });

  }


  


});
// ========================================
// Google 程式 ===================================
// =============================================




$('#mem_FB_login').click(function(event) {
  
 FB.login(function(response) {
   if (response.status === 'connected') {

       FB.api('/me?fields=id,name,email', function(response) {
             // console.log(response.name);
             // console.log(response.id);
             // console.log(response.email);
            $.ajax({
              url: '../ajax/member_ajax.php',
              type: 'POST',
              data: {
                type: 'FB_G_login',
                ud_email: response.email
              },
              success:function (data) {
                
                if (data!='') {
                   alert(data+'歡迎登入~');
                   location.reload();
                }
                else{
                   alert('您的FB帳號尚未註冊');
                   location.href="../member/sign_second.php";
                }
              }
            });
             
           });

    } else {
      // The person is not logged into this app or we are unable to tell. 
    }
 }, {scope: 'public_profile,email'});
});







// GOOGLE 登入
function onSignIn(googleUser) {
  // Useful data for your client-side scripts:
  var profile = googleUser.getBasicProfile();
  //console.log("ID: " + profile.getId()); // Don't send this directly to your server!
  // console.log('Full Name: ' + profile.getName());
  // console.log('Given Name: ' + profile.getGivenName());
  // console.log('Family Name: ' + profile.getFamilyName());
  // console.log("Image URL: " + profile.getImageUrl());
  // console.log("Email: " + profile.getEmail());

  // The ID token you need to pass to your backend:
  // var id_token = googleUser.getAuthResponse().id_token;
  // console.log("ID Token: " + id_token);
}

// GOOGLE 登出
function signOut() {
   var auth2 = gapi.auth2.getAuthInstance();
   auth2.signOut().then(function () {
     console.log('User signed out.');
   });
 }