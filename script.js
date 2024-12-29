
 function signUp() {

    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");
 
    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                
                window.location = "signin.php";
            } else {
                alert (text);
            }
        }
    }

    request.open("POST", "signupProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t = "success") {
                window.location = "home.php";
            }else if(t = "Something went wrong with your account"){
                document.getElementById("msg2").innerHTML = t;
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

function Logout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                // window.location = "home.php";
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }; 

    r.open("GET", "LogoutProcess.php", true);
    r.send();

}

function LogoutAdmin() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "adminSignin.php";
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }; 

    r.open("GET", "LogoutAdminProcess.php", true);
    r.send();

}


var av;
function adminVerification(){
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("e",email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Success"){
                var adminVerificationModal = document.getElementById("verificationModal");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            }else{
                alert(t);
            }
        }
    }

    r.open("POST","adminVerificationProcess.php",true);
    r.send(f);
}

function verify(){
    var verification = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                av.hide();
                window.location = "dashboard.php";
            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","verificationProcess.php?v="+verification.value,true);
    r.send();
}


function addNewCategory(){
   window.location("addCourses.php");
}




function changeProductImage(){
    

   
        var view = document.getElementById("i");//img tag
        var file = document.getElementById("imageuploader");//file chooser
    
        file.onchange = function () {
            var file1 = this.files[0];
            var url = window.URL.createObjectURL(file1);
            view.src = url;
        }
    
    }
    
      
    function addProduct() {
        var t1 = document.getElementById("t1");
        var t2 = document.getElementById("t2");
        var yl = document.getElementById("yl");
        var c = document.getElementById("c");
        var re = document.getElementById("r");
        var desc = document.getElementById("desc");
        var w = document.getElementById("w");
        var cost = document.getElementById("cost");
        var l = document.getElementById("l");
        var h = document.getElementById("h");
    
        var images = document.getElementById("imageuploader");
    
        var f = new FormData();
    
        f.append("t1", t1.value);
        f.append("t2", t2.value);
        f.append("yl", yl.value);
        f.append("c", c.value);
        f.append("re", re.value);
        f.append("desc", desc.value);
        f.append("w", w.value);
        f.append("cost", cost.value);
        f.append("l", l.value);
        f.append("h", h.value);
    
        if (images.files.length == 0) {
            var confirmation = confirm("Are you sure you don't want to update the profile image?");
            if (!confirmation) {
                return;
            }
        } else {
            f.append("image", images.files[0]);
        }
    
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function () {
            if (r.readyState === 4) {
                var t = r.responseText;
                if (r.status === 200) {
                    if (t.trim() === "Product saved successfully") {
                        window.location.reload();
                    } else {
                        alert(t);
                    }
                } else {
                    alert("An error occurred: " + r.statusText);
                }
            }
        };
    
        r.open("POST", "addCourseProcess.php", true);
        r.send(f);
    }
    
   
    
  

function basicSearch(x){

    var txt = document.getElementById("basic_search_txt");
    

    var f = new FormData();
    f.append("t",txt.value);
   
    f.append("page",x);

    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t; 
            
        }
    }

    r.open("POST","basicSearchProcess.php",true);
    r.send(f);

}

function watchSearch(x){

    var txt = document.getElementById("basic_search_txt");
    

    var f = new FormData();
    f.append("t",txt.value);
   
    f.append("page",x);

    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t; 
            
        }
    }

    r.open("POST","watchlistSearch.php",true);
    r.send(f);

}
function addToCart(id){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if (t == "success"){
                alert("Product added to cart succesfully");
                window.location.reload();

            }else{
                alert (t);
            }
        }
    }

    r.open("GET","addToCartProcess.php?id="+id,true);
    r.send();

 }
 function deleteFromCart(id){
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if(r.readyState ==4){
        var t = r.responseText;
        if (t == "success"){
         alert("Product removed from cart");
         window.location.reload();

        }else{
            alert (t);
        }
    }
  }

  r.open("GET","deleteFromCartProcess.php?id="+id,true);
  r.send();

 }
 var pm;
 function viewProductModal(id){
     var m = document.getElementById("viewProductModal"+id);
     pm = new bootstrap.Modal(m);
     pm.show();
 }

 var um;
 function viewUserModal(email){
     var m = document.getElementById("viewUserModal"+email);
     um = new bootstrap.Modal(m);
     um.show();
 }

 function addToWatchlist(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () { 
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "removed  "){
                document.getElementById("heart"+id).style.className = "text-dark";
                window.location.reload();
            }else if(t == "added  "){
                document.getElementById("heart"+id).style.className = "text-danger";
                window.location.reload();
            }else{
                alert (t);
            }
        }
     }
    
    r.open("GET","addToWatchlistProcess.php?id="+id,true);
    r.send();
 }
 function removeFromWatchlist(id){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert (t);
            }
        }
    }

    r.open("GET","removeWatchlistProcess.php?id="+id,true);
    r.send();

 }
