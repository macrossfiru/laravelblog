<?php

class MojangController extends BaseController {


  public function index()
  {
    return;
  }
  
	/**
	 * Display the specified resource.
	 *
	 * @param  string  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.mojang.com/users/profiles/minecraft/" . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return a string
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
	}



}
