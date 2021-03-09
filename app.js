let psw = document.getElementById('psw');
const msg = document.getElementsByClassName('validation')[0]
const btn = document.getElementsByClassName('loginbtn')[0]
const container = document.getElementsByTagName('body')

//btn.addEventListener('click', validate)
let strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})")

function validate() { 
    if(psw.value.match(strongRegex)) {     
        return true
} else {
        msg.innerHTML = "**Password must be at least 8 characters long and must contain at least 1 lowercase alphabetical character, 1 uppercase alphabetical character, 1 number and a special character";
        return false
    }
}


// container.addEventListener('load', showup)

// function showup() {
//     container.classList.remove('.preloader')
// }

// window.onload(showup)
  

