<?php

namespace App\Http\Controllers;

use App\Localitie;
use Illuminate\Http\Request;

class LocalitieController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$ListUrl = 'https://api.theatredelaville-paris.com/places';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);
		$listDB = Localitie::get();
		if (count($arr) > count($listDB)) {

			foreach ($arr as $key) {

				if (Localitie::where('postal_code', $key["address"]["postalCode"])->first() == null) {
					$l = new Localitie();
					$l->postal_code = $key["address"]["postalCode"];
					$l->locality = $key["address"]["addressLocality"];
					$l->save();
				}
			}
		} else {echo "rien a rajouté";}
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Localitie  $localitie
	 * @return \Illuminate\Http\Response
	 */
	public function show(Localitie $localitie) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Localitie  $localitie
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Localitie $localitie) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Localitie  $localitie
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Localitie $localitie) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Localitie  $localitie
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Localitie $localitie) {
		//
	}
}
