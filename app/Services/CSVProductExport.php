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
     * @param string $searchQuery
     * @param array $filter
     * @param array $emails
     *
     * @return void
     */
    function export(string $searchQuery, array $filter, array $emails): void
    {

        // Get search and filtered values
        $brand_id = $filter['brand_id']['value'];
        $price_from = $filter['price']['price_from'];
        $price_to = $filter['price']['price_to'];

        // Create temporary file and rename it
        $filename = tempnam('/tmp', 'csv');
        rename($filename, $filename .= '.csv');

        // Open the file in writ emode
        $file = fopen($filename, 'w');

        // Put Columns in file
        $columns = array('id', 'name', 'barcode', 'brand', 'price', 'image', 'date_added', 'date_updated');
        fputcsv($file, $columns);

        // Load records and write them in file
        Product::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('name', 'LIKE', "%$searchQuery%")
                ->orWhere('barcode', 'LIKE', "%$searchQuery%")
                ->orWhere('id', 'LIKE', "%$searchQuery%");
        })->when($brand_id, function ($query) use ($brand_id) {
            $query->where('brand_id', $brand_id);
        })->when($price_from, function ($query) use ($price_from) {
            $query->where('price', '>=', $price_from);
        })->when($price_to, function ($query) use ($price_to) {
            $query->where('price', '<=', $price_to);
        })->chunkById(100, function ($products) use ($file) {

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