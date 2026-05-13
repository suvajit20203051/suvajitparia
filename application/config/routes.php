<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Portfolio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ── Public ────────────────────────────────────────────────────
$route['contact/send'] = 'Portfolio/send_message';

// ── Admin (must be before the (:any) catch-all) ───────────────
$route['admin']                         = 'Admin/index';
$route['admin/login']                   = 'Admin/login';
$route['admin/logout']                  = 'Admin/logout';
$route['admin/dashboard']               = 'Admin/dashboard';

$route['admin/profile']                 = 'Admin/profile';
$route['admin/profile/update']          = 'Admin/profile_update';

$route['admin/skills']                  = 'Admin/skills';
$route['admin/skills/add']              = 'Admin/skill_add';
$route['admin/skills/edit/(:num)']      = 'Admin/skill_edit/$1';
$route['admin/skills/delete/(:num)']    = 'Admin/skill_delete/$1';

$route['admin/projects']                = 'Admin/projects';
$route['admin/projects/add']            = 'Admin/project_add';
$route['admin/projects/edit/(:num)']    = 'Admin/project_edit/$1';
$route['admin/projects/delete/(:num)']  = 'Admin/project_delete/$1';

$route['admin/experience']              = 'Admin/experience';
$route['admin/experience/add']          = 'Admin/experience_add';
$route['admin/experience/edit/(:num)']  = 'Admin/experience_edit/$1';
$route['admin/experience/delete/(:num)']= 'Admin/experience_delete/$1';

$route['admin/education']               = 'Admin/education';
$route['admin/education/add']           = 'Admin/education_add';
$route['admin/education/edit/(:num)']   = 'Admin/education_edit/$1';
$route['admin/education/delete/(:num)'] = 'Admin/education_delete/$1';

$route['admin/certifications']                  = 'Admin/certifications';
$route['admin/certifications/add']              = 'Admin/certification_add';
$route['admin/certifications/edit/(:num)']      = 'Admin/certification_edit/$1';
$route['admin/certifications/delete/(:num)']    = 'Admin/certification_delete/$1';

$route['admin/messages']                = 'Admin/messages';
$route['admin/messages/view/(:num)']    = 'Admin/message_view/$1';
$route['admin/messages/delete/(:num)']  = 'Admin/message_delete/$1';

$route['admin/change_password']         = 'Admin/change_password';

// ── Catch-all (keep last) ─────────────────────────────────────
$route['(:any)'] = 'Portfolio/index';
