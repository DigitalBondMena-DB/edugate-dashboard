<?php

namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function handle($file, $path, $existingImage = null)
    {
        $baseName = time() . Str::random(10);
        $folder = public_path($path);

        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $image = Image::read($file->getRealPath());

        // define sizes for different devices
        $sizes = [
            'mobile' => 480,
            'tablet' => 768,
            'pc'     => 1200,
        ];

        $mainFileName = null;

        foreach ($sizes as $device => $width) {
            $resized = clone $image;
            $resized
                ->scale(width: $width)
                ->toWebp(80);

            $fileName = "{$baseName}_{$device}.webp";
            $resized->save("{$folder}/{$fileName}");

            if ($device === 'pc') {
                $mainFileName = $fileName;
            }
        }

        // remove existing images if provided
        if ($existingImage !== null) {
            $oldBase = preg_replace('/_(mobile|tablet|pc)\.webp$/', '', $existingImage);
            foreach (['mobile', 'tablet', 'pc'] as $device) {
                $oldPath = "{$folder}/{$oldBase}_{$device}.webp";
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }

        // return the main image filename (pc version)
        return $mainFileName;
    }
}
