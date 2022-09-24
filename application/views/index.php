<?php $this->load->view('header'); ?>

<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                List view of All Users
            </div>
            <div class="card-body">
                <h5 class="card-title"> </h5>
                <a href="<?php echo base_url(); ?>create" class="btn btn-primary btn-lg center" role="button" aria-pressed="true">Add User</a>
                <br>
                <br>

                <div class="row mb-3">
                    <div class="col">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAME</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $indianStates = [
                                    'AR' => 'Arunachal Pradesh',
                                    'AR' => 'Arunachal Pradesh',
                                    'AS' => 'Assam',
                                    'BR' => 'Bihar',
                                    'CT' => 'Chhattisgarh',
                                    'GA' => 'Goa',
                                    'GJ' => 'Gujarat',
                                    'HR' => 'Haryana',
                                    'HP' => 'Himachal Pradesh',
                                    'JK' => 'Jammu and Kashmir',
                                    'JH' => 'Jharkhand',
                                    'KA' => 'Karnataka',
                                    'KL' => 'Kerala',
                                    'MP' => 'Madhya Pradesh',
                                    'MH' => 'Maharashtra',
                                    'MN' => 'Manipur',
                                    'ML' => 'Meghalaya',
                                    'MZ' => 'Mizoram',
                                    'NL' => 'Nagaland',
                                    'OR' => 'Odisha',
                                    'PB' => 'Punjab',
                                    'RJ' => 'Rajasthan',
                                    'SK' => 'Sikkim',
                                    'TN' => 'Tamil Nadu',
                                    'TG' => 'Telangana',
                                    'TR' => 'Tripura',
                                    'UP' => 'Uttar Pradesh',
                                    'UT' => 'Uttarakhand',
                                    'WB' => 'West Bengal',
                                    'AN' => 'Andaman and Nicobar Islands',
                                    'CH' => 'Chandigarh',
                                    'DN' => 'Dadra and Nagar Haveli',
                                    'DD' => 'Daman and Diu',
                                    'LD' => 'Lakshadweep',
                                    'DL' => 'National Capital Territory of Delhi',
                                    'PY' => 'Puducherry'
                                ];
                                if (!empty($all_users)) {
                                    foreach ($all_users as $key => $val) {
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $val['fname'] . ' ' . $val['lname']; ?></th>
                                            <td><?php echo $val['email']; ?></td>
                                            <td><?php echo $val['mobile']; ?></td>
                                            <td><?php echo $val['gender']; ?></td>
                                            <?php
                                            foreach ($indianStates as $key => $value) {
                                                if ($val['state'] == $key) {
                                            ?>
                                        <td> <?php echo $value; ?></td>
                                    <?php
                                                
                                                } ?>

                                <?php
                                            } ?>
                                <td><?php echo $val['created_at']; ?></td>
                                <td><?php echo $val['updated_at']; ?></td>
                                <td><a href="<?php echo base_url(); ?>welcome/edit/<?php echo $val['id']; ?>">Edit</a> <a href="<?php echo base_url(); ?>welcome/delete/<?php echo  $val['id']; ?>">Delete</a></td>
                                </tr>

                                



                            <?php
                                    }
                                } else {
                            ?>
                            <tr>
                                <th scope="row" style="text-align: center;" colspan="7"> Recortds not found </th>
                            </tr>


                        <?php

                                }
                        ?>


                            </tbody>
                        </table>
                    </div>
                </div>

                <?php $this->load->view('footer'); ?>