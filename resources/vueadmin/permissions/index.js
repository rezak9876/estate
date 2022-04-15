import { store } from '../store/index'

const user = store.user


const is_admin = user.is_admin;

export { is_admin }



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




export { user }
