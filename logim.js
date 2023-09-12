//logim .js 


const enter = document.getElementsByTagName('input')[1];
enter.addEventListener('keyup', function(e) {
	    if (e.key === 'Enter') {
      	mocking() //pass the variable by vaue 
 
        //href = "C:\Users\prima\Documents\pic 40a\hw 3\index.html";
    } //when relase a key records what key used 
});

const para = document.getElementsByTagName('input')[2];
para.addEventListener('click', function(e) { //define the function within the EventListener 
	mocking()
    //href = "C:\Users\prima\Documents\pic 40a\hw 3\index.html";
});


  
  
function mocking() {
 let message = [];
	 let get =document.getElementById('Password')
   let password= get.value
   message.push('Somebody knows the password you like to use is '+password)
   
   //how to make it bold     is <b> ${password} </b>    $is servian as aninsertion do not give spaces cause its like a string 

   //would have made a difference if passed the value to the function 
   


    const new_p = document.createElement('p');
    
  const new_t = document.createTextNode( message);
  new_p.appendChild(new_t);

  const section2 = document.getElementsByTagName('section')[0];
  section2.appendChild(new_p);
  
  
   

    let id=document.getElementById("my_header");  

let mean=[]
  mean.push("HA")
  const mess = document.createTextNode(mean);
  id.appendChild(mess);

  



  }



