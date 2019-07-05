<?php

namespace Tests;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener as PHPUnitTestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use Throwable;

class TestListener implements PHPUnitTestListener
{
    /**
     * An error occurred.
     */
    public function addError(Test $test, Throwable $t, float $time): void
    {
        //
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        //
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        //
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, Throwable $t, float $time): void
    {
        //
    }

    /**
     * Risky test.
     */
    public function addRiskyTest(Test $test, Throwable $t, float $time): void
    {
        //
    }

    /**
     * Skipped test.
     */
    public function addSkippedTest(Test $test, Throwable $t, float $time): void
    {
        //
    }

    /**
     * A test suite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
        //
    }

    /**
     * A test suite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
        if ($suite->getName() !== 'Unit' || $suite->getName() !== 'Feature') {
            return;
        }
        foreach (glob(__DIR__.'/../bootstrap/cache{,t}/*.php', GLOB_BRACE) as $file) {
            unlink($file);
        }
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        //
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        //
    }
}
