// JavaScript Document

function formValidation()  
{  
var fname = document.AddUser.fnameAU.value;  
var mname = document.AddUser.mnameAU;  
var lame = document.AddUser.lnameAU;  
var gender = document.AddUser.gender;  
var dob= document.AddUser.datepicker;  
var email = document.AddUser.EmailIdAU;  
var contactno = document.AddUser.ContactNoAU;  
var address = document.AddUser.StreetAddressAU;  
var city = document.AddUser.cityAU;  
var state = document.AddUser.stateAU;  
var country = document.AddUser.countryAU;  

if (fname==null || fname=="")
  {
  alert("First name must be filled out");
  return false;
  
  }

}