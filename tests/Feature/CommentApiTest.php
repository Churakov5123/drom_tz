<?php

namespace Tests\Feature;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;
use Faker\Factory;


use Tests\TestCase;

class CommentApiTest extends TestCase
{
    use RefreshDatabase;
    protected $item;

    public function setUp(): void
    {
        parent::setUp();
        $this->item = factory(Comment::class)->create();
        $this->faker = factory::create();
    }
    /**
     * Тестируем  метод создание новой сущности путем отправки POST запроса
     *
     */
    public function testCanCreatItem()
    {
        $formData = [
            'name' => 'first name',
            'text' => 'Lorem ipsum blablalblblblbl'
        ];

        $this->withoutExceptionHandling();
        $this->json('POST', route('comment.create', $formData))
            ->assertStatus(201);
    }

    /**
     * Тестируем  метод получения спика сущностей путем отправки GET запроса
     */
    public function testCanIndexItem()
    {
        $this->withoutExceptionHandling();

        $this->get(route('comments.index'))
            ->assertStatus(200);
    }

    /**
     * Тестируем  метод обновления сущности по id путем отправки PUT запроса
     *
     */
    public function testCanUpdateItem()
    {
        $item = factory(Comment::class)->create();
        $updateData = [
            'name' => $this->faker->name,
            'text' => $this->faker->text
        ];

        $this->withoutExceptionHandling();
        $this->json('PUT', route('comment.update', $item->id), $updateData)
            ->assertStatus(200);
    }


}
