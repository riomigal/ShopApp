<?php

namespace Tests\Unit;

use App\Services\CSVProductImport;
use Tests\TestCase;

class CSVImportTest extends TestCase
{
    /**
     * A basic unit test example.
     * @doesNotPerformAssertions
     * @return void
     */
    public function test_import_data()
    {

        $bool = (new CSVProductImport)->import('4GObw9LI2DkltKTDIkTARhDlicmyZS-metabGVnYWN5X3Byb2R1Y3RzLmNzdg==-.csv');
        $this->assertTrue($bool);
    }
}