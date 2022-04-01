import adminrouter from './admin.js'
import userrouter from './user.js'
import { is_admin } from '../../vueadmin/permissions/index.js';
const router = is_admin ? adminrouter : userrouter;
export default router;
