<?php 
$config = array(
                 'login' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required'
                                         )
                                    ),
                 'profile' => array(
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'required|alpha_numeric_spaces'
                                         ),
                                    array(
                                            'field' => 'age',
                                            'label' => 'Age',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'nationality',
                                            'label' => 'Nationality',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'measurements',
                                            'label' => 'measurements',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'height',
                                            'label' => 'height',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'hair_colour',
                                            'label' => 'hair_colour',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'eye_colour',
                                            'label' => 'eye_colour',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'languages',
                                            'label' => 'languages',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'price_one_hour',
                                            'label' => 'price_one_hour',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'email',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'price_three_hour',
                                            'label' => 'price_three_hour',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'price_over_night',
                                            'label' => 'price_over_night',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'fk_city_id',
                                            'label' => 'fk_city_id',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'fk_area_id',
                                            'label' => 'fk_area_id',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'contact_number',
                                            'label' => 'contact_number',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'seeking_for',
                                            'label' => 'seeking_for',
                                            'rules' => 'required'
                                         )
                                    )                          
               );