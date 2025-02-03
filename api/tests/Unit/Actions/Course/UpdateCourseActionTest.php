<?php

namespace Tests\Unit\Actions\Course;

use App\Actions\Course\UpdateCourseAction;
use App\Models\Course;
use Mockery\MockInterface;
use Tests\Cases\TestCaseUnit;

class UpdateCourseActionTest extends TestCaseUnit
{
    public function test_should_update_course()
    {
        $data = [
            'title' => 'test',
            'description' => 'description',
            'start_date' => '2025-01-01',
            'end_date' => '2026-01-03',
        ];

        $course = $this->mock(Course::class, function (MockInterface $mock) {
            $mock->shouldReceive('update')->once()->andReturn(true);
        });

        $result = (new UpdateCourseAction())->execute($course, $data);

        $this->assertInstanceOf(Course::class, $result);
    }
}
