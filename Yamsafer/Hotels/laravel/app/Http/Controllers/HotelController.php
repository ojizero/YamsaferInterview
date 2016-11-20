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
use App\Hotel;
use ConstructorIO\ConstructorIO;


// Key -> atXDAB6JeAKpgykiCGWl
// API -> ldz1KNXyoVfEBjEZnWTa

class HotelController extends Controller {
	public function add_hotels () {
		$c = 0;
		foreach (Country::all() as $country) {
			foreach (City::where('country_id', '=', $country->id)->get() as $city) {
				$hotel = new Hotel();

				$hotel->name = 'hotel ' . chr(ord('A') + $c);
//				$hotel->country_id = $country->id;
				$hotel->city_id   = $city->id;
				$hotel->stars     = rand(1, 5);
				$hotel->avg_price = rand(1, 10);

				$hotel->save();

				$c++;
			}
		}

		return null;
	}

	public function get_cheapest ($country_id) {
		return response()->json(Country::find($country_id)->hotels()->orderBy('avg_price', 'asc')->first(['hotels.name as Name', 'stars as Stars', 'avg_price as Price']), 200);


//		$cities = [];
//		foreach (City::where('country_id', '=', intval($country_id))->get() as $city) {
//			array_push($cities, $city->id);
//		}
//		$cheapest = Hotel::whereIn('city_id', $cities)->orderBy('avg_price', 'asc')->first();
//
//		if ($cheapest) {
//			return response()->json([
//				$cheapest->id => [
//					'name'      => $cheapest->name,
//					'city'      => City::find($cheapest->city_id)->name,
////				'country'   => Country::find($cheapest->country_id)->name,
//					'stars'     => $cheapest->stars,
//					'avg_price' => $cheapest->avg_price,
//				]
//			], 200);
//		} else {
//			return null;
//		}
	}

	public function add_items () {
		$hotels      = Hotel::all(['name', 'id']);
		$items       = [];
		$constructor = new ConstructorIO("ldz1KNXyoVfEBjEZnWTa", "atXDAB6JeAKpgykiCGWl");

//		return response()->json($hotels, 200);
		foreach ($hotels as $hotel) {
//			$items[] = ['item_name' => '' . $hotel['name'], 'id' => '' . $hotel['id']];
			$constructor->addOrUpdate($hotel['id'] . ' - ' . $hotel['name'], 'Search Suggestions', ['id' => '' . $hotel['id']]);
		}


//		$constructor->addBatch($items, 'Search Suggestions');
//		return $constructor->verify();
	}

	public function search ($query) {
		$results = json_decode(file_get_contents("https://ac.cnstrc.com/autocomplete/$query?autocomplete_key=atXDAB6JeAKpgykiCGWl"), true);

		return response()->json($results['suggestions'][0], 200);
	}
}