<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Lokets;

class LoketsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_lokets()
    {
        $lokets = factory(Lokets::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/lokets', $lokets
        );

        $this->assertApiResponse($lokets);
    }

    /**
     * @test
     */
    public function test_read_lokets()
    {
        $lokets = factory(Lokets::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/lokets/'.$lokets->id
        );

        $this->assertApiResponse($lokets->toArray());
    }

    /**
     * @test
     */
    public function test_update_lokets()
    {
        $lokets = factory(Lokets::class)->create();
        $editedLokets = factory(Lokets::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/lokets/'.$lokets->id,
            $editedLokets
        );

        $this->assertApiResponse($editedLokets);
    }

    /**
     * @test
     */
    public function test_delete_lokets()
    {
        $lokets = factory(Lokets::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/lokets/'.$lokets->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/lokets/'.$lokets->id
        );

        $this->response->assertStatus(404);
    }
}
