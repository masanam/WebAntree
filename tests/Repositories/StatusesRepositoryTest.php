<?php namespace Tests\Repositories;

use App\Models\Admin\Statuses;
use App\Repositories\Admin\StatusesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class StatusesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusesRepository
     */
    protected $statusesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->statusesRepo = \App::make(StatusesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_statuses()
    {
        $statuses = factory(Statuses::class)->make()->toArray();

        $createdStatuses = $this->statusesRepo->create($statuses);

        $createdStatuses = $createdStatuses->toArray();
        $this->assertArrayHasKey('id', $createdStatuses);
        $this->assertNotNull($createdStatuses['id'], 'Created Statuses must have id specified');
        $this->assertNotNull(Statuses::find($createdStatuses['id']), 'Statuses with given id must be in DB');
        $this->assertModelData($statuses, $createdStatuses);
    }

    /**
     * @test read
     */
    public function test_read_statuses()
    {
        $statuses = factory(Statuses::class)->create();

        $dbStatuses = $this->statusesRepo->find($statuses->id);

        $dbStatuses = $dbStatuses->toArray();
        $this->assertModelData($statuses->toArray(), $dbStatuses);
    }

    /**
     * @test update
     */
    public function test_update_statuses()
    {
        $statuses = factory(Statuses::class)->create();
        $fakeStatuses = factory(Statuses::class)->make()->toArray();

        $updatedStatuses = $this->statusesRepo->update($fakeStatuses, $statuses->id);

        $this->assertModelData($fakeStatuses, $updatedStatuses->toArray());
        $dbStatuses = $this->statusesRepo->find($statuses->id);
        $this->assertModelData($fakeStatuses, $dbStatuses->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_statuses()
    {
        $statuses = factory(Statuses::class)->create();

        $resp = $this->statusesRepo->delete($statuses->id);

        $this->assertTrue($resp);
        $this->assertNull(Statuses::find($statuses->id), 'Statuses should not exist in DB');
    }
}
