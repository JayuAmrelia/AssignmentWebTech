<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// Product routes
require_once 'controllers/ProductController.php';
$app->get('/products', '\ProductController:getAllProducts');
$app->get('/products/{id}', '\ProductController:getProductById');
$app->post('/products', '\ProductController:addProduct');
$app->put('/products/{id}', '\ProductController:updateProduct');
$app->delete('/products/{id}', '\ProductController:deleteProduct');

// User routes
require_once 'controllers/UserController.php';
$app->get('/users', '\UserController:getAllUsers');
$app->get('/users/{id}', '\UserController:getUserById');
$app->post('/users', '\UserController:addUser');
$app->put('/users/{id}', '\UserController:updateUser');
$app->delete('/users/{id}', '\UserController:deleteUser');

// Comment routes
require_once 'controllers/CommentController.php';
$app->get('/comments', '\CommentController:getAllComments');
$app->get('/comments/{id}', '\CommentController:getCommentById');
$app->post('/comments', '\CommentController:addComment');
$app->put('/comments/{id}', '\CommentController:updateComment');
$app->delete('/comments/{id}', '\CommentController:deleteComment');

// Cart routes
require_once 'controllers/CartController.php';
$app->get('/carts', '\CartController:getAllCarts');
$app->get('/carts/{id}', '\CartController:getCartById');
$app->post('/carts', '\CartController:addToCart');
$app->delete('/carts/{id}', '\CartController:removeFromCart');

// Order routes
require_once 'controllers/OrderController.php';
$app->get('/orders', '\OrderController:getAllOrders');
$app->get('/orders/{id}', '\OrderController:getOrderById');
$app->post('/orders', '\OrderController:addOrder');
$app->delete('/orders/{id}', '\OrderController:cancelOrder');

?>
