<?php

use Alura\Courses\Infra\EntityManagerCreator;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerCreator();
$entityManager = $entityManagerFactory->getEntityManager();

var_dump($entityManager->getConnection());
