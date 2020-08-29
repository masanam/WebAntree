<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admin\Hosts;

class HostsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_hosts()
    {
        $hosts = factory(Hosts::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/hosts', $hosts
        );

        $this->assertApiResponse($hosts);
    }

    /**
     * @test
     */
    public function test_read_hosts()
    {
        $hosts = factory(Hosts::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/hosts/'.$hosts->id
        );

        $this->assertApiResponse($hosts->toArray());
    }

    /**
     * @test
     */
    public function test_update_hosts()
    {
        $hosts = factory(Hosts::class)->create();
        $editedHosts = factory(Hosts::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/hosts/'.$hosts->id,
            $editedHosts
        );

        $this->assertApiResponse($editedHosts);
    }

    /**
     * @test
     */
    public function test_delete_hosts()
    {
        $hosts = factory(Hosts::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/hosts/'.$hosts->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/hosts/'.$hosts->id
        );

        $this->response->assertStatus(404);
    }
}