function changeImage() {
    var view = document.getElementById("viewImg");//img tag
    var file = document.getElementById("profileimg");//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function updateProfile(){
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
   var mobile = document.getElementById("mobile");
    var image = document.getElementById("profileimg");
    var address = document.getElementById("address");


    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("a", address.value);
    f.append("m", mobile.value);
 

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f); 
}
function changeAdminImage() {
    var view = document.getElementById("viewImg");//img tag
    var file = document.getElementById("profileimg");//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function updateAdminProfile(){
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
   var mobile = document.getElementById("mobile");
    var image = document.getElementById("profileimg");
    


    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    
    f.append("m", mobile.value);
 

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateAdminProfileProcess.php", true);
    r.send(f);
}
var bm;
function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            }else{
                alert(t);
            }
            
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function resetpw(){

    var email = document.getElementById("email2");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");
    
    var f = new FormData();
    f.append("e",email.value);
    f.append("n",np.value);
    f.append("r",rnp.value);
    f.append("v",vcode.value);
    
    var r = new XMLHttpRequest();
    
    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
    
                bm.hide();
                alert ("Password reset success");
                window.location.reload();
    
            }else{
                alert (t);
            }
            
        }
    };
    
    r.open("POST","resetPassword.php",true);
    r.send(f);
    
    }
    function showPassword1(){

        var i = document.getElementById("npi");
        var eye = document.getElementById("e1");
    
        if(i.type == "password"){
            i.type = "text";
            eye.className = "bi bi-eye-fill";
        }else{
            i.type = "password";
            eye.className = "bi bi-eye-slash-fill";
        }
    
    }
    
    function showPassword2(){
    
        var i = document.getElementById("rnp");
        var eye = document.getElementById("e2");
    
        if(i.type == "password"){
            i.type = "text";
            eye.className = "bi bi-eye-fill";
        }else{
            i.type = "password";
            eye.className = "bi bi-eye-slash-fill";
        }
    
    }

function changeProductImage(){
    var image = document.getElementById("imageuploader");

    image.onchange = function (){

        var file_count = image.files.length;

        if(file_count <= 1){

            for(var x = 0;x < file_count;x++){
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }

        }else{
            alert ("Please select 1 image.");
        }

    }
}
function sendId(id){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location = "updateProduct.php";
            }else{
                alert (t);
            }
        }
    }

    r.open("GET","sendProductIdProcess.php?id=" + id,true);
    r.send();
    
}
function updateProduct(){
    
    var t1 = document.getElementById("t1");
    var t2 = document.getElementById("t2");
    var h = document.getElementById("h");
    var l = document.getElementById("l");
    var desc = document.getElementById("desc");
    var images = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("t1",t1.value);
    f.append("t2",t2.value);
    f.append("h",h.value);
    f.append("l",l.value);
    f.append("desc",desc.value);

    if (images.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", images.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "File type not allowed!Product has been Updated!"){
                window.location = "products.php";
             } else if(t == "successProduct has been Updated!"){
                window.location = "products.php";
            } else if(t == "Please select a valid image.Product has been Updated!"){
                alert ("Please select a valid image") ;
                window.location.reload();
            }else{
                alert (t);
            }
        }
    }

    r.open("POST","updateProcess.php",true);
    r.send(f);
    
}
function viewMessages(from) {
    
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {




        
     
   
            document.getElementById("chat_box").innerHTML = r.responseText;
            document.getElementById("reciver").innerHTML = from;

        }
    }
    r.open("GET", "viewMessageProcess.php?email=" + from, true);
    r.send();
}




