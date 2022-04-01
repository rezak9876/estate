function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

const user = JSON.parse(getCookie('user'))

const is_admin = user.is_admin;

export {is_admin}

export function check_permission(arg, section) {


    if (typeof (user.permissions[section]) == 'undefined')
        return false;
    if (arg === 'index') {
        if (typeof (user.permissions[section]) == 'undefined')
            return false;
    }
    else {
        if (!user.permissions[section].includes(arg))
            return false;
    }
    return true;
}