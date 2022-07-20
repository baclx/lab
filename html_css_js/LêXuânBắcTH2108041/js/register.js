var btnSubmit = document.getElementById("btnSubmit");
if(btnSubmit!=null){
    btnSubmit.onclick = function (){
        validateForm();
    }
}
function validateForm(){
    //name
    var nameInput = document.forms["member"].elements["name"];
    var name = nameInput.value;
    if(name.length === 0){
        nameInput.nextElementSibling.innerHTML ="Vui lòng nhập họ và tên";
    }else if (name.length > 50){
        nameInput.nextElementSibling.innerHTML ="Tên có quá nhiều ký tự";

    }else {
        nameInput.nextElementSibling.innerHTML ="";

    }
    //email
    var emailInput = document.forms["member"].elements["email"];
    var email = emailInput.value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)) {
        alert('Hay nhap dia chi email hop le.\nExample@gmail.com');
        email.focus;
    }
    //Phone
    var phoneInput = document.forms["member"].elements["phone"];
    var phone = phoneInput.value;
    if(phone.length === 0){
        phoneInput.nextElementSibling.innerHTML ="Vui long nhap so dien thoai cua ban";
    }else {
        phoneInput.nextElementSibling.innerHTML ="";
    }
    //gender
    var genderInpput = document.forms["member"].elements["gender"];
    var gender = genderInpput.value;
    if(gender !== "Nam" && gender !== "Nữ"){
        alert("Bat buoc phai chon gioi tinh");
    }
    //
    var sothich1 = document.forms["member"].elements["sothich1"].value;
    var sothich2 = document.forms["member"].elements["sothich2"].value;
    var sothich3 = document.forms["member"].elements["sothich3"].value;
    var sothich4 = document.forms["member"].elements["sothich4"].value;
    //
    var introduce = document.forms["member"].elements["introduce"].value
    //
    var object={
        "Họ và tên" : name,
        "email" : email,
        "Phone" : phone,
        "Giới tính": gender,
        "Sở thích": sothich1 , sothich2, sothich3, sothich4,

    }
    console.log(object);

}