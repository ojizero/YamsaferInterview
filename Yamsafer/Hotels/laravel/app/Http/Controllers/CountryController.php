<?php

namespace App\Http\Controllers;


use App\Country;
use Illuminate\Http\Request;


class CountryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index () {
		$countries = Country::all('name', 'country_code as code');

		return response()->json($countries, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create () {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store (Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id) {
		return response()->json(Country::find($id)->hotels()->get(), 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update (Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ($id) {
		//
	}


}


//<?php
///**
// * Created by PhpStorm.
// * User: oji
// * Date: 11/20/16
// * Time: 2:28 PM
// */
//
//namespace App\Http\Controllers;
//
//
//use App\Country;
//use App\Hotel;
//
//
//class CountryController extends Controller {
//	public function get_countries () {
//		$countries = Country::all();
//		$ret       = [];
//
//		foreach ($countries as $country) {
//			$ret['' . $country->id] = [
//				'name' => $country->name,
//				'code' => $country->country_code
//			];
//		}
//
//		return response()->json($ret, 200);
//	}
//
//	public function get_hotels ($country_id) {
//		$hotels = Hotel::where('country_id', '=', intval($country_id))->get();
//		$ret    = [];
//
//		foreach ($hotels as $hotel) {
//			$ret[$hotel->id] = [
//				'name'      => $hotel->name,
//				'city'      => City::find($hotel->city_id)->name,
//				'country'   => Country::find($hotel->country_id)->name,
//				'avg_price' => $hotel->avg_price,
//			];
//		}
//
//		return response()->json($ret, 200);
//	}
//
//	public function add_countries () {
//		for ($i = 0; $i < 2; $i++) {
//			$country               = new Country();
//			$country->name         = 'country ' . chr(ord('A') + $i);
//			$country->country_code = rand(100, 999);
//			$country->save();
//		}
//
//		return null;
//	}
//}