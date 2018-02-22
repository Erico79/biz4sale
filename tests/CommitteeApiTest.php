<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommitteeApiTest extends TestCase
{
    use MakeCommitteeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCommittee()
    {
        $committee = $this->fakeCommitteeData();
        $this->json('POST', '/api/v1/committees', $committee);

        $this->assertApiResponse($committee);
    }

    /**
     * @test
     */
    public function testReadCommittee()
    {
        $committee = $this->makeCommittee();
        $this->json('GET', '/api/v1/committees/'.$committee->id);

        $this->assertApiResponse($committee->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCommittee()
    {
        $committee = $this->makeCommittee();
        $editedCommittee = $this->fakeCommitteeData();

        $this->json('PUT', '/api/v1/committees/'.$committee->id, $editedCommittee);

        $this->assertApiResponse($editedCommittee);
    }

    /**
     * @test
     */
    public function testDeleteCommittee()
    {
        $committee = $this->makeCommittee();
        $this->json('DELETE', '/api/v1/committees/'.$committee->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/committees/'.$committee->id);

        $this->assertResponseStatus(404);
    }
}
