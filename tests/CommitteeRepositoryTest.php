<?php

use App\Models\Committee;
use App\Repositories\CommitteeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommitteeRepositoryTest extends TestCase
{
    use MakeCommitteeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CommitteeRepository
     */
    protected $committeeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->committeeRepo = App::make(CommitteeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCommittee()
    {
        $committee = $this->fakeCommitteeData();
        $createdCommittee = $this->committeeRepo->create($committee);
        $createdCommittee = $createdCommittee->toArray();
        $this->assertArrayHasKey('id', $createdCommittee);
        $this->assertNotNull($createdCommittee['id'], 'Created Committee must have id specified');
        $this->assertNotNull(Committee::find($createdCommittee['id']), 'Committee with given id must be in DB');
        $this->assertModelData($committee, $createdCommittee);
    }

    /**
     * @test read
     */
    public function testReadCommittee()
    {
        $committee = $this->makeCommittee();
        $dbCommittee = $this->committeeRepo->find($committee->id);
        $dbCommittee = $dbCommittee->toArray();
        $this->assertModelData($committee->toArray(), $dbCommittee);
    }

    /**
     * @test update
     */
    public function testUpdateCommittee()
    {
        $committee = $this->makeCommittee();
        $fakeCommittee = $this->fakeCommitteeData();
        $updatedCommittee = $this->committeeRepo->update($fakeCommittee, $committee->id);
        $this->assertModelData($fakeCommittee, $updatedCommittee->toArray());
        $dbCommittee = $this->committeeRepo->find($committee->id);
        $this->assertModelData($fakeCommittee, $dbCommittee->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCommittee()
    {
        $committee = $this->makeCommittee();
        $resp = $this->committeeRepo->delete($committee->id);
        $this->assertTrue($resp);
        $this->assertNull(Committee::find($committee->id), 'Committee should not exist in DB');
    }
}
