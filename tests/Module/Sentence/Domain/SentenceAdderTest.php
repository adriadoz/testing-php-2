<?php

declare(strict_types = 1);

namespace MolaMazoCorporation\SimpsonsGenerator\Tests\Module\Sentence\Domain;
use Mockery;
use MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Domain\SentenceAdder;
use MolaMazoCorporation\SimpsonsGenerator\Module\Sentence\Infrastructure\FileSentenceRepository;
use PHPUnit\Framework\TestCase;

final class SentenceAdderTest extends TestCase
{
    /** @var FileSentenceRepository */
    private $repository;
    private $sentenceAdder;

    protected function setUp()
    {
        parent::setUp();
        $this->repository =  Mockery::mock(FileSentenceRepository::class);
        $this->sentenceAdder = new SentenceAdder($this->repository);
    }

    /** @test */
    public function it_should_add_a_new_sentence()
    {
        $sentence = SentenceStub::random();
        $this->repository
            ->shouldReceive('__invoke')
            ->once()
            ->andReturn($sentence);

        $addedsentence = $this->sentenceAdder->__invoke();

        $this->assertEquals(in_array($addedsentence, $sentence));
    }
}