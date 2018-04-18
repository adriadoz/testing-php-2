<?php

namespace MolaMazoCorporation\SimpsonsGenerator\Tests;

// @todo I don't like this....
require __DIR__ . '/../src/Module/Sentence/Domain/SentenceRepository.php';
require __DIR__ . '/../src/Module/Sentence/Infrastructure/FileSentenceRepository.php';

use MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Infrastructure\FileSentenceRepository;

final class OurTestWorksFine
{
    private $repository;

    public function __construct()
    {
        $this->repository = new FileSentenceRepository();
    }

    public function itShouldSaveAndSearchSimpsonsSentences()
    {
        $sentence = 'Mola mazo, tronca!';

        // If it's the second time we execute this test we don't need this...
        // Because the sentences_database.json will be not empty....
        // If we had a way to reset the status to an empty array before every test... :/
        $this->repository->add('bart', $sentence);

        if (in_array($sentence, $this->repository->search('bart'))) {
            echo 'QUE CRACK SOMOS COLEGUIS';
        } else {
            echo 'ALGO TA MAL';
        }
    }
}

$test = new OurTestWorksFine();
$test->itShouldSaveAndSearchSimpsonsSentences();
