<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Word
 * @ORM\Entity
 * @package App\Entity
 */
class Word
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $word;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Word
     */
    public function setId(int $id): Word
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * @param string $word
     * @return Word
     */
    public function setWord(string $word): Word
    {
        $this->word = $word;

        return $this;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return ['id' =>$this->id, 'word' => $this->word];
    }
}