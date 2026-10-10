const CHARGES = {
reg: 1000,
perDay: 500,
workshop: 750,
meal: 300
};

function validateForm(){
let valid = true;
document.querySelectorAll('.error').forEach(e=>e.style.display='none');

if(document.getElementById('fullname').value.trim() == ""){
document.getElementById('errName').style.display='block';
valid = false;
}
let email = document.getElementById('email').value;
if(email.indexOf('@') == -1 || email.indexOf('.') == -1){
document.getElementById('errEmail').style.display='block';
valid = false;
}
let phone = document.getElementById('phone').value;
if(phone.length != 10 || isNaN(phone)){
document.getElementById('errPhone').style.display='block';
valid = false;
}
let days = document.getElementById('days').value;
if(days < 1 || days > 3){
document.getElementById('errDays').style.display='block';
valid = false;
}
if(document.getElementById('category').value == ""){
document.getElementById('errCategory').style.display='block';
valid = false;
}
return valid;
}

function showWorkshop(){
let cat = document.getElementById('category').value;
if(cat == "workshop"){
document.getElementById('workshopDiv').style.display='block';
}else{
document.getElementById('workshopDiv').style.display='none';
document.getElementById('workshop').value='none';
}
calculateFee();
}

function calculateFee(){
let days = parseInt(document.getElementById('days').value) || 0;
let cat = document.getElementById('category').value;
let workshop = document.getElementById('workshop').value;
let meal = document.getElementById('mealOption').value;

let attend = days * CHARGES.perDay;
let wFee = (cat == "workshop" && workshop != "none") ? CHARGES.workshop : 0;
let mFee = (meal == "yes") ? days * CHARGES.meal : 0;
let subtotal = CHARGES.reg + attend + wFee + mFee;
let discount = 0;
if(days == 3){
discount = subtotal * 0.10;
}
let total = subtotal - discount;

document.getElementById('displayReg').innerText = "KSh " + CHARGES.reg;
document.getElementById('displayAttend').innerText = "KSh " + attend;
document.getElementById('displayWorkshop').innerText = "KSh " + wFee;
document.getElementById('displayMeal').innerText = "KSh " + mFee;
document.getElementById('displayDiscount').innerText = "KSh " + discount;
document.getElementById('totalFee').innerText = "KSh " + total;
}

function initPage(){
calculateFee();
}
document.addEventListener('DOMContentLoaded', initPage);