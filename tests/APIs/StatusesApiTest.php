<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Statuses;

class StatusesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_statuses()
    {
        $statuses = factory(Statuses::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/statuses', $statuses
        );

        $this->assertApiResponse($statuses);
    }

    /**
     * @test
     */
    public function test_read_statuses()
    {
        $statuses = factory(Statuses::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/statuses/'.$statuses->id
        );

        $this->assertApiResponse($statuses->toArray());
    }

    /**
     * @test
     */
    public function test_update_statuses()
    {
        $statuses = factory(Statuses::class)->create();
        $editedStatuses = factory(Statuses::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/statuses/'.$statuses->id,
            $editedStatuses
        );

        $this->assertApiResponse($editedStatuses);
    }

    /**
     * @test
     */
    public function test_delete_statuses()
    {
        $statuses = factory(Statuses::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/statuses/'.$statuses->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/statuses/'.$statuses->id
        );

        $this->response->assertStatus(404);
    }
}
