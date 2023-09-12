


const prices = [100, 13.00, 16.20, 10.05];
const spans = document.getElementsByTagName('span');
const images = document.getElementsByTagName("img");
const checkboxes =  document.getElementsByTagName("input"); //only first 4 (0-3) cuz last two are for checkout fieldset
const checkout_btn = document.getElementById("checkout");
const credit_para = document.getElementById("credit");
const coupon_box = document.getElementById("coupon");
let p_new = document.getElementById("replace_p");
let credit = Number(credit_para.innerHTML.substring(credit_para.innerHTML.indexOf('$')+1));
const new_t1 = document.createTextNode(`Credit: ${Number.parseFloat(credit).toFixed(2)}`);
let count = 0;

// Put the prices in the spans

for(let i = 0 ; i<4; ++i){
      spans[i].innerHTML=`$${prices[i].toFixed(2)}`;
}

// Add 6 event listeners. 
//for all images if you click on image then respective checkbox is clicked
for(let i = 0; i<4; i++){
images[i].addEventListener("click", function(){
  if (!(checkboxes[i].disabled)) {
    checkboxes[i].checked = !(checkboxes[i].checked);
  }
});
}


checkout_btn.addEventListener("click", function(){
//
  const arr = [];
  let i;
  for(i = 0; i<4; ++i){
      if(checkboxes[i].checked===true){
          arr.push(prices[i]);
      }
    }
    let coupon = coupon_box.value;
    validate_coupon_code(coupon);
    sales_total(arr);
    coupon_box.value = "";
    
});
coupon_box.addEventListener("keyup", function(e){
if(e.key==="Enter"){
 const arr = [];
  let i;
  for(i = 0; i<4; ++i){
      if(checkboxes[i].checked===true){
          arr.push(prices[i]);
      }
    }
    let coupon = coupon_box.value;
    validate_coupon_code(coupon);
    sales_total(arr);
    coupon_box.value = "";
}
})

function update_credit() {
const request = new XMLHttpRequest();

//credit_para.innerHTML = `Credit: $${Number.parseFloat(credit).toFixed(2)}`;

request.onload = function() {
  if (this.status === 200) {
    credit_para.innerHTML = `Credit: $${credit.toFixed(2)}`;
  }
};

request.open('POST', 'money.php');
request.setRequestHeader('Content-type','application/x-www-form-urlencoded') //dsata to an html form, seta header, becauser we are not sure
//what to send we will be using the application/x s

request.send(`username=${get_username()}&credit=${credit.toFixed(2)}`);

}                                                                 

function validate_coupon_code(coupon) {
  // Fix this
    if(coupon === 'COUPON5' || coupon ==='COUPON10' || coupon === 'COUPON20'){
    coupon = Number(coupon.split('N')[1]);
    credit+=coupon;
    p_new.innerHTML = '';
    
}
}


function sales_total(arr) {
    let sum=0;
    for(let i = 0; i<arr.length; ++i){
        sum+=arr[i];
    }
    let sum_tax = 0.0725*sum;
      let x_string = String(sum_tax);
      if(x_string[x_string.length - 1] === "5" && x_string[x_string.length - 2] !== "+"){
        if((Number(x_string[x_string.length - 2])%2) === 1){
          sum_tax = Number(Number.parseFloat(sum_tax + .005).toFixed(2));
        }
           sum_tax = Number(Number.parseFloat(sum_tax- .005).toFixed(2));
     
      }
      let x = sum + sum_tax;
  
      x = Number(parseFloat(x).toFixed(2));
      sum = Number(parseFloat(sum).toFixed(2));

  // Calculate the price from only the checked checkboxes

  // Calculate the price with tax

  // Check if you have insufficient credit 
  if(x>credit){
    alert("not enough credit");
    if(p_new.firstChild){
p_new.innerHTML ='';
}
}else{
credit=credit-x;
update_credit();
if(sum!==0){
 let receipt = `&nbsp;&nbsp;$${sum.toFixed(2)}<br>`;
    receipt += '+ sales tax (7.25%)<br>';
    receipt += `= $${x.toFixed(2)}`;
    p_new.innerHTML = receipt;
  // Otherwise update your credit

  // Change checked boxes to be disabled. 
  for(i = 0; i<4; ++i){
      if(checkboxes[i].checked===true){
      checkboxes[i].checked=!checkboxes[i].checked;
          checkboxes[i].disabled=!checkboxes[i].disabled;
      }
    }

}
}


  // Also, check if there are no checked boxes (no displayed message).
  // Update the message in the bottom <p> element. 
}
