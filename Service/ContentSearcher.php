<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Service;

use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class ContentSearcher
{
    const LIMIT_PER_PAGE = 10;

    private $searchService;
    private $offset;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    public function findContentItems()
    {
        $query = new LocationQuery();
        $query->query = new Criterion\Subtree('/1/');
        $query->offset = (int)$this->offset;
        $query->limit = self::LIMIT_PER_PAGE;

        return $this->searchService->findLocations($query);
    }

    public function calculatePreviousIndex()
    {
        $previous = null;
        if ($this->offset > 0) {
            $previous = max(0, $this->offset - self::LIMIT_PER_PAGE);
        }

        return $previous;
    }

    public function calculateNextIndex($totalCount)
    {
        $next = null;
        if (($this->offset + self::LIMIT_PER_PAGE) < $totalCount) {
            $next = $this->offset + self::LIMIT_PER_PAGE;
        }

        return $next;
    }
}
