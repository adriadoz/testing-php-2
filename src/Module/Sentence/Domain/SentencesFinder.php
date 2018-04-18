<?php

namespace MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Domain;

final class SentencesFinder
{
    private $repository;

    public function __construct(SentenceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($user)
    {
        $sentences = $this->repository->search($user);

        if (empty($sentences)) {
            throw new \Exception();
        }

        return $sentences;
    }
}