function sendMsg(type) {

    var recever_mai = document.getElementById("other");
    var msg_txt = document.getElementById("msgtxt");
    
    var f = new FormData();
    f.append("rm", recever_mai.innerHTML);
    f.append("mt", msg_txt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                if(type == "user"){
                    window.location = "message.php";
                }else if(type == "admin"){
                    window.location = "manageusers.php";
                }
              
            }
        }
    }
    r.open("GET", "sendMessageProcess.php?type="+type, true);
    r.send(f);

}
function blockProduct(id){

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var txt = request.responseText;
            if(txt == "Deactivated"){
                document.getElementById("pb"+id).innerHTML = "Activate";
                document.getElementById("pb"+id).classList = "btn btn-info";
            }else if(txt == "Activated"){
                document.getElementById("pb"+id).innerHTML = "Deactivate";
                document.getElementById("pb"+id).classList = "btn btn-dark";
            }else{
                alert (txt);
            } 
        }
    }

    request.open("GET","productBlockProcess.php?id="+id,true);
    request.send();

}
function blockUser(email){

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var txt = request.responseText;
            if(txt == "SuccessDeactivated"){
                document.getElementById("ub"+email).innerHTML = "Activate";
                document.getElementById("ub"+email).classList = "btn btn-info";
                window.location.reload();
            }else if(txt == "SuccessActivated"){
                document.getElementById("ub"+email).innerHTML = "Deactivate";
                document.getElementById("ub"+email).classList = "btn btn-dark";
            }else{
                alert (txt);
            }
        }
    }

    request.open("GET","userBlockProcess.php?email="+email,true);
    request.send();

}

function deleteFromProduct(id){
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if(r.readyState ==4){
          var t = r.responseText;
          if (t == "success"){
           alert("Product removed from courses");
           window.location.reload();
  
          }else{
              alert (t);
          }
      }
    }
  
    r.open("GET","deleteFromProductProcess.php?id="+id,true);
    r.send();
  
   }

   function deleteFromUser(email){
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if(r.readyState ==4){
          var t = r.responseText;
          if (t == "success"){
           alert("User removed by the admin");
           window.location.reload();
  
          }else{
              alert (t);
          }
      }
    }
  
    r.open("GET","deleteFromUserProcess.php?email="+email,true);
    r.send();
  
   }

   function sendMsg() {

    
    var s = document.getElementById("s");
    var m = document.getElementById("m");
   

    var form = new FormData;
    
    form.append("s", s.value);
    form.append("m", m.value);
    

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status==200) {
            var t = request.responseText;
            if (t ="success") {  
                alert("Your msg sent to the softlearner admin");
           window.location.reload();
            } else {
                alert(t);
            } 
        }
    }

    request.open("POST", "newAdMsgProcess.php", true);
    request.send(form);

}
var re1;
function reply(id) {
   
    var adminReplyModal = document.getElementById("replyModal"+id);
                re1 = new bootstrap.Modal(adminReplyModal);
                re1.show();
}



function send(){
   
    var c = document.getElementById("c");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "successsuccesssuccesssuccesssuccesssuccesssuccess"){
                alert("Reply sent to the user");
                re1.hide();
                
            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","adminReplyProcess.php?c="+c.value,true);
    r.send();
}
var f;
function feedback() {
   
    var  feedback= document.getElementById("feedback");
                f = new bootstrap.Modal(feedback);
                f.show();
}
 
function sendFeedback(){
 
    var fft= document.getElementById("fft");
    var fpid= document.getElementById("fpid");
    var ftxt= document.getElementById("ftxt");
    var ffname= document.getElementById("ffname");
    var flname= document.getElementById("flname");
    var femail= document.getElementById("femail");

    var form = new FormData;
    
    form.append("fft", fft.value);
    form.append("fpid", fpid.value);
    form.append("ftxt", ftxt.value);
    form.append("ffname", ffname.value);
    form.append("flname", flname.value);
    form.append("femail", femail.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status==200) {
            var t = request.responseText;
            if (t ="success") {  
                alert("Your feedback sent to the softlearner admin");
           window.location.reload();
            } else {
                alert(t);
            } 
        }
    }

    request.open("POST", "feedbackSendingProcess.php", true);
    request.send(form);

}

function contact(){
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    var form = new FormData();
    form.append("subject", subject);
    form.append("message", message);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var t = request.responseText;
            if (t === "success") {  
                alert("Your message was sent to the softlearner contact team");
                window.location.reload();
            } else {
                alert(t);
            } 
        }
    }

    request.open("POST", "contactProcess.php", true);
    request.send(form);
}



 function addToRecents(id){
   
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert (t);
            }
        }
    }
  
    r.open("GET","addToRecentsProcess.php?id="+id,true);
    r.send();
  
   }

   function sort1(x){

    var search = document.getElementById("s");
    var time = "0";

    if(document.getElementById("n").checked){
        time = "1";
    }else if(document.getElementById("o").checked){
        time = "2";
    }

    var price = "0";

    if(document.getElementById("h").checked){
        price = "1";
    }else if(document.getElementById("l").checked){
        price = "2";
    }

   
    var f = new FormData();
    f.append("s",search.value);
    f.append("t",time);
    f.append("q",price);
   

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;

            document.getElementById("sort").innerHTML = t;
            
        }
    }

    r.open("POST","sortProcess.php",true);
    r.send(f);
    
}

function clearSort(){
    window.location.reload();
}


