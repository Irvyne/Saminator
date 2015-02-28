<?php

namespace Irvyne\Saminator\Factory;

use Irvyne\Saminator\Model\ProjectInterface;
use Sami\Version\GitVersionCollection;

class GitVersionCollectionFactory
{
    public static function create(ProjectInterface $project)
    {
        /** @var GitVersionCollection $gitVersionCollection */
        $gitVersionCollection = GitVersionCollection::create($project->getDir());

        foreach ($project->getTags() as $tag) {
            $gitVersionCollection->addFromTags($tag);
        }

        foreach ($project->getBranches() as $branch => $title) {
            $gitVersionCollection->add($branch, $title);
        }

        return $gitVersionCollection;
    }
}
