<?php

use Faker\Factory as Faker;
use App\Models\Committee;
use App\Repositories\CommitteeRepository;

trait MakeCommitteeTrait
{
    /**
     * Create fake instance of Committee and save it in database
     *
     * @param array $committeeFields
     * @return Committee
     */
    public function makeCommittee($committeeFields = [])
    {
        /** @var CommitteeRepository $committeeRepo */
        $committeeRepo = App::make(CommitteeRepository::class);
        $theme = $this->fakeCommitteeData($committeeFields);
        return $committeeRepo->create($theme);
    }

    /**
     * Get fake instance of Committee
     *
     * @param array $committeeFields
     * @return Committee
     */
    public function fakeCommittee($committeeFields = [])
    {
        return new Committee($this->fakeCommitteeData($committeeFields));
    }

    /**
     * Get fake data of Committee
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCommitteeData($committeeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_by' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $committeeFields);
    }
}
