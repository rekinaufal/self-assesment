<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Computation;
use App\Models\CalculationResult;
use App\Models\PermenperinCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use function PHPSTORM_META\type;

class ComputationController extends Controller
{
    public static $pageTitle = 'Perhitungan';

    public function index()
    {
        $data = [
            "pageTitle" => self::$pageTitle,
            "computations" => Computation::orderBy("id", "desc")->whereUserId(Auth::user()->id)->get(),
            "permenperinCategories" => PermenperinCategory::all(),
        ];
        // $pageTitle = self::$pageTitle;

        return view('computation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate(Computation::$rules);
        $credentials["user_id"] = Auth::user()->id;

        $computation = Computation::updateOrInsert(["id" => $request->id], $credentials);

        if (!$computation) return redirect()->route("computation.index")->with("failed", "Failed to create new computation!");

        if ($request->id != null) {
            return redirect()->route("computation.index")->with("success", "Success to edit the computation!");
        }
        return redirect()->route("computation.index")->with("success", "Success to create new computation!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function show(Computation $computation)
    {
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        $data = [
            "pageTitle" => self::$pageTitle,
            "computation" => $computation,
            "countries" => $countries
        ];

        return view('calculation-result.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function edit(Computation $computation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computation $computation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computation  $computation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computation $computation)
    {
        $computation = $computation->delete();

        if (!$computation) {
            return redirect()->route("computation.index")->with("failed", "Failed to delete the computation");
        }

        return redirect()->route("computation.index")->with("success", "Success to delete the computation!");
    }

    public function exportExcel($id)
    {
        $data = [
            "computations" => Computation::where('id', $id)->get(),
            "form_detail" => CalculationResult::where('computation_id', $id)->get()->toArray(),
        ];
        if (!$data['form_detail'][0]) {
            return redirect()->back()->with('failed', 'Data is Empty');
        }
        // dd($data['form_detail'][0]['results']['calculations']);
        $form = [];
        foreach ($data['form_detail'][0]['results']['calculations'] as $item) {
            $form[$item['no']] = $item;
        }
        $export = new UserExport($form, $data['computations'][0]);
        return Excel::download($export, 'report.xlsx');
    }
}
