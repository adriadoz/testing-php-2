<?php

declare(strict_types = 1);

namespace MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Infrastructure;

use MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Domain\SentenceRepository;

final class FileSentenceRepository implements SentenceRepository
{
    private $filePath;

    public function __construct()
    {
        $this->filePath = __DIR__ . '/../../../../database/sentences_database.json';
    }

    public function add($user, $sentence)
    {
        $userSentences = $this->findAll();

        if (isset($userSentences[$user])) {
            if (!in_array($sentence, $userSentences[$user])) {
                $userSentences[$user][] = $sentence;
            }
        } else {
            $userSentences[$user] = [$sentence];
        }

        $this->saveAll($userSentences);
    }

    public function save($user, array $sentences)
    {
        $userSentences = $this->findAll();

        $userSentences[$user] = $sentences;

        $this->saveAll($userSentences);
    }

    public function search($user): array
    {
        $userSentences = $this->findAll();

        return isset($userSentences[$user]) ? $userSentences[$user] : [];
    }

    private function findAll()
    {
        $return = json_decode(file_get_contents($this->filePath), true);

        return is_array($return) ? $return : [];
    }

    private function saveAll($userSentences)
    {
        return file_put_contents($this->filePath, json_encode($userSentences));
    }
}
