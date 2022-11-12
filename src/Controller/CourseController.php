<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\Course;
use Alura\Courses\Helper\FlashMessageTrait;
use Alura\Courses\Helper\RenderHTMLTrait;
use Alura\Courses\Infra\EntityManagerCreator;

class CourseController implements InterfaceCourseController
{
    use FlashMessageTrait, RenderHTMLTrait;
    private $repositoryCourses;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositoryCourses = $this->entityManager
            ->getRepository(Course::class);
    }

    public function list(): void
    {
        echo $this->renderHTML('/courses/list_courses.php', [
            'courses' => $this->repositoryCourses->findAll(),
            'title' => 'Lista de Cursos',
            'button' => 'Novo Curso',
            'route' => '/courses/add'
        ]);
        //require_once __DIR__ . '/../../view/courses/list_courses.php';
    }

    public function add(): void
    {
        echo $this->renderHTML('/courses/add_courses.php', [
            'title' => 'Cadastrar Curso',
            'button' => 'Voltar',
            'route' => '/courses'
        ]);
        //require_once __DIR__ . '/../../view/courses/add_courses.php';
    }

    public function create(): void
    {
        try {
            $course = new Course();
            $course->setDescription(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));

            $this->entityManager->persist($course);
            $this->entityManager->flush();

            $this->defineMessage("success", "Curso registrado com sucesso");
            header('Location: /courses', true, 302);
        } catch (\Throwable $e) {
            $this->defineMessage("danger", "Erro: " . $e);
            header('Location: /courses');
        }
    }

    public function edit(): void
    {
        $course_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$course_id) {
            $this->defineMessage("warning", "Não foi possível localizar esse curso");
            header('Location: /courses');
        }

        $course = $this->entityManager->find(Course::class, $course_id);

        echo $this->renderHTML('/courses/edit_courses.php', [
            'course_description' => $course->getDescription(),
            'course_id' => $course->getId(),
            'title' => 'Editar - ' . $course->getDescription(),
            'button' => 'Voltar',
            'route' => '/courses'
        ]);
        //require_once __DIR__ . '/../../view/courses/edit_courses.php';
    }

    public function update(): void
    {
        $course = new Course();
        $course->setDescription(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        $course_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$course_id) {
            $this->defineMessage("danger", "Não foi possível editar esse curso");
            header('Location: /courses');
        }

        $course->setId($course_id);

        if (!$this->entityManager->merge($course)) {
            $this->defineMessage("danger", "Não foi possível editar esse curso");
            header('Location: /courses');
        };

        $this->entityManager->flush();

        $this->defineMessage("success", "Curso editado com sucesso");
        header('Location: /courses', true, 302);
    }

    public function destroy(): void
    {
        $course_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$course_id) {
            $this->defineMessage("danger", "Não foi possível excluir esse curso");
            header('Location: /courses');
        }

        $course = $this->entityManager->find(Course::class, $course_id);
        if (!$this->entityManager->remove($course)) {
            $this->defineMessage("danger", "Não foi possível excluir esse curso");
            header('Location: /courses');
        };
        $this->entityManager->flush();
        $this->defineMessage("success", "Curso excluído com sucesso");
        header('Location: /courses', true, 302);
    }
}
