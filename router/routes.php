<?php

use Alura\Courses\Controller\CourseController;
use Alura\Courses\Controller\UserController;

$routes = [
    '/' => [UserController::class, 'formLogin'],
    '/login' => [UserController::class, 'login'],
    '/logout' => [UserController::class, 'logout'],

    '/courses' => [CourseController::class, 'list'],
    '/courses/add' => [CourseController::class, 'add'],
    '/courses/create' => [CourseController::class, 'create'],
    '/courses/edit' => [CourseController::class, 'edit'],
    '/courses/update' => [CourseController::class, 'update'],
    '/courses/delete' => [CourseController::class, 'destroy'],
];

return $routes;
