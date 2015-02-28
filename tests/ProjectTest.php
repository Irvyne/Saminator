<?php

namespace Tests\Irvyne\Saminator;

use Irvyne\Saminator\Project;

/**
 * Class ProjectTest
 *
 * @package Tests\Irvyne\Saminator
 */
class ProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Irvyne\Saminator\Project::getName
     */
    public function testName()
    {
        $project = new Project('bioshock');

        $this->assertEquals('bioshock', $project->getName(), '->getName() sets the value');
    }
}
