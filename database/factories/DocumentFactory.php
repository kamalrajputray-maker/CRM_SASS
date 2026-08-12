<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    public function definition(): array
    {
        $extension = fake()->randomElement([
            'pdf',
            'jpg',
            'png',
            'docx',
        ]);

        $fileName = Str::uuid() . '.' . $extension;

        return [
            'public_id' => (string) Str::ulid(),

            'company_id' => null,

            'customer_id' => null,

            'deal_id' => null,

            'disk' => 'local',

            'file_name' => $fileName,

            'original_name' => fake()->words(3, true) . '.' . $extension,

            'mime_type' => match ($extension) {
                'pdf' => 'application/pdf',
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            },

            'size' => fake()->numberBetween(
                10_000,
                5_000_000
            ),

            'path' => 'documents/' . $fileName,

            'uploaded_by' => null,
        ];
    }
}