function payNow(id) { 
     var r = new XMLHttpRequest();
r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);
            
            var email = obj["email"];
            var amount = obj["amount"];

            if (t == "1") {
                alert("Please log in or sign up");
                window.location = "signin.php";
            
            } else {
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId,id,email,amount);
                    // Note: validate the payment and show success or failure page to the customer
                };
               
                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221748",    // Replace your Merchant ID
                    "return_url": "http://localhost/Nova/singleProductView.php?id" + id,     // Important
                    "cancel_url": "http://localhost/Nova/singleProductView.php?id" + id,     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "hash":obj["hash"],
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": email,
                    "phone": obj["mobile 01"],
                    "address":"",
                    "city": "",
                    "country": "Sri Lanka",
                    "delivery_address": "",
                    "delivery_city": "",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                    
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function payNow(id) {
                   
                    payhere.startPayment(payment);
                //};
            }

        }
    }

    r.open("GET", "buyNowProcess.php?id=" + id, true)
    r.send();

}

function cartPayNow() {
    
    var r = new XMLHttpRequest();
  // alert(total) ;

r.onreadystatechange = function () {
       if (r.readyState == 4) {
           var t = r.responseText;
           var obj = JSON.parse(t);
           
           var email = obj["email"];
           var amount = obj["amount"];

           if (t == "1") {
               alert("Please log in or sign up");
               window.location = "signin.php";
           
           } else {
               // Payment completed. It can be a successful failure.
               payhere.onCompleted = function onCompleted(orderId) {
                   
                  console.log("Payment completed. OrderID:" + orderId);

                  cartSaveInvoice(orderId,email,amount);
                    //Note: validate the payment and show success or failure page to the customer
              };

              payhere.onDismissed = function onDismissed() {

                console.log("Payment dismissed");
              };
               // Put the payment variables here
               var payment = {
                   "sandbox": true,
                   "merchant_id": "1221748",    // Replace your Merchant ID
                   "return_url": "http://localhost/Nova/cart.php",     // Important
                   "cancel_url": "http://localhost/Nova/cart.php",     // Important
                   "notify_url": "http://sample.com/notify",
                   "order_id": obj["id"],
                   "items": obj["item"],
                   "amount": amount,
                   "currency": "LKR",
                   "hash":obj["hash"],
                   "first_name": obj["fname"],
                   "last_name": obj["lname"],
                   "email": email,
                   "phone": obj["mobile 01"],
                   "address":"",
                   "city": "",
                   "country": "Sri Lanka",
                   "delivery_address": "",
                   "delivery_city": "",
                   "delivery_country": "Sri Lanka",
                   "custom_1": "",
                   "custom_2": ""
                   
              };

                //Show the payhere.js popup, when "PayHere Pay" is clicked
                document.getElementById('payhere-payment').onclick = function payNow(id) {
                  
                   payhere.startPayment(payment);
               };
          }

       }
   }

   r.open("GET", "cartBuyNowProcess.php", true)
  r.send();

}

function saveInvoice(orderId,id,mail,amount){

    var f = new FormData();
    f.append("o",orderId);
    f.append("i",id);
    f.append("m",mail);
    f.append("a",amount);
    

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "1"){
                window.location = "invoice2.php?id=" + orderId;
            }else{
                alert(t);
            }
        }
    }

    r.open("POST","saveInvoice.php",true);
    r.send(f);

}

function cartSaveInvoice(orderId,email,amount){

    var f = new FormData();
    f.append("o",orderId);
    
    f.append("m",email);
    f.append("a",amount);
    

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "1"){
                window.location = "invoice3.php?id=" + orderId;
            }else{
                alert(t);
            }
        }
    }

    r.open("POST","cartSaveInvoice.php",true);
    r.send(f);

}

function printInvoice(){
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = body;
}

function printReport(){
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = body;
}

 

var md;
function addFeedback(id) {
    
        var feed = document.getElementById("feedbackModal" + id);
        md = new bootstrap.Modal(feed);
        md.show();
    
}

function saveFeedback(id){

    var type;
    if(document.getElementById("type1").checked){
        type = 1;
    }else if(document.getElementById("type2").checked){
        type = 2;
    }else if(document.getElementById("type3").checked){
        type = 3;
    }

    var feedback = document.getElementById("feed");

    var f = new FormData();
    f.append("t",type);
    f.append("p",id);
    f.append("f",feedback.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "1"){
                md.hide();
            }else{
                alert (t);
            }
        }
    }

    r.open("POST","saveFeedbackProcess.php",true);
    r.send(f);

}

function a(){

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var t = request.responseText;
            alert(t);
    }
}
}