<?php 
if (!defined('IN_SITE')) die('The request not found'); 
 
// Xóa session login
set_logout();
 
// Chuyển hướng sang trang login
redirect(base_url('?m=Passport&a=Login'));
?> 