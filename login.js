

//fill the text box with user username if its istore indocument.cpokie

//create a new cookie with name equal to the string "username" and value to what the user typed 
const get = document.getElementById("Username");

if(get_username!==''){
  get.value = get_username(document.cookie, "username");
}


//should expire in an hour 
//should have a default path 
//redirect to index.html  
function minute_in_future() {
  let minute_in_future = new Date();
  minute_in_future.setMinutes(minute_in_future.getMinutes() + 60);
  return minute_in_future.toUTCString();
}


get.addEventListener('keyup', function(e) {
	    if (e.key === 'Enter') {  //key is equal to 13 
        const username=get.value;
          validate_username(username)

        }
        
    }
  //when relase a key records what key used 
);

const para = document.getElementsByTagName('input')[2];
para.addEventListener('click', function(e) { //define the function within the EventListener 
  const username=get.value;
  validate_username(username)
}
    
);

function validate_username(username) {

 let message = [];


  if (username.length < 5) {
    message.push('Username must be 5 characters or longer.');
  }
  if (username.length > 40) {
    message.push('Username cannot be longer than 40 characters.');
  }
  if (username.includes(' ')) {
    message.push('Username cannot contain spaces.');
  }
  if (username.includes(',')) {
    message.push('Username cannot contain commas.');
  }
  if (username.includes(';')) {
    message.push('Username cannot contain semicolons.');
  }
  if (username.includes('=')) {
    message.push('Username cannot contain =.');
  }
  if (username.includes('&')) {
    message.push('Username cannot contain &.');
  }

  if (message.length !== 0) {
    alert(message.join('\n')); // join the individual messages into one
  } else {
    let valids = "abcdefghijklmnopqrstuvwxyz";
    valids += valids.toUpperCase() + "0123456789!@#$%^*()-_+[]{}:'|`~<.>/?";
    for (el of username) { // go through the username
      if (!(valids.includes(el))) { // check each char is in the list of valids
        // if we do find an invalid character, 
        alert('Username can only use characters from the following string:\n' +
          'abcdefghijklmnopqrstuvwxyz' +
          'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + '0123456789' +
          "!@#$%^*()-_+[]{}:'|`~<.>/?");
        return;
      }
    }
    document.cookie = `username=${username}; expires=${minute_in_future()}`;       
    return;
  
  };

  
  }



