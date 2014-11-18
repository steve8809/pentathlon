<?php

class CompetitorController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$competitors = Competitor::all();
        $competitors = Competitor::with('country', 'club')->get();
        //$country_name = Country::find(1)->competitor;
        
        return View::make('admin/competitor.index')
                ->with('competitors', $competitors);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        $countries = Country::lists('country','id');
        $clubs = Club::lists('name','id');
        
        return View::make('admin/competitor.create', compact('countries', 'clubs'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'name'       => 'required|alpha_spaces',
            'birthday'      => 'required|date',
            'country' => 'required',
            'club' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('competitor/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            //store
            $competitor = new Competitor;
            $competitor->name = Input::get('name');
            $competitor->birthday = Input::get('birthday');
            $competitor->country_id = Input::get('country');
            $competitor->club_id = Input::get('club');
            $competitor->save();

            // redirect
            Session::flash('message', 'Versenyző létrehozva');
            return Redirect::to('competitor');
        }
    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get 
        $competitor = Competitor::find($id);

        
        
        // show the view and pass the nerd to it
        return View::make('admin/competitor.show')
            ->with('competitor', $competitor);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //get
        $competitor = Competitor::find($id);
        
        $countries = Country::lists('country','id');
        $clubs = Club::lists('name','id');
        
        // show the view and pass the nerd to it
        return View::make('admin/competitor.edit', compact('countries','clubs','competitor'));
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'name'       => 'required|alpha_spaces',
            'birthday'      => 'required|date',
            'country_id' => 'required',
            'club_id' => 'required'
        );
        
        $hunNames = array(
            'name' => 'Versenyző neve',
            'birthday' => 'Születési idő',
            'country_id' => 'Ország',
            'club_id' => 'Egyesület'
            
        );
        
        $validator = Validator::make(Input::all(), $rules);
        $validator->setAttributeNames($hunNames); 
        
        if ($validator->fails()) {
            return Redirect::to('competitor/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            //store
            $competitor = Competitor::find($id);
            $competitor->name = Input::get('name');
            $competitor->birthday = Input::get('birthday');
            $competitor->country_id = Input::get('country_id');
            $competitor->club_id = Input::get('club_id');
            $competitor->save();

            // redirect
            Session::flash('message', 'Versenyző adatai módosítva');
            return Redirect::to('competitor');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $competitor = Competitor::find($id);
        $competitor->delete();

        // redirect
        Session::flash('message', 'Versenyző törölve');
        return Redirect::to('competitor');
    }

}
