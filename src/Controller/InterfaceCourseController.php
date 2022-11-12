<?php

namespace Alura\Courses\Controller;


interface InterfaceCourseController
{
    public function list(): void;
    public function add(): void;
    public function create(): void;
    public function edit(): void;
    public function update(): void;
    public function destroy(): void;
}
