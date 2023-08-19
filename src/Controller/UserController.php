<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/user')]
class UserController extends AbstractController
{
    public function __construct(private UserRepository $userepo) {}
        #[Route(methods: 'GET')]
    public function All(): JsonResponse
    {
        return $this->json($this->userepo->findAll());
    }

    #[Route('/{email}/promote', methods: 'PATCH')]
    public function promote(string $email, Request $request): JsonResponse
    {
        $user = $this->userepo->findByEmail($email);
        if(!$user) {
            throw new NotFoundHttpException('User does not exist');
        }
        $user->setRole('ROLE_ADMIN');
        $this->userepo->update($user);
        
        return $this->json($user);

    }
    }


