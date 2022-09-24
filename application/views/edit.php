<?php $this->load->view('header'); ?>
<div class="container mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Edit User Data
            </div>
            <div class="card-body">
                <h5 class="card-title">Fill Form</h5>

                <form id="form1">
                    <div class="row mb-3">

                        <div class="col">
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $edit_user[0]['fname']; ?>" aria-label="First name">
                            <input type="hidden" id="userid" name="userid" value="<?php echo $edit_user[0]['id']; ?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" aria-label="Last name" value="<?php echo $edit_user[0]['lname']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email address" id="email" name="email" value="<?php echo $edit_user[0]['email']; ?>" aria-label="Email address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mobile number" id="mobile" value="<?php echo $edit_user[0]['mobile']; ?>" name="mobile" aria-label="Mobile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2">
                            <label>Gender</label>
                        </div>
                        <div class="col">
                            <?php
                            $male = "";
                            if ($edit_user[0]['mobile'] == 'Male') {
                                $male = "checked";
                            } else {
                                $male = "";
                            }
                            ?>
                            <input type="radio" class="form-check-input" name="gender" <?php echo $male; ?> id="gender_Male" value="Male" />
                            <label class="form-check-label">Male</label>
                        </div>

                        <?php
                        $female = "";
                        if ($edit_user[0]['gender'] == 'Female') {
                            $female = "checked";
                        } else {
                            $female = "";
                        }
                        ?>
                        <div class="col">
                            <input type="radio" class="form-check-input" <?php echo $female; ?> name="gender" id="gender_Female" value="Female" />
                            <label class="form-check-label">Female</label>
                        </div>

                        <div class="col">
                            <input type="radio" class="form-check-input" name="gender" id="gender_other" value="Other" />
                            <label class="form-check-label">Other</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
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
                            ?>
                            <select class="form-select" id="state" aria-label="Default select example" name="statu">
                                <option value="0">select state</option>
                                <?php
                                foreach ($indianStates as $key => $value) {
                                    if ($edit_user[0]['state'] == $key) { ?>
                                        <option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
                                    <?php
                                    }else{
                                        ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php
                                    }
                                    ?>
                                    
                                <?php

                                }
                                ?>


                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col text-center">
                            <button type='submit' class="btn btn-primary" id="submit_btn">Update</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>

</div>

</div>
<?php $this->load->view('footer'); ?>
<script text="text/javascript">
    $('#submit_btn').on('click', function(event) {

        event.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var gender = $("input[name='gender']:checked").val();
        var state = $("#state").val();
        var reg = RegExp("^[0-9]{10}$");


        if (fname == "" || fname == null) {
            alert("Enter First Name");
            $("#fname").focus();
            return false;
        }
        if (lname == "" || lname == null) {
            alert("Enter Last Name");
            $("#lname").focus();
            return false;
        }
        if (email == "" || email == null) {
            alert("Enter Email Name");
            $("#email").focus();
            return false;
        }
        if (!mobile.match(reg)) {
            alert("Enter Mobile Name");
            $("#mobile").focus();
            return false;
        }
        if (!$("input[name='gender']:checked").val()) {
            alert('Nothing is checked!');
            return false;
        }
        if (state == 0) {
            alert("please Select State");
            $("#state").focus();
            return false;
        }
        $.ajax({
            url: '<?php echo base_url('welcome/update_data'); ?>',
            method: 'POST',
            data: $('#form1').serialize(),
            beforeSend: function() {

            },
            success: function(data) {

                var res = JSON.parse(data);
                if (res.status == 0) {
                    alert(res.msg);
                }
                if (res.status == 1) {
                    alert(res.msg);
                    window.location.href = '<?php echo base_url(); ?>';

                }


            }
        });





    });
</script>