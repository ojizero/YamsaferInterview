<?php
/**
 * Created by PhpStorm.
 * User: oji
 * Date: 11/20/16
 * Time: 2:28 PM
 */

namespace App\Http\Controllers;


use App\City;
use App\Country;


class CityController extends Controller {
	public function get_cities () {
		$cities = City::all();
		$ret    = [];

		foreach ($cities as $city) {
			$ret['' . $city->id] = [
				'name' => $city->name
			];
		}

		return response()->json($ret, 200);
	}

	public function add_cities () {
		$c = 0;
		foreach (Country::all() as $country) {
			for ($i = 0; $i < 2; $i++) {
				$city             = new City();
				$city->name       = 'city ' . chr(ord('a') + $c);
				$city->country_id = $country->id;
				$city->lat        = rand(-90, 90);
				$city->long       = rand(-180, 180);
				$city->save();

				$c++;
			}
		}

		return null;
	}

	public function get_hotels ($city_id) {
		return response()->json(City::find($city_id)->hotels()->getResults(), 200);
	}

}