<?php

class PentathlonAgeGroupSeeder extends Seeder {

    public function run()
    {
        DB::table('pentathlon_age_group')->insert(array(
            array('age_group' => 'Senior'),
            array('age_group' => 'Felnőtt'),
            array('age_group' => 'Junior'),
            array('age_group' => 'Ifi A'),
            array('age_group' => 'Ifi B'),
            array('age_group' => 'Ifi C'),
            array('age_group' => 'Ifi D'),
            array('age_group' => 'Ifi E'),
            array('age_group' => 'Ifi F'),
            array('age_group' => 'Ifi G'),
            array('age_group' => 'Ifi H'),
        ));
    }
}

