<?php

declare(strict_types = 1);

namespace MolaMazoCorporation\SimpsonsGenerator\Tests\Module\Infrastructure;
use PHPUnit\Framework\TestCase;

final class FileSentenceRepositoryTest extends TestCase
{
    private $repository;

    protected function setUp()
    {
        parent::setUp();
        $this->repository =  new FileSentenceRepository();
        $this->sentences = '{Hola frase, Otra frasw}';
    }

    /** @test */
    public function it_should_get_all_sentences()
    {
        $this->assertEquals($this->sentences, $this->repository->findAll());
    }
}