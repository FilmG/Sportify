<head>
    <!--Google reCaptcha v2.0 -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<style>
    /* recaptcha CENTER on DIV - STart */
    .text-xs-center {
        text-align: center;
    }
     .g-recaptcha {
        display: inline-block;
    }
    /* recaptcha CENTER on DIV - ENd */

    /* Remove ung arrow sa input type number Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
    }

    /* Start of Multi-Form */
        /* Hide all steps by default: */
        .cedtab2 {
            display: none;
        }
        
        button {
            background-color: #008080;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
        opacity: 0.8;
        }

        #prevBtn {
        background-color: #7393B3;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;  
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
            background-color: #0047AB;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #0818A8;
        }    
    /* End of Multi-Form */
    
</style>
<!--
approved value = <?= $approved_value; ?><br>
approval_remarks = <?= $approval_remarks; ?><br>
-->

<div class="card-title col text-center">Approval of Permit to Conduct Student Activities</div>

<!-- START FORMS || EVENT REQUEST -->  
<form method="post" id="submit_event_request_approval_data" name="submit_event_request_approval_data"">

    <div class="cedtab2"> <!--tab 1 -->
        <div class="card">
            <div class="card-body">
                
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">LEVEL of References</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_level" maxlength="100" placeholder="" value="<?= $event_level_ref; ?>" >
                    </div>
                </div>
                <br>

                <span><b>ACTIVITY Major Details</b></span><br><br>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Department</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_dept" maxlength="100" placeholder="" value="<?= $event_dept; ?>" >
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Title</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_activity_title"  maxlength="100" placeholder="" value="<?= $event_acty_title; ?>">
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Theme</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_activity_theme" maxlength="100" placeholder="" value="<?= $event_acty_theme; ?>">
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Objective</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_activity_obj"  maxlength="100" placeholder="" value="<?= $event_acty_obj; ?>">
                       
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Nature of Activity</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_nature_activity"  maxlength="100" placeholder="" value="<?= $event_nature_acty; ?>">
                    </div>
                </div>

                <br>
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        
                        <div class="form-check form-check-inline">
                            <div class="md-6">
                                <label for="inputText">Date of Event</label>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12">
                                <label for="inputText">From</label>
                                <input type="text" class="form-control" id="event_approval_date_from"  placeholder="" value="<?= $event_date_from_text; ?>" >
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12">
                                <label for="inputText">To</label>
                                <input type="text" class="form-control" id="event_approval_date_to"  placeholder="" value="<?= $event_date_to_text; ?>" >
                                
                            </div> 
                        </div>
                        
                    </div>
                </div>        
                    
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">

                        <div class="form-check form-check-inline">
                            <div class="md-6">
                                <label for="inputText">No. Days&emsp;&emsp;</label>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12">
                            <input type="text" class="form-control" id="event_approval_noOfDays"  maxlength="100" placeholder="" value="<?= $event_no_days; ?>" >
                            </div>   
                        </div>

                    </div>
                </div>

                <br>
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        
                        <div class="form-check form-check-inline">
                            <div class="md-6 ">
                                <label for="inputText">Time of Event</label>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12 ">
                                <label for="inputText">From</label>
                                <input type="text" class="form-control" id="event_approval_time_from"  placeholder="" value="<?= $event_time_from_text; ?>" >
                                
                            </div>   
                        </div>

                        <div class="form-check form-check-inline">
                            <div class="col-md-12 ">
                                <label for="inputText">To</label>
                                <input type="text" class="form-control" id="event_approval_time_to"  placeholder="" value="<?= $event_time_to_text; ?>" >
                            </div> 
                        </div>
                        
                    </div>
                </div>

                <br>
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Venue of Activity</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_venue_actvty"  maxlength="100" placeholder="" value="<?= $event_venue_acty; ?>">
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Target Participant</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_actvty_target_participant"  maxlength="100" placeholder="" value="<?= $event_participant; ?>" >
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity In-Charge</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_approval_actvty_in_charge"  maxlength="100" placeholder="" value="<?= $event_in_charge; ?>">
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Contact#</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="event_approval_actvty_contact" maxlength="30" placeholder="" value="<?= $event_contact_num; ?>" >
                    </div>
                </div>


            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 1 -->

    <!--SPACES --> 

    <div class="cedtab2"> <!--tab 2 -->
        <div class="card">
            <div class="card-body">
                <span><b>SUPPORT Details</b></span><br><br>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Guest Speaker (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_speaker" maxlength="100" placeholder="" value="<?= $event_actvty_speaker; ?>" >
                        
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Company Prospect (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_company_prospect" maxlength="100" placeholder="" value="<?= $event_actvty_company_prospect; ?>" >
                        
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Reference Person from Company (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_company_person" maxlength="100" placeholder="" value="<?= $event_actvty_company_person; ?>">
                        
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Contact Number (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="event_request_actvty_company_person_contact" maxlength="30" placeholder="" value="<?= $event_actvty_company_person_contact; ?>">
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">With Invitation Letter attached</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_company_person_contact" maxlength="30" placeholder="" value="<?= $event_support_letter; ?>">
                    </div>
                </div>

                <?php
                    if($event_support_letter_attach != "") {
                ?>
                <br>
                <div class="form-row">
                   <img class="img-thumbnail rounded mx-auto d-block" src="<?= base_url(); ?>/public/images/letter_attach/<?= $event_support_letter_attach; ?>" class="rounded img-thumbnail"  alt="Letter Attach">
                </div>
                <?php
                    }
                ?>

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div> <!--End Tab 2 -->

    <!--SPACES --> 

    <div class="cedtab2"> <!--tab 3 -->
        <div class="card">
            <div class="card-body">
                <span><b>ACTIVITY Funding/Collection</b></span><br><br>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">With Activity Fee Collection</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="event_request_actvty_company_person_contactx" maxlength="30" placeholder="" value="<?= $event_request_with_fee; ?>" >
                    </div>
                </div>

                <br><br>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <?php
                                if($event_wfee_student_funded == "Yes") {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_student_fundedx" value="option1" checked>
                            <?php
                                } else {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_student_fundedx" value="option1">
                            <?php
                                }
                            ?>
                            <label class="form-check-label" for="inlineCheckbox1">Student Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" id="event_request_wfee_student_funded_amountx" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_student_funded_amount; ?>"   >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_student_funded_remarksx"  maxlength="100" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_student_funded_remarks; ?>"  >
                        </div>
                    </div><!--End form-row --> 

                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <?php
                                if($event_wfee_school_funded == "Yes") {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_school_fundedx"  value="option1" checked>
                            <?php
                                } else {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_school_fundedx"  value="option1">
                            <?php
                                }
                            ?>
                            <label class="form-check-label" for="inlineCheckbox1">School Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                        <input type="number" step="any" id="event_request_wfee_school_funded_amountx"  class="form-control class_activity_funding_inputs" value="<?= $event_wfee_school_funded_amount; ?>" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                        <input type="text" id="event_request_wfee_school_funded_remarksx"  maxlength="100" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_school_funded_remarks; ?>" >
                        </div>
                    </div><!--End form-row --> 
    
                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <?php
                                if($event_wfee_org_funded == "Yes") {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_org_fundedx"  value="option1" checked>
                            <?php
                                } else {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_org_fundedx"  value="option1">
                            <?php
                                }
                            ?>
                            <label class="form-check-label" for="inlineCheckbox1">Organization Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" id="event_request_wfee_org_funded_amount" name="event_request_wfee_org_funded_amount" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_org_funded_amount; ?>"  >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_org_funded_remarks" name="event_request_wfee_org_funded_remarks" maxlength="100" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_org_funded_remarks; ?>"  >
                        </div>
                    </div><!--End form-row --> 

                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <?php
                                if($event_wfee_ext_funded == "Yes") {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_ext_fundedx"  value="option1" checked>
                            <?php
                                } else {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_ext_fundedx"  value="option1">
                            <?php
                                }
                            ?>
                            
                            <label class="form-check-label" for="inlineCheckbox1">External Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any"  id="event_request_wfee_ext_funded_amount" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_ext_funded_amount; ?>" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_ext_funded_remarksx" maxlength="100"  class="form-control class_activity_funding_inputs" value="<?= $event_wfee_ext_funded_remarks; ?>" >
                        </div>
                    </div><!--End form-row --> 

                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <?php
                                if($event_wfee_fund_raising == "Yes") {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_fund_raisingx"  value="option1" checked>
                            <?php
                                } else {
                            ?>
                                    <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_fund_raisingx"  value="option1">
                            <?php
                                }
                            ?>
                            <label class="form-check-label" for="inlineCheckbox1">Fund-Raising</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" id="event_request_wfee_fund_raising_amountx"  class="form-control class_activity_funding_inputs" value="<?= $event_wfee_fund_raising_amount; ?>" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_fund_raising_remarksx"  maxlength="100" class="form-control class_activity_funding_inputs" value="<?= $event_wfee_fund_raising_remarks; ?>" >
                        </div>
                    </div><!--End form-row --> 
                
            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 3 -->

    <!--SPACES --> 

    <div class="cedtab2"> <!--tab 4 -->
        <div class="card">
            <div class="card-body">
                <span><b>MODE of Transportation</b></span><br><br>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">With Transportation Need</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="adio_event_request_with_transpox" maxlength="30" placeholder="" value="<?= $event_request_with_fee; ?>" >
                    </div>
                </div>

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <?php
                            if($event_transpo_personal == "Yes") {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_personalx" value="option1" checked>
                        <?php
                            } else {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_personalx" value="option1">
                        <?php
                            }
                        ?>
                        <label class="form-check-label" for="inlineCheckbox1">Personnel Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_personal_detailsx"  maxlength="100" class="form-control class_activity_transpo_inputs" value="<?= $event_transpo_personal_details; ?>" >
                    </div>
                </div><!--End form-row --> 

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <?php
                            if($event_transpo_private == "Yes") {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_privatex"  value="option1" checked>
                        <?php
                            } else {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_privatex"  value="option1">
                        <?php
                            }
                        ?>
                        <label class="form-check-label" for="inlineCheckbox1">Private Rented Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_private_detailsx"  maxlength="100" class="form-control class_activity_transpo_inputs" value="<?= $event_transpo_private_details; ?>" >
                    </div>
                </div><!--End form-row --> 

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <?php
                            if($event_transpo_school == "Yes") {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_schoolx"  value="option1" checked>
                        <?php
                            } else {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_schoolx"  value="option1">
                        <?php
                            }
                        ?>
                        <label class="form-check-label" for="inlineCheckbox1">School Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_school_detailsx" maxlength="100" class="form-control class_activity_transpo_inputs" value="<?= $event_transpo_school_details; ?>" >
                    </div>
                </div><!--End form-row --> 

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <?php
                            if($event_transpo_solicited == "Yes") {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_solicitedx" value="option1" checked>
                        <?php
                            } else {
                        ?>
                                <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_solicitedx" value="option1">
                        <?php
                            }
                        ?>
                        <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_solicitedx" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Solicited Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_solicited_detailsx"  maxlength="100" class="form-control class_activity_transpo_inputs" value="<?= $event_transpo_solicited_details; ?>" >
                    </div>
                </div><!--End form-row --> 

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 4 -->

    <!--SPACES --> 

    <div class="cedtab2"> <!--tab 5 -->
        <div class="card">
            <div class="card-body">

                <span><b>INSIDE Request and Reservation</b></span><br><br>

                <div class="row"> <!-- Start of Class=row 1 -->

                    <!-- Left side columns -->
                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Venue Request</label>
                            <input type="text" id="event_request_person_venue_requestx"  maxlength="100" class="form-control" value="<?= $event_person_venue_request; ?>" >
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Service Vehicle</label>
                            <input type="text" id="event_request_person_service_vehiclex"  maxlength="100" class="form-control" value="<?= $event_person_service_vehicle; ?>" >
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Facility and Equipment</label>
                            <input type="text" id="event_request_person_facequipx"  maxlength="100" class="form-control" value="<?= $event_person_facequip; ?>" >
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Activity In-Charge</label>
                            <input type="text" id="event_request_person_inchargex" maxlength="100" class="form-control" value="<?= $event_person_incharge; ?>" >
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                </div><!-- End of Class=row 1 -->

                <?php
                    if($event_inside_attach != "") {
                ?>
                <br>
                <div class="form-row">
                   <img class="img-thumbnail rounded mx-auto d-block" src="<?= base_url(); ?>/public/images/letter_attach/<?= $event_inside_attach; ?>" class="rounded img-thumbnail"  alt="PSMO Attach">
                </div>
                <?php
                    }
                ?>
    
            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 5 -->

    <!--SPACES --> 

    <!--SPACES --> 

    <div class="cedtab2"> <!--tab Last -->
        <div class="card">
            <div class="card-body">
                <?php
                switch ($role_sign_as) {
                    case "Course Adviser":
                        $approval_remarks = $course_adviser_remarks;
                      break;
                    case "Course Coordinator":
                        $approval_remarks = $course_coordinator_remarks;
                      break;
                    case "PSMO":
                        $approval_remarks = $psmo_remarks;
                      break;
                    case "Academic Coordinator":
                        $approval_remarks = $acad_coordinator_remarks;
                      break;
                    case "OSA Coordinator":
                        $approval_remarks = $osa_remarks;
                        break;
                    case "Campus Manager":
                        $approval_remarks = $campus_manager_remarks;
                        break;
                    case "Director for Academic":
                        $approval_remarks = $dir_acad_remarks;
                        break;
                    case "Director for Administration":
                        $approval_remarks = $dir_admin_remarks;
                        break;
                    case "President":
                        $approval_remarks = $pres_remarks;
                        break;
                  }

                if($approved_value == 1) {
                ?>
                        <span><b>Approval of Event Request by <?= $role_sign_as; ?></b></span><br><br>

                        <div class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <label for="LabelSample" class="col-form-label"><?= $role_sign_as; ?> Approval<font color="red"><i>*</i></font></label>
                            </div>
                            <div class="col-md-9">
                                <select id="event_request_approval" name="event_request_approval" class="custom-select mr-sm-2">
                                    <option value="Approved">Approved</option>
                                    <option value="Pending Approval">Pending Approval</option>
                                    <option value="Reject">Reject</option>
                                </select>
                                <small id="event_request_approval_error" class="input_error_color"></small>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <label for="LabelSample" class="col-form-label"><?= $role_sign_as; ?> Remarks<font color="red"><i>*</i></font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="event_request_approval_remarks" name="event_request_approval_remarks" maxlength="100" class="form-control"  >
                            </div>
                        </div>

                        <br><br>
                        <div id="div_captcha" class=""> <!--class="text-xs-center" -->
                            <!--google reCaptha v2 -->
                            <!--
                            <div class="g-recaptcha" data-sitekey="6LfBeFIdAAAAAKz9ZcOu2twO7AuDwS46_Cuuqg3G" ></div>
                            -->
                        </div>
                        <br>

                        <!-- Hidden Modal Variable -->
                        <input type="hidden" name="eventrequest_approval_apps_userid" id="eventrequest_approval_apps_userid"  />
                        <input type="hidden" name="eventrequest_approval_apps_user_fullname" id="eventrequest_approval_apps_user_fullname" value="<?= $apps_username; ?>" />
                        <input type="hidden" name="eventrequest_approval_apps_user_deptid" id="eventrequest_approval_apps_user_deptid"   />

                        <input type="hidden" name="eventrequest_recid" id="eventrequest_recid" value="<?= $recid_event_request; ?>"  />
                        <input type="hidden" name="eventrequest_role_sign_as" id="eventrequest_role_sign_as" value="<?= $role_sign_as; ?>"  />

                        <div class="col text-center">
                            <button type="submit" id="btn_eventrequest_approval_save" class="btn btn-primary">
                                <i class="eventrequest_approval-loading-icon fa fa-paper-plane"></i>
                                <span class="eventrequest_approval-btn-text">Submit Approval</span>
                            </button>
                            
                            <!--Progress bar -->
                            <div class="container-fluid">
                                <div id="display_progressbar_eventrequest_approval" class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" id="progressbar_eventrequest_approval" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                            </div>
                            <br>   
                        </div>
                <?php
                    } else if($approved_value == 2) {
                ?>
                        <span class="text-center"><b>Event Request is Approved by <?= $role_sign_as; ?></b></span><br><br>
                        <span class="text-center"><b>Remarks : <?= $approval_remarks; ?></b></span><br><br>
                <?php
                    } else if($approved_value == 3) {

                ?>
                        <span class="text-center"><b>Event Request is Rejected by <?= $role_sign_as; ?></b></span><br><br>
                        <span class="text-center"><b>Remarks : <?= $approval_remarks; ?></b></span><br><br>
                <?php
                    }
                ?>

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab Last -->

    <!-- SPACES -->

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span><!-- Tab 1 -->
        <span class="step"></span><!-- Tab 2 -->
        <span class="step"></span><!-- Tab 3 -->
        <span class="step"></span><!-- Tab 4 -->
        <span class="step"></span><!-- Tab 5 -->
        <span class="step"></span><!-- Tab Last -->
    </div>

    <div style="overflow:auto;">
        <div style="float:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
    

</form>
<!-- END FORMS || EVENT REQUEST -->  

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    
    //============================================================================

    //Progress bar | 
    $("#display_progressbar_eventrequest_approval").hide();

    //===========================================================================
    //START MULTI-FORM
    //===========================================================================
    var ctrko = 0;
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        ctrko = n;
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("cedtab2");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            //document.getElementById("nextBtn").innerHTML = "Submit";
            document.getElementById("nextBtn").style.display = "none";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
            document.getElementById("nextBtn").style.display = "inline";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }//end of function

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("cedtab2");
        
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false; //ito sa input validation checking
        
        // Hide the current tab:
        x[currentTab].style.display = "none";

        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;

        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            //document.getElementById("submit_event_request_data").submit();
            return false;
        }

        // Otherwise, display the correct tab:
        showTab(currentTab);
    }//end of function

    function validateForm() {
        var valid = true;

        
        return valid;
    }//end of function

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    } //end of function
    //===========================================================================
    //END MULTI-FORM
    //===========================================================================

    //=============================================================================
    // SPACES
    //=============================================================================

    $(document).ready(function(){ 

    });//end of document ready function
    //========================================================

    //Submitting Form Data | EVENT REQUEST APPROVAL - Start
    $('#submit_event_request_approval_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_eventrequest_approval").show();
            var base_path = base_url + "/Employee/submit_event_request_approval_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_eventrequest_approval').html(percentComplete + '%');
                    $('#progressbar_eventrequest_approval').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_eventrequest_approval_save").disabled = true;
                    $(".eventrequest_approval-loading-icon").removeClass('fa fa-paper-plane');
                    $(".eventrequest_approval-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".eventrequest_approval-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_eventrequest_approval_save").disabled = false;
                            $(".eventrequest_approval-loading-icon").removeClass('spinner-border text-warning');
                            $(".eventrequest_approval-loading-icon").addClass('fa fa-paper-plane');
                            $(".eventrequest_approval-btn-text").text("Submit Approval");

                            //alert(data.qrcode);
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_eventrequest_approval').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_eventrequest_approval").hide();

                                            //Update DataTable
                                            $('#table_event_request_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_eventrequest_approval_save").disabled = true;

                                            if(data.role_sign_as == "Course Adviser") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_course_adviser"); 
                                            }
                                            if(data.role_sign_as == "Course Coordinator") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_course_coordinator"); 
                                            }
                                            if(data.role_sign_as == "PSMO") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_psmo"); 
                                            }
                                            if(data.role_sign_as == "Academic Coordinator") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_academic_coordinator"); 
                                            }
                                            if(data.role_sign_as == "OSA Coordinator") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_osa_coordinator"); 
                                            }
                                            if(data.role_sign_as == "Campus Manager") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_campus_manager"); 
                                            }
                                            if(data.role_sign_as == "Director for Academic") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_dir_academic"); 
                                            }
                                            if(data.role_sign_as == "Director for Administration") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_dir_administration"); 
                                            }
                                            if(data.role_sign_as == "President") {
                                                //Load List of Event Approval
                                                $("#main_content").load(base_url+"/Sidebar_menu/event_approval_president"); 
                                            }

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_eventrequest_approval').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_eventrequest_approval").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                                //Load List of Event Request Form
                                $("#main_content").load(base_url+"/Sidebar_menu/event_request"); 
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | EVENT REQUEST APPROVAL - End


    //====================================================================================================
    //SPACER=>
    //====================================================================================================

</script>