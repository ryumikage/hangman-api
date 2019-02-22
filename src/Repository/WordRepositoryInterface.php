<?php
/**
 * Created by PhpStorm.
 * User: ryumikage
 * Date: 12/11/2018
 * Time: 23:09
 */

namespace App\Repository;


use App\Entity\Word;

interface WordRepositoryInterface
{
    /**
     * @param int $wordId
     * @return Word|null
     */
    public function findById(int $wordId): ?Word;

    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param Word $word
     */
    public function save(Word $word): void;

    /**
     * @param Word $word
     */
    public function deleted(Word $word): void;

}