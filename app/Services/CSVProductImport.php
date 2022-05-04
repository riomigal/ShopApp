<?php

namespace App\Services;

use App\Mail\ProductUpdates;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;

class CSVProductImport
{

    function __construct()
    {
    }
    /**
     * Creates models from CSV files
     *
     * @param string $email
     * @param string $filename
     * @param string $disk
     *
     * @return void
     */
    function import(string $filename, string $disk = 'private'): void
    {

        $header = null;
        $path = storage_path("app/$disk/" . $filename);

        LazyCollection::make(function () use ($path, $header) {
            $file = fopen($path, 'r');
            while ($data = fgetcsv($file)) {
                if (!$header) $header = $data;
                yield $data;
            }
            fclose($file);
        })->skip(1)
            ->chunk(500)
            ->each(function ($data, $header) {

                $products = [];
                foreach ($data as $record) {

                    $record[2] = $this->getBrand($record[2])->id;
                    $record[4] = $this->uploadImage($record[4]);
                    $record[5] = Carbon::createFromFormat('d/m/Y H:i:s', $record[5]);

                    $products[] = array_combine(
                        ['name', 'barcode', 'brand_id', 'price', 'image_url', 'date_added'],
                        $record
                    );
                }
                Product::insert($products);
            });

        Mail::to(User::pluck('email')->toArray())
            ->send(new ProductUpdates(__('Products Import from CSV file completed.'), __('Product have been imported from the CSV file.')));

        unlink($path);
    }


    /**
     * Uploads the images on the server
     *
     * @param string $url
     *
     * @return string
     */
    function uploadImage(string $url): string|null
    {
        if ($url) {
            $contents = file_get_contents($url);
            $name = substr($url, strrpos($url, '/') + 1);
            Storage::put("public/$name", $contents);
            return $name;
        }
        return null;
    }



    /**
     * Creates a new brand if not in table
     *
     * @param string $brand
     *
     * @return Brand
     */
    function getBrand(string $brand): Brand
    {
        return Brand::firstOrCreate([
            'name' => $brand
        ]);
    }
}