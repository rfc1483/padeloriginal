function invalidTitle() {
    alert('test');
//inlineMsg('title', 'Titulo no valido');
}
// form validation function //
function validate(form) {
    var name1 = form.name1.value;
    var surname1 = form.surname1.value;
    var phone1 = form.phone1.value;
    var email1 = form.email1.value;
    var name2 = form.name2.value;
    var surname2 = form.surname2.value;
    var phone2 = form.phone2.value;
    var email2 = form.email2.value;
    var user_name = form.user_name.value;
    var password = form.password.value;
    var conf_password = form.conf_password.value; 
   

    if(name1 == "") {
        inlineMsg('name1','Debes introducir el nombre.', 2);
        return false;
    }
        
    if(surname1 == "") {
        inlineMsg('surname1','Debes introducir el apellido.',2);
        return false;
    }
    if(phone1 == "") {
        inlineMsg('phone1','Debes introducir el telefono.',2);
        return false;
    }
    if(email1 == "") {
        inlineMsg('email1','Debes introducir el e-mail.',2);
        return false;
    }
    if(name2 == "") {
        inlineMsg('name2','Debes introducir el nombre.',2);
        return false;
    }
    if(surname2 == "") {
        inlineMsg('surname2','Debes introducir el apellido.',2);
        return false;
    }
    if(phone2 == "") {
        inlineMsg('phone2','Debes introducir el telefono.',2);
        return false;
    }
    if(email2 == "") {
        inlineMsg('email2','Debes introducir el e-mail.',2);
        return false;
    }
    if(user_name == "") {
        inlineMsg('user_name','Debes introducir el nombre de usuario.',2);
        return false;
    }
    if(password == "") {
        inlineMsg('password','Debes introducir la clave.',2);
        return false;
    } 
    if(conf_password == "") {
        inlineMsg('conf_password','Debes introducir la clave.',2);
        return false;
    } 
    return true;
}

// form validation function //
function validateLogin(formLogin) {
    var user_name = formLogin.user_name.value;
    var password = formLogin.password.value;   

    if(user_name == "") {
        inlineMsg('user_name','Debes introducir el nombre de usuario.',2);
        return false;
    }
    if(password == "") {
        inlineMsg('password','Debes introducir la clave.',2);
        return false;
    } 
    return true;
}

// START OF MESSAGE SCRIPT //

var MSGTIMER = 20;
var MSGSPEED = 5;
var MSGOFFSET = 3;
var MSGHIDE = 3;

// build out the divs, set attributes and call the fade function //
function inlineMsg(target,string,autohide) {
    var msg;
    var msgcontent;
    if(!document.getElementById('msg')) {
        msg = document.createElement('div');
        msg.id = 'msg';
        msgcontent = document.createElement('div');
        msgcontent.id = 'msgcontent';
        document.body.appendChild(msg);
        msg.appendChild(msgcontent);
        msg.style.filter = 'alpha(opacity=0)';
        msg.style.opacity = 0;
        msg.alpha = 0;
    } else {
        msg = document.getElementById('msg');
        msgcontent = document.getElementById('msgcontent');
    }
    msgcontent.innerHTML = string;
    msg.style.display = 'block';
    var msgheight = msg.offsetHeight;
    var targetdiv = document.getElementById(target);
    targetdiv.focus();
    var targetheight = targetdiv.offsetHeight;
    var targetwidth = targetdiv.offsetWidth;
    var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
    var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
    msg.style.top = topposition + 'px';
    msg.style.left = leftposition + 'px';
    clearInterval(msg.timer);
    msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
    if(!autohide) {
        autohide = MSGHIDE;
    }
    window.setTimeout("hideMsg()", (autohide * 1000));
}

// hide the form alert //
function hideMsg(msg) {
    var msg = document.getElementById('msg');
    if(!msg.timer) {
        msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
    }
}

// face the message box //
function fadeMsg(flag) {
    if(flag == null) {
        flag = 1;
    }
    var msg = document.getElementById('msg');
    var value;
    if(flag == 1) {
        value = msg.alpha + MSGSPEED;
    } else {
        value = msg.alpha - MSGSPEED;
    }
    msg.alpha = value;
    msg.style.opacity = (value / 100);
    msg.style.filter = 'alpha(opacity=' + value + ')';
    if(value >= 99) {
        clearInterval(msg.timer);
        msg.timer = null;
    } else if(value <= 1) {
        msg.style.display = "none";
        clearInterval(msg.timer);
    }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target) {
    var left = 0;
    if(target.offsetParent) {
        while(1) {
            left += target.offsetLeft;
            if(!target.offsetParent) {
                break;
            }
            target = target.offsetParent;
        }
    } else if(target.x) {
        left += target.x;
    }
    return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) {
    var top = 0;
    if(target.offsetParent) {
        while(1) {
            top += target.offsetTop;
            if(!target.offsetParent) {
                break;
            }
            target = target.offsetParent;
        }
    } else if(target.y) {
        top += target.y;
    }
    return top;
}

// preload the arrow //
if(document.images) {
    arrow = new Image(7,80);
    arrow.src = "images/msg_arrow.gif";
}