<?php namespace Tests\Repositories;

use App\Models\Admin\Hosts;
use App\Repositories\Admin\HostsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HostsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HostsRepository
     */
    protected $hostsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->hostsRepo = \App::make(HostsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_hosts()
    {
        $hosts = factory(Hosts::class)->make()->toArray();

        $createdHosts = $this->hostsRepo->create($hosts);

        $createdHosts = $createdHosts->toArray();
        $this->assertArrayHasKey('id', $createdHosts);
        $this->assertNotNull($createdHosts['id'], 'Created Hosts must have id specified');
        $this->assertNotNull(Hosts::find($createdHosts['id']), 'Hosts with given id must be in DB');
        $this->assertModelData($hosts, $createdHosts);
    }

    /**
     * @test read
     */
    public function test_read_hosts()
    {
        $hosts = factory(Hosts::class)->create();

        $dbHosts = $this->hostsRepo->find($hosts->id);

        $dbHosts = $dbHosts->toArray();
        $this->assertModelData($hosts->toArray(), $dbHosts);
    }

    /**
     * @test update
     */
    public function test_update_hosts()
    {
        $hosts = factory(Hosts::class)->create();
        $fakeHosts = factory(Hosts::class)->make()->toArray();

        $updatedHosts = $this->hostsRepo->update($fakeHosts, $hosts->id);

        $this->assertModelData($fakeHosts, $updatedHosts->toArray());
        $dbHosts = $this->hostsRepo->find($hosts->id);
        $this->assertModelData($fakeHosts, $dbHosts->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_hosts()
    {
        $hosts = factory(Hosts::class)->create();

        $resp = $this->hostsRepo->delete($hosts->id);

        $this->assertTrue($resp);
        $this->assertNull(Hosts::find($hosts->id), 'Hosts should not exist in DB');
    }
}
