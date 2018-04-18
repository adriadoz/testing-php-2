<?php

declare(strict_types = 1);

namespace MolaMazoCorporation\SimpsonsGenerator\Tests\Module\Sentence\Domain;

use MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Domain\Sentence;

final class SentenceStub
{
    public static function create(string $sentence): Sentence
    {
        return Sentence::fromString($sentence);
    }

    public static function randomWord(): Sentence
    {
        return self::create(Factory::create()->sentence);
    }
}