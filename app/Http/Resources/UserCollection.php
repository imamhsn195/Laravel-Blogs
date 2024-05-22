<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }


    /**
     * Customize the pagination information for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array $paginated
     * @param  array $default
     * @return array
     */

     public function paginationInformation($request, $paginated, $default)
    {
        // Add a custom link
        $default['links']['custom'] = 'https://example.com/custom-page';

        // Add additional meta information
        $default['meta']['custom_meta'] = [
            'author' => 'John Doe',
            'version' => '1.0.0',
            'generated_at' => now()->toDateTimeString(),
        ];

        return $default;
    }
}
