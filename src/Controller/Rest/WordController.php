<?php

namespace App\Controller\Rest;


use App\Entity\Word;
use App\Repository\WordRepositoryInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class WordController extends FOSRestController
{
    private $wordRepository;

    public function __construct(WordRepositoryInterface $wordRepository)
    {
        $this->wordRepository = $wordRepository;
    }

    /**
     * Create a word resource
     * @Rest\Post("/word")
     * @param Request $request
     * @return View
     */
    public function postWord(Request $request): View
    {
        $word = new Word();
        $word->setWord($request->get('word'));
        try {
            $this->wordRepository->save($word);
        }catch(UniqueConstraintViolationException $e) {
            return View::create($word->getWord() .' already exists in the database', Response::HTTP_CONFLICT);
        }

        return View::create($word->serialize(), Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/word/{wordId}")
     * @return View
     */
    public function getWord(int $wordId): View
    {
        $word = $this->wordRepository->findById($wordId);

        return View::create($word->serialize(), Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/words")
     * @return View
     */
    public function getWords(): View
    {
        $words = $this->wordRepository->findAll();

        $data = [];

        foreach ($words as $word) {
            $data[] = $word->serialize();
        }

        return View::create($data, Response::HTTP_OK);
    }
}