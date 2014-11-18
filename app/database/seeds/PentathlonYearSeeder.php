<?php

class PentathlonYearSeeder extends Seeder {

    public function run()
    {
        DB::table('pentathlon_year')->insert(array(
            array('year' => '2014'),
            array('year' => '2013'),
            array('year' => '2012'),
            array('year' => '2011'),
            array('year' => '2010'),
        ));
    }
}

