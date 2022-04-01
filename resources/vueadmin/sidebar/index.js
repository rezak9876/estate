import adminsidebar from './admin.js'
import usersidebar from './user.js'
import { is_admin } from '../../vueadmin/permissions/index.js';
const sidebar = is_admin ? adminsidebar : usersidebar;
export default sidebar;
