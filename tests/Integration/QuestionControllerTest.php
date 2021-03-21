<?php

namespace Tests\Integration;

use App\Question;
use App\Dimension;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuestionControllerTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    private $questionTableName;

    public function setUp(): void
    {
        $this->questionTableName = (new Question)->getTable();
        parent::setUp();
    }

    public function testShouldGetQuestionsList()
    {
        $questions = factory(Question::class, 5)->create();
        $this->getJson('/api/question')
            ->assertOk()
            ->assertJsonCount($questions->count());
    }

    public function testShouldGetQuestion()
    {
        $question = factory(Question::class)->create();
        $this->getJson("/api/question/$question->id")
            ->assertOk()
            ->assertJsonFragment($question->toArray());
    }

    public function testShouldCreateQuestion()
    {
        $dimension = factory(Dimension::class)->create();
        $data = ['content' => 'Pergunta', 'dimension_id' => $dimension->id];

        $this->postJson('/api/question', $data)
            ->assertOk()
            ->assertJsonFragment($data);
        $this->assertDatabaseHas($this->questionTableName, $data);
    }

    public function testShouldUpdateQuestion()
    {
        $question = factory(Question::class)->create();
        $dimension = factory(Dimension::class)->create();
        $data = ['content' => 'Pergunta', 'dimension_id' => $dimension->id];

        $this->putJson("/api/question/$question->id", $data)->assertOk();
        $this->assertDatabaseHas($this->questionTableName, $data);
    }

    public function testShouldDeleteQuestion()
    {
        $question = factory(Question::class)->create();
        $this->deleteJson("/api/question/$question->id")->assertOk();
        $this->assertDatabaseMissing($this->questionTableName, [
            "id" => $question->id,
        ]);
    }
}
