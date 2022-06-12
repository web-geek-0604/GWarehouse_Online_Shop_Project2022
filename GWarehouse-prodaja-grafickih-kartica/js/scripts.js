function validate(){
  var name = document.getElementById("name").value;
  var subject = document.getElementById("subject").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  var error_message = document.getElementById("error_message");
  
  error_message.style.padding = "10px";
  
  var text;
  if(name.length < 2){
    text = "Molimo Vas unesite ispravne podatke!";
    error_message.innerHTML = text;
    return false;
  }
  if(subject.length < 1){
    text = "Molimo Vas unesite ispravan naslov!";
    error_message.innerHTML = text;
    return false;
  }
  if(isNaN(phone) || phone.length != 10){
    text = "Molimo Vas unesite ispravan broj telefona!";
    error_message.innerHTML = text;
    return false;
  }
  if(email.indexOf("@") == -1 || email.length < 6){
    text = "Molimo Vas unesite ispravan email!";
    error_message.innerHTML = text;
    return false;
  }
  if(message.length <= 10){
    text = "Molimo Vas unesite više od 10 karaktera!";
    error_message.innerHTML = text;
    return false;
  }
  alert("Forma je uspešno poslata!");
  return true;
}






