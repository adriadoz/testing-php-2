<?php

namespace MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Domain;

final class SentenceAdder
{
    private $repository;

    public function __construct(SentenceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($user, $sentence)
    {
        $this->repository->add($user, $sentence);
    }
}
