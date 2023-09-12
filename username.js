



function get_username() { //This function extracts from a cookie the value corresponding to the specified name. No parameters
    let cookie = document.cookie;
    const nvs = cookie.split('; ');
    let name = 'username';
      for (const nv of nvs) {
        if (nv.startsWith(name + '=')) { //if the given cookie has a username= 
          return nv.substring(name.length + 1);
        }
      }
  
    return ''; //if it does not then the value is empty string 
  }




 


  