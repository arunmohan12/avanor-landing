<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Support\MediaUrl;

class LandingPageController extends Controller
{

    public function showTheheights()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 6)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('landingpages.the-heights', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }

    public function showPalmCentral()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 9)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */
$ag = request()->query('ag');

$heroEyebrow = match ($ag) {
    'name' => 'Palm Central Private Residences – New Release',
    'frondd' => 'Palm Central Frond D – Upcoming Release',
    default => 'Palm Central Private Residences by Nakheel',
};

        return view('landingpages.palm-jebel-ali', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
            'heroEyebrow',
        ));
    }

    public function showWadeemByModon()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 8)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('landingpages.wadeem', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }
    public function showYasRivaByAldar()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 7)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('landingpages.yas-riva', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }



    public function showBayEstate()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 10)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */


        return view('landingpages.bay-estate', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }

    public function showGhadeerParks()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 11)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */


        return view('landingpages.ghadeer-parks', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }


    public function showRiverside()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 12)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */


        return view('landingpages.riverside', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }


    public function showMareva()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 13)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('landingpages.mareva', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
        ));
    }


    public function showAldarNew()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 14)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);

        /*
|--------------------------------------------------------------------------
| Dynamic Ad Group Content
|--------------------------------------------------------------------------
*/

        $adGroup = request()->query('ag');

        /*
|--------------------------------------------------------------------------
| Hero Content (Default)
|--------------------------------------------------------------------------
*/

        $heroContent = [
            'eyebrow' => 'UPCOMING LAUNCH · NEAR DUBAI SILICON OASIS',
            'headline' => 'Aldar’s New Dubai Community',
            'description' => 'Villas and townhouses by Aldar and Dubai Holding, expected to launch before the end of 2026. Register now and get prices, floor plans and the payment plan first.',
        ];

        /*
|--------------------------------------------------------------------------
| Overview Content (Default)
|--------------------------------------------------------------------------
*/

        $overviewContent = [
            'eyebrow' => 'Overview',
            'title' => 'What we know so far',
            'description' => 'Aldar has confirmed plans for a large villa and townhouse community near Dubai Silicon Oasis. It’s being developed with Dubai Holding and is expected to launch before the end of 2026.',
        ];

        /*
|--------------------------------------------------------------------------
| Ad Group Variations
|--------------------------------------------------------------------------
*/

        $adGroupContent = [
            'greenwood' => [
                'hero' => [
                    'eyebrow' => 'REPORTED IN THE MARKET AS “GREENWOOD”',
                    'headline' => 'Aldar’s Upcoming Dubai Community',
                    'description' => 'Market reports call it Greenwood. Aldar hasn’t confirmed the name yet, but it has confirmed a villa and townhouse community near Dubai Silicon Oasis, with Dubai Holding, launching before the end of 2026. Register to get prices and floor plans first.',
                ],
                'overview' => [
                    'eyebrow' => 'GREENWOOD',
                    'title' => 'What is Greenwood?',
                    'description' => 'Market reports refer to the upcoming community as Greenwood. Aldar hasn’t confirmed the name yet, but it has confirmed a villa and townhouse community near Dubai Silicon Oasis, developed with Dubai Holding and expected to launch before the end of 2026.',
                ],
            ],

            'aldar' => [
                'hero' => [
                    'eyebrow' => 'ALDAR’S NEXT DUBAI LAUNCH · NEAR DUBAI SILICON OASIS',
                    'headline' => 'Aldar’s New Dubai Launch',
                    'description' => 'After Haven, Athlon and The Wilds, Aldar’s fourth Dubai community brings villas and townhouses near Dubai Silicon Oasis. Register now for prices, floor plans and the payment plan first.',
                ],
                'overview' => [
                    'eyebrow' => 'ALDAR’S NEXT DUBAI COMMUNITY',
                    'title' => 'What makes this launch significant?',
                    'description' => 'Following Haven, Athlon and The Wilds, Aldar is preparing another Dubai community featuring villas and townhouses near Dubai Silicon Oasis, in partnership with Dubai Holding. The launch is expected before the end of 2026.',
                ],
            ],
        ];

        if (isset($adGroupContent[$adGroup])) {
            $heroContent = $adGroupContent[$adGroup]['hero'];
            $overviewContent = $adGroupContent[$adGroup]['overview'];
        }

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */


        return view('landingpages.aldar-new', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
            'heroContent',
        ));
    }



    public function showPalmSprings()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 15)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);



        /*
|--------------------------------------------------------------------------
| Dynamic Ad Group Hero Content
|--------------------------------------------------------------------------
*/

        $adGroup = request()->query('ag');

        $heroContent = [
            'eyebrow' => 'NEW NAKHEEL LAUNCH · NEXT TO PALM JEBEL ALI',
            'headline' => 'Palm Springs by Nakheel',
            'description' => '3–4 bedroom townhouses and 4–5 bedroom villas on Sheikh Zayed Road, beside a Metro station. From AED 3.8M with 10% on booking.',
        ];

        $adGroupContent = [
            'nakheel' => [
                'eyebrow' => 'NAKHEEL’S NEW LAUNCH',
                'headline' => 'Nakheel’s New Townhouses & Villas',
                'description' => 'Palm Springs by Nakheel brings 3–4 bedroom townhouses and 4–5 bedroom villas next to Palm Jebel Ali, from AED 3.8M. Register to get the price list first.',
            ],

            'pja' => [
                'eyebrow' => 'NEXT TO PALM JEBEL ALI',
                'headline' => 'Villas & Townhouses Next to Palm Jebel Ali',
                'description' => 'Palm Springs by Nakheel: townhouses and villas beside Palm Jebel Ali from AED 3.8M, far below on-island prices. Register for the price list first.',
            ],
        ];

        if (isset($adGroupContent[$adGroup])) {
            $heroContent = $adGroupContent[$adGroup];
        }

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */





        return view('landingpages.palm-springs', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
            'heroContent',
        ));
    }



    public function showHayat()
    {

        $property = Property::query()
            ->with([
                'developer',
                'project',
                'community',
                'emirate',
                'unitTypes.propertyType',
                'amenities',
                'sections',
            ])
            ->where('id', 16)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        $coverMedia = $property->getFirstMedia('cover');

        $propertyImageUrl = $coverMedia
            ? MediaUrl::fromMedia(
                $coverMedia,
                'cover_avif'
            )
            : null;

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        $galleryImages = $property->getMedia('gallery');

        // First 2 gallery images used in hero after cover
        $heroGalleryImages = $galleryImages->take(2);

        $hasHeroImages =
            $coverMedia !== null ||
            $heroGalleryImages->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | Unit Types
        |--------------------------------------------------------------------------
        */

        $unitTypes = $property->unitTypes;

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $amenities = $property->amenities;

        /*
        |--------------------------------------------------------------------------
        | Content Sections
        |--------------------------------------------------------------------------
        */

        $activeSections = $property->sections
            ->where('is_active', true)
            ->sortBy('display_order')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Property Facts
        |--------------------------------------------------------------------------
        */

        $hasFacts =
            filled($property->starting_price) ||
            filled($property->price) ||
            $unitTypes->isNotEmpty() ||
            filled($property->handover_quarter) ||
            filled($property->handover_year) ||
            filled($property->payment_plan);

        /*
        |--------------------------------------------------------------------------
        | Project Description
        |--------------------------------------------------------------------------
        */

        $hasProjectDescription =
            $property->project !== null &&
            filled($property->project->description);



        /*
|--------------------------------------------------------------------------
| Dynamic Ad Group Hero Content
|--------------------------------------------------------------------------
*/

        $adGroup = request()->query('ag');

// Default content — no ad group parameter
$heroContent = [
    'eyebrow' => 'NOW SELLING · DUBAI SOUTH',
    'headline' => 'HAYAT 8 by Dubai South',
    'description' => '4, 5 and 6-bedroom standalone villas from AED 6.5M. 5% down payment, 30% post-handover, 2% DLD fee waiver.',
];

$adGroupContent = [
    'villas' => [
        'eyebrow' => 'NEW VILLA LAUNCH IN DUBAI SOUTH',
        'headline' => 'New Standalone Villas in Dubai South from AED 6.5M',
        'description' => 'HAYAT 8 by Dubai South Properties: 4–6 bedroom villas next to the Golf District. 5% down, 2% DLD fee waiver, completion Q3 2029.',
    ],

        'hayat' => [
        'eyebrow' => 'NOW SELLING · ALL VILLA TYPES AVAILABLE',
        'headline' => 'HAYAT 8: Standalone Villas by Dubai South',
        'description' => 'The first standalone villa collection in HAYAT. 4, 5 and 6 bedrooms from AED 6.5M with 5% down and 30% after handover.',
    ],
];

if (isset($adGroupContent[$adGroup])) {
    $heroContent = $adGroupContent[$adGroup];
}

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */





        return view('landingpages.hayat', compact(
            'property',
            'coverMedia',
            'propertyImageUrl',
            'galleryImages',
            'heroGalleryImages',
            'hasHeroImages',
            'unitTypes',
            'amenities',
            'activeSections',
            'hasFacts',
            'hasProjectDescription',
            'heroContent',
        ));
    }
}
