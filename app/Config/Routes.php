<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('register', 'Home::register');
$routes->get('main_home', 'Home::main_home');

// $routes->get('login', 'Home::login');
$routes->post('register/ins', 'Home::register_ins');

$routes->get('Login123', 'Index_Controllers::index');
$routes->post('LoginAction', 'Index_Controllers::login');

$routes->get('Logout', 'Index_Controllers::logout');


$routes->get('Logout', 'UserDashboardController::logout');  
$routes->get('admin', 'Index_Controllers::master_admin');

$routes->get('DisplayUsers', 'TableController::display_data');

$routes->get('edit_profile', 'UserDashboardController::edit_profile');
$routes->post('editProfile', 'UserDashboardController::editProfile');
$routes->get('changePassword', 'UserDashboardController::change_password');
$routes->post('updatepassword', 'UserDashboardController::updatepassword');

$routes->get('ManageUsers', 'UserController::ManageUsers');
$routes->get('AdminAddUser', 'UserController::AddUserForm');
$routes->get('AdminDeleteUser', 'UserController::AdminDeleteUser');
$routes->get('AdminEditUser', 'UserController::EditUserForm');
$routes->post('Edituser','UserController::EditUser');

$routes->get('ForgetPassword', 'Activate_Account_Controller::forget_Password');
$routes->post('forgetpasswordaction', 'Activate_Account_Controller::forget_Password_action');
$routes->get('foregtpwdpage', 'Activate_Account_Controller::forget_Password_update');
$routes->get('newPasswordForm', 'Activate_Account_Controller::newPasswordForm');
$routes->post('updatenewPassword', 'Activate_Account_Controller::updatenewPassword');


$routes->get('add_product', 'add_product_Controller::add_product_from');
$routes->post('add_prod/ins', 'add_product_Controller::add_prod_ins');
$routes->get('Manage_Products', 'add_product_Controller::Manage_Products');
$routes->get('delete_product', 'add_product_Controller::prod_delete');
$routes->get('AdminEditproduct', 'add_product_Controller::EditproductForm');
$routes->get('edit_product', 'add_product_Controller::edit_product');
$routes->post('editProduct', 'add_product_Controller::editProduct');
$routes->get('fatch_product', 'add_product_Controller::fatch_product');

$routes->get('AddWorker', 'add_worker_Controller::AddWorker');
$routes->post('worker/ins', 'add_worker_Controller::worker_ins');
$routes->get('worker_details', 'add_worker_Controller::worker_details');
$routes->get('delete_worker', 'add_worker_Controller::delete_worker');
$routes->get('AdminEditWorker', 'add_worker_Controller::EditWorkerForm');
$routes->post('Editworker','add_worker_Controller::EditWorker');
$routes->get('clear_worker', 'add_worker_Controller::Adminclearworker');

$routes->get('contact', 'contact_Controller::contact');
$routes->post('contact/ins', 'contact_Controller::contact_ins');
$routes->get('ManageContact', 'contact_Controller::ManageContact');
$routes->get('AdminDeleteContact', 'contact_Controller::AdminDeleteContact');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
