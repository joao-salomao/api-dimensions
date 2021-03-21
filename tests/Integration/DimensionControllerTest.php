<?php

namespace Tests\Integration;

use App\Question;
use App\Dimension;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DimensionControllerTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    private $dimensionTableName;

    public function setUp(): void
    {
        $this->dimensionTableName = (new Dimension)->getTable();
        parent::setUp();
    }

    public function testShouldGetDimensionsList()
    {
        $dimensions = factory(Dimension::class, 5)->create();
        $this->getJson('/api/dimension')
            ->assertOk()
            ->assertJsonCount($dimensions->count());
    }

    public function testShouldGetDimension()
    {
        $dimension = factory(Dimension::class)->create();
        $this->getJson("/api/dimension/$dimension->id")
            ->assertOk()
            ->assertJsonFragment($dimension->toArray());
    }

    public function testShouldCreateDimension()
    {
        $data = ['title' => 'Estrutura'];
        $this->postJson('/api/dimension', $data)->assertOk();
        $this->assertDatabaseHas($this->dimensionTableName, $data);
    }

    public function testShouldUpdateDimension()
    {
        $dimension = factory(Dimension::class)->create();
        $data = ['title' => 'Estrutura'];

        $this->putJson("/api/dimension/$dimension->id", $data)->assertOk();
        $this->assertDatabaseHas($this->dimensionTableName, $data);
    }

    public function testShouldDeleteDimension()
    {
        $dimension = factory(Dimension::class)->create();
        $this->deleteJson("/api/dimension/$dimension->id")->assertOk();
        $this->assertDatabaseMissing($this->dimensionTableName, [
            "id" => $dimension->id,
        ]);
    }

    public function testShouldNotDeleteDimensionWithQuestionsRelated()
    {
        $dimension = factory(Dimension::class)->create();
        factory(Question::class)->create(['content' => "What Ever", 'dimension_id' => $dimension->id]);

        $this->deleteJson("/api/dimension/$dimension->id")->assertForbidden();
        $this->assertDatabaseHas($this->dimensionTableName, [
            "id" => $dimension->id,
        ]);
    }
}
