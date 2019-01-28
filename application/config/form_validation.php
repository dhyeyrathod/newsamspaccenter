<?php 

$config = array(
                 'signup' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'Username',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => 'Password Confirmation',
                                            'rules' => 'required|matches[password]'
                                         ),
                                    array(
                                            'field' => 'contact',
                                            'label' => 'Contact',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|is_unique[members.email]|valid_email'
                                         )
                                    ),
                 'email' => array(
                                    array(
                                            'field' => 'emailaddress',
                                            'label' => 'EmailAddress',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'required|alpha'
                                         ),
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'MessageBody',
                                            'rules' => 'required'
                                         )
                                    ),
            'spa_profile' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'contact_number',
                                            'label' => 'Contact Number',
                                            'rules' => 'required|numeric'
                                         ),
                                    array(
                                            'field' => 'email_id',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'country_id',
                                            'label' => 'Country',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'city_id',
                                            'label' => 'City',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'area_id',
                                            'label' => 'Area',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'address',
                                            'label' => 'Address',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'pincode',
                                            'label' => 'Pincode',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'google_map_url',
                                            'label' => 'Google Map Url',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'category_id',
                                            'label' => 'Category',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'services_id',
                                            'label' => 'Services',
                                            'rules' => 'required|integer'
                                         ),
                                    array(
                                            'field' => 'payment_type_name',
                                            'label' => 'Payment Type',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required'
                                         )
                                    )                                   
               );