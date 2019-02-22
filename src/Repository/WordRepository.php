<?php

namespace App\Repository;

use App\Entity\Word;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class WordRepository implements WordRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ObjectRepository
     */
    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Word::class);
    }

    /**
     * {@inheritdoc}
     */
    public function findById(int $wordId): ?Word
    {
        return $this->objectRepository->find($wordId);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return $this->objectRepository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function save(Word $word): void
    {
        $this->entityManager->persist($word);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function deleted(Word $word): void
    {
        $this->entityManager->remove($word);
        $this->entityManager->flush();
    }

}