<?php

namespace Tests;

use GrahamCampbell\TestBenchCore\MockeryTrait;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class AbstractTestCase extends BaseTestCase
{
    use CreatesApplication,
        MockeryTrait;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';
}
