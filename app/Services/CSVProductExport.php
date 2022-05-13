<?php

namespace App\Services;

use App\Mail\ProductUpdates as ProductMails;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;
use Nette\Utils\Random;

class CSVProductExport
{


    /**
     * Exports the filtered records to csv to CSV
     *
     * @param array $ids
     * @param array $emails
     *
     * @return void
     */
    function export(array $ids, array $emails): void
    {



        // Create temporary file and rename it
        $filename = tempnam('/tmp', 'csv');
        rename($filename, $filename .= '.csv');

        // Open the file in writ emode
        $file = fopen($filename, 'w');

        // Put Columns in file
        $columns = array('id', 'name', 'barcode', 'brand', 'price', 'image', 'date_added', 'date_updated');
        fputcsv($file, $columns);

        // Load records and write them in file
        Product::whereIn('id', $ids)
            ->chunkById(100, function ($products) use ($file) {
                foreach ($products as $product) {
                    fputcsv($file, array(
                        $product->id,
                        $product->name,
                        $product->barcode,
                        $product->brand->name,
                        $product->price,
                        storage_path("public/" . $product->image),
                        $product->date_added,
                        $product->date_updated
                    ));
                }
            });

        // Send file to user/s
        Mail::to($emails)
            ->send(new ProductMails(__('Products export completed!'), __('Please download the csv in the attachment.'), $filename));

        //Close file and unlink
        fclose($file);
        unlink($filename);
    }
}