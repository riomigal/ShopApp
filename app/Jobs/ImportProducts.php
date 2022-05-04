<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\CSVProductImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 0;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected string $filename,
        protected string $disk = 'private'
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new CSVProductImport())->import($this->filename, $this->disk);
    }
}