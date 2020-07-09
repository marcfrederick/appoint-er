<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use _HumbugBox69342eed62ce\Nette\Neon\Exception;
use App\Address;
use App\Category;
use App\Http\Requests\LocationCreateAddressRequest;
use App\Http\Requests\LocationCreateInfoRequest;
use App\Location;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
{
    /** @var array<string, string> */
    private const COUNTRY_CODES = [
        'AFG' => 'Afghanistan',
        'ALA' => 'Åland Islands',
        'ALB' => 'Albania',
        'DZA' => 'Algeria',
        'ASM' => 'American Samoa',
        'AND' => 'Andorra',
        'AGO' => 'Angola',
        'AIA' => 'Anguilla',
        'ATA' => 'Antarctica',
        'ATG' => 'Antigua and Barbuda',
        'ARG' => 'Argentina',
        'ARM' => 'Armenia',
        'ABW' => 'Aruba',
        'AUS' => 'Australia',
        'AUT' => 'Austria',
        'AZE' => 'Azerbaijan',
        'BHS' => 'Bahamas',
        'BHR' => 'Bahrain',
        'BGD' => 'Bangladesh',
        'BRB' => 'Barbados',
        'BLR' => 'Belarus',
        'BEL' => 'Belgium',
        'BLZ' => 'Belize',
        'BEN' => 'Benin',
        'BMU' => 'Bermuda',
        'BTN' => 'Bhutan',
        'BOL' => 'Bolivia, Plurinational State of',
        'BES' => 'Bonaire, Sint Eustatius and Saba',
        'BIH' => 'Bosnia and Herzegovina',
        'BWA' => 'Botswana',
        'BVT' => 'Bouvet Island',
        'BRA' => 'Brazil',
        'IOT' => 'British Indian Ocean Territory',
        'BRN' => 'Brunei Darussalam',
        'BGR' => 'Bulgaria',
        'BFA' => 'Burkina Faso',
        'BDI' => 'Burundi',
        'KHM' => 'Cambodia',
        'CMR' => 'Cameroon',
        'CAN' => 'Canada',
        'CPV' => 'Cape Verde',
        'CYM' => 'Cayman Islands',
        'CAF' => 'Central African Republic',
        'TCD' => 'Chad',
        'CHL' => 'Chile',
        'CHN' => 'China',
        'CXR' => 'Christmas Island',
        'CCK' => 'Cocos (Keeling) Islands',
        'COL' => 'Colombia',
        'COM' => 'Comoros',
        'COG' => 'Congo',
        'COD' => 'Congo, the Democratic Republic of the',
        'COK' => 'Cook Islands',
        'CRI' => 'Costa Rica',
        'CIV' => 'Côte d\'Ivoire',
        'HRV' => 'Croatia',
        'CUB' => 'Cuba',
        'CUW' => 'Curaçao',
        'CYP' => 'Cyprus',
        'CZE' => 'Czech Republic',
        'DNK' => 'Denmark',
        'DJI' => 'Djibouti',
        'DMA' => 'Dominica',
        'DOM' => 'Dominican Republic',
        'ECU' => 'Ecuador',
        'EGY' => 'Egypt',
        'SLV' => 'El Salvador',
        'GNQ' => 'Equatorial Guinea',
        'ERI' => 'Eritrea',
        'EST' => 'Estonia',
        'ETH' => 'Ethiopia',
        'FLK' => 'Falkland Islands (Malvinas)',
        'FRO' => 'Faroe Islands',
        'FJI' => 'Fiji',
        'FIN' => 'Finland',
        'FRA' => 'France',
        'GUF' => 'French Guiana',
        'PYF' => 'French Polynesia',
        'ATF' => 'French Southern Territories',
        'GAB' => 'Gabon',
        'GMB' => 'Gambia',
        'GEO' => 'Georgia',
        'DEU' => 'Germany',
        'GHA' => 'Ghana',
        'GIB' => 'Gibraltar',
        'GRC' => 'Greece',
        'GRL' => 'Greenland',
        'GRD' => 'Grenada',
        'GLP' => 'Guadeloupe',
        'GUM' => 'Guam',
        'GTM' => 'Guatemala',
        'GGY' => 'Guernsey',
        'GIN' => 'Guinea',
        'GNB' => 'Guinea-Bissau',
        'GUY' => 'Guyana',
        'HTI' => 'Haiti',
        'HMD' => 'Heard Island and McDonald Islands',
        'VAT' => 'Holy See (Vatican City State)',
        'HND' => 'Honduras',
        'HKG' => 'Hong Kong',
        'HUN' => 'Hungary',
        'ISL' => 'Iceland',
        'IND' => 'India',
        'IDN' => 'Indonesia',
        'IRN' => 'Iran, Islamic Republic of',
        'IRQ' => 'Iraq',
        'IRL' => 'Ireland',
        'IMN' => 'Isle of Man',
        'ISR' => 'Israel',
        'ITA' => 'Italy',
        'JAM' => 'Jamaica',
        'JPN' => 'Japan',
        'JEY' => 'Jersey',
        'JOR' => 'Jordan',
        'KAZ' => 'Kazakhstan',
        'KEN' => 'Kenya',
        'KIR' => 'Kiribati',
        'PRK' => 'Korea, Democratic People\'s Republic of',
        'KOR' => 'Korea, Republic of',
        'KWT' => 'Kuwait',
        'KGZ' => 'Kyrgyzstan',
        'LAO' => 'Lao People\'s Democratic Republic',
        'LVA' => 'Latvia',
        'LBN' => 'Lebanon',
        'LSO' => 'Lesotho',
        'LBR' => 'Liberia',
        'LBY' => 'Libya',
        'LIE' => 'Liechtenstein',
        'LTU' => 'Lithuania',
        'LUX' => 'Luxembourg',
        'MAC' => 'Macao',
        'MKD' => 'Macedonia, the former Yugoslav Republic of',
        'MDG' => 'Madagascar',
        'MWI' => 'Malawi',
        'MYS' => 'Malaysia',
        'MDV' => 'Maldives',
        'MLI' => 'Mali',
        'MLT' => 'Malta',
        'MHL' => 'Marshall Islands',
        'MTQ' => 'Martinique',
        'MRT' => 'Mauritania',
        'MUS' => 'Mauritius',
        'MYT' => 'Mayotte',
        'MEX' => 'Mexico',
        'FSM' => 'Micronesia, Federated States of',
        'MDA' => 'Moldova, Republic of',
        'MCO' => 'Monaco',
        'MNG' => 'Mongolia',
        'MNE' => 'Montenegro',
        'MSR' => 'Montserrat',
        'MAR' => 'Morocco',
        'MOZ' => 'Mozambique',
        'MMR' => 'Myanmar',
        'NAM' => 'Namibia',
        'NRU' => 'Nauru',
        'NPL' => 'Nepal',
        'NLD' => 'Netherlands',
        'NCL' => 'New Caledonia',
        'NZL' => 'New Zealand',
        'NIC' => 'Nicaragua',
        'NER' => 'Niger',
        'NGA' => 'Nigeria',
        'NIU' => 'Niue',
        'NFK' => 'Norfolk Island',
        'MNP' => 'Northern Mariana Islands',
        'NOR' => 'Norway',
        'OMN' => 'Oman',
        'PAK' => 'Pakistan',
        'PLW' => 'Palau',
        'PSE' => 'Palestinian Territory, Occupied',
        'PAN' => 'Panama',
        'PNG' => 'Papua New Guinea',
        'PRY' => 'Paraguay',
        'PER' => 'Peru',
        'PHL' => 'Philippines',
        'PCN' => 'Pitcairn',
        'POL' => 'Poland',
        'PRT' => 'Portugal',
        'PRI' => 'Puerto Rico',
        'QAT' => 'Qatar',
        'REU' => 'Réunion',
        'ROU' => 'Romania',
        'RUS' => 'Russian Federation',
        'RWA' => 'Rwanda',
        'BLM' => 'Saint Barthélemy',
        'SHN' => 'Saint Helena, Ascension and Tristan da Cunha',
        'KNA' => 'Saint Kitts and Nevis',
        'LCA' => 'Saint Lucia',
        'MAF' => 'Saint Martin (French part)',
        'SPM' => 'Saint Pierre and Miquelon',
        'VCT' => 'Saint Vincent and the Grenadines',
        'WSM' => 'Samoa',
        'SMR' => 'San Marino',
        'STP' => 'Sao Tome and Principe',
        'SAU' => 'Saudi Arabia',
        'SEN' => 'Senegal',
        'SRB' => 'Serbia',
        'SYC' => 'Seychelles',
        'SLE' => 'Sierra Leone',
        'SGP' => 'Singapore',
        'SXM' => 'Sint Maarten (Dutch part)',
        'SVK' => 'Slovakia',
        'SVN' => 'Slovenia',
        'SLB' => 'Solomon Islands',
        'SOM' => 'Somalia',
        'ZAF' => 'South Africa',
        'SGS' => 'South Georgia and the South Sandwich Islands',
        'SSD' => 'South Sudan',
        'ESP' => 'Spain',
        'LKA' => 'Sri Lanka',
        'SDN' => 'Sudan',
        'SUR' => 'Suriname',
        'SJM' => 'Svalbard and Jan Mayen',
        'SWZ' => 'Swaziland',
        'SWE' => 'Sweden',
        'CHE' => 'Switzerland',
        'SYR' => 'Syrian Arab Republic',
        'TWN' => 'Taiwan, Province of China',
        'TJK' => 'Tajikistan',
        'TZA' => 'Tanzania, United Republic of',
        'THA' => 'Thailand',
        'TLS' => 'Timor-Leste',
        'TGO' => 'Togo',
        'TKL' => 'Tokelau',
        'TON' => 'Tonga',
        'TTO' => 'Trinidad and Tobago',
        'TUN' => 'Tunisia',
        'TUR' => 'Turkey',
        'TKM' => 'Turkmenistan',
        'TCA' => 'Turks and Caicos Islands',
        'TUV' => 'Tuvalu',
        'UGA' => 'Uganda',
        'UKR' => 'Ukraine',
        'ARE' => 'United Arab Emirates',
        'GBR' => 'United Kingdom',
        'USA' => 'United States',
        'UMI' => 'United States Minor Outlying Islands',
        'URY' => 'Uruguay',
        'UZB' => 'Uzbekistan',
        'VUT' => 'Vanuatu',
        'VEN' => 'Venezuela, Bolivarian Republic of',
        'VNM' => 'Viet Nam',
        'VGB' => 'Virgin Islands, British',
        'VIR' => 'Virgin Islands, U.S.',
        'WLF' => 'Wallis and Futuna',
        'ESH' => 'Western Sahara',
        'YEM' => 'Yemen',
        'ZMB' => 'Zambia',
        'ZWE' => 'Zimbabwe',
    ];

    /**
     * LocationController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Location::class, 'location');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('location.index', ['locations' => Location::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create_1(Request $request)
    {
        $this->authorize('create', Location::class);
        return response()->view('location.create_1', ['categories' => Category::all()]);
    }

    /**
     * @param  LocationCreateInfoRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create_2(LocationCreateInfoRequest $request)
    {
        $this->authorize('create', Location::class);

        Session::put('location_info', [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
        ]);

        return response()->view('location.create_2', ['countryCodes' => self::COUNTRY_CODES]);
    }

    /**
     * @param  LocationCreateAddressRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function create_3(LocationCreateAddressRequest $request)
    {
        $this->authorize('create', Location::class);

        /** @var array<string, mixed>|null $location_info */
        $location_info = Session::remove('location_info');
        if (is_null($location_info)) {
            throw new \Exception("Location info missing from session!");
        }

        $location_address = [
            'street' => $request->get('street'),
            'postcode' => $request->get('postcode'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
        ];

        $data = array_merge($location_info, $location_address);
        Session::put('location_data', $data);
        return response()->view('location.create_3', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $data = Session::remove('location_data');
        $rules = array_merge((new LocationCreateInfoRequest)->rules(), (new LocationCreateAddressRequest())->rules());
        \Validator::validate($data, $rules);

        $location = Location::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'address_id' => Address::create([
                'street' => $data['street'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'country' => $data['country'],
            ])->id,
            'user_id' => $request->user()->id,
        ]);
        $location->addCategoryByName($data['category']);

        Log::info('Stored location', ['location_id' => $location]);

        Session::push('toasts', 'Location created successfully!');
        return response()->redirectToRoute('locations.show', $location);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        Log::info('Showing location', ['location_id' => $location->id]);
        return response()->view('location.show', ['location' => $location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return response()->view('location.edit', [
            'location' => $location,
            'countryCodes' => self::COUNTRY_CODES
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Location $location
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception If the location's address is missing for some reason.
     */
    public function update(Request $request, Location $location)
    {
        $data = $request->all();

        $location->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        $address = $location->address;
        if (is_null($address)) {
            // This should never actually happen, as location->address is a 1-to-1 relationship
            // but better safe than sorry.
            Log::error("Address for location {$location->id} is missing.");
            throw new Exception('Address for this location is missing and couldn\'t be updated.');
        }
        $address->update([
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);

        Log::info('Edited location', ['location_id' => $location]);

        Session::push('toasts', 'Location edited successfully!');
        return response()->redirectToRoute('locations.show', $location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location $location
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Location $location)
    {
        $location->delete();

        Log::info('Deleted location', ['location_id' => $location->id]);
        Session::push('toasts', 'Location deleted successfully!');
        return response()->redirectTo(RouteServiceProvider::HOME);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function search(Request $request)
    {
        $this->authorize('viewAny', Location::class);

        $query = $request->input('query');
        Log::info('Performing search', ['user_id' => $request->user(), 'query' => $query]);
        $locations = Location::whereRaw("UPPER(title) LIKE '%" . strtoupper($query) . "%'")
            ->paginate();

        return response()->view('location.index', ['locations' => $locations]);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function jsonSearch(Request $request)
    {
        $this->authorize('viewAny', Location::class);
        $title = $request->input('title', '');
        $category = $request->input('category', '');
        $count = $request->input('count', 15);

        Log::info('Performing ajax search', ['user_id' => $request->user(), 'title' => $title, 'category' => $category]);
        $return = Location::select(['locations.id', 'locations.title', 'locations.description'])
            ->leftJoin('category_location', 'category_location.location_id', '=', 'locations.id')
            ->leftJoin('categories', 'category_location.category_id', '=', 'categories.id')
            ->orderBy('locations.updated_at', 'desc')
            ->limit($count);

        if (!empty($title)) {
            $return = $return->whereRaw("UPPER(title) LIKE '%" . strtoupper($title) . "%'");
        }
        if (!empty($category) && $category !== '*') {
            $return = $return->where('categories.id', '=', $category);
        }

        return response()->json($return->get());
    }
}
