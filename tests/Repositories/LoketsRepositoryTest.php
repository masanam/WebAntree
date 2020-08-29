<?php namespace Tests\Repositories;

use App\Models\Admin\Lokets;
use App\Repositories\Admin\LoketsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LoketsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LoketsRepository
     */
    protected $loketsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->loketsRepo = \App::make(LoketsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_lokets()
    {
        $lokets = factory(Lokets::class)->make()->toArray();

        $createdLokets = $this->loketsRepo->create($lokets);

        $createdLokets = $createdLokets->toArray();
        $this->assertArrayHasKey('id', $createdLokets);
        $this->assertNotNull($createdLokets['id'], 'Created Lokets must have id specified');
        $this->assertNotNull(Lokets::find($createdLokets['id']), 'Lokets with given id must be in DB');
        $this->assertModelData($lokets, $createdLokets);
    }

    /**
     * @test read
     */
    public function test_read_lokets()
    {
        $lokets = factory(Lokets::class)->create();

        $dbLokets = $this->loketsRepo->find($lokets->id);

        $dbLokets = $dbLokets->toArray();
        $this->assertModelData($lokets->toArray(), $dbLokets);
    }

    /**
     * @test update
     */
    public function test_update_lokets()
    {
        $lokets = factory(Lokets::class)->create();
        $fakeLokets = factory(Lokets::class)->make()->toArray();

        $updatedLokets = $this->loketsRepo->update($fakeLokets, $lokets->id);

        $this->assertModelData($fakeLokets, $updatedLokets->toArray());
        $dbLokets = $this->loketsRepo->find($lokets->id);
        $this->assertModelData($fakeLokets, $dbLokets->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_lokets()
    {
        $lokets = factory(Lokets::class)->create();

        $resp = $this->loketsRepo->delete($lokets->id);

        $this->assertTrue($resp);
        $this->assertNull(Lokets::find($lokets->id), 'Lokets should not exist in DB');
    }
}
