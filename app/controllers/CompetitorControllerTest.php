<?php

class CompetitorControllerTest extends BaseController {

    public function getIndex() {
	$countries = Country::all();
        $countriesArr = array();
        foreach($countries as $country)
            {
                $countriesArr[$country->id] = $country->country;	
            }
        $data = array(
             'country' => 'my_country',
             'countries' => $countriesArr
        );
        
        return View::make('admin/countries_view',$data);
    }
    
    public function postIndex() {
        $data2 = Input::all();
        $rules = array(
            'name' => 'required|alpha|min:2'
        );
        $validator = Validator::make($data2, $rules);
        if ($validator->passes()) {
            //return 'Data was saved';
            return $data2;
        }
        
        return Redirect::to('/competitor')->withErrors($validator);
    }
}

