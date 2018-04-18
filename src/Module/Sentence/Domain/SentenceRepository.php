<?php

namespace MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Domain;

interface SentenceRepository
{
    public function add($user, $sentence);

    public function save($user, array $sentences);

    public function search($user): array;
}
