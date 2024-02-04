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
        .cedtab {
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

<div class="card-title col text-center">Permit to Conduct Student Activities</div>

<!-- START FORMS || EVENT REQUEST -->  
<form method="post" id="submit_event_request_data" name="submit_event_request_data">

    <div class="cedtab"><!--tab 1 -->
        <div class="card">
            <div class="card-body">
                <span><b>LEVEL References</b></span><br><br>

                <!--Start form checkbox inline -->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l1a" name="event_request_radio-level" value="LEVEL 1A - (Subject Releted Activities) In-Classroom">
                        <label class="form-check-label" for="flexRadioDefault1">LEVEL 1A - (Subject Releted Activities) In-Classroom</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l1b" name="event_request_radio-level" value="LEVEL 1B - (Subject Releted Activities) Out-Classroom">
                        <label class="form-check-label" for="flexRadioDefault2">LEVEL 1B - (Subject Releted Activities) Out-Classroom</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l1c" name="event_request_radio-level" value="LEVEL 1C - (Subject Releted Activities) Out-Campus">
                        <label class="form-check-label" for="flexRadioDefault3">LEVEL 1C - (Subject Releted Activities) Out-Campus</label>
                    </div>
                    <br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l2a" name="event_request_radio-level" value="LEVEL 2A - (Dept./Org.  Activities) In-Campus">
                        <label class="form-check-label" for="flexRadioDefault4">LEVEL 2A - (Dept./Org.  Activities) In-Campus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l2b" name="event_request_radio-level" value="LEVEL 2B - (Dept./Org.  Activities) Out-Campus">
                        <label class="form-check-label" for="flexRadioDefault5">LEVEL 2B - (Dept./Org.  Activities) Out-Campus</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l3a" name="event_request_radio-level" value="LEVEL 3A - (Instituional  Activities) In-Campus">
                        <label class="form-check-label" for="flexRadioDefault6">LEVEL 3A - (Instituional  Activities) In-Campus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="event_request_l3b" name="event_request_radio-level" value="LEVEL 3B - (Instituional  Activities) Out-Campus">
                        <label class="form-check-label" for="flexRadioDefault7">LEVEL 3B - (Instituional  Activities) Out-Campus</label>
                    </div>
                <!--End form checkbox inline -->
                
            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div> <!--End Tab 1 -->

    <!--SPACES --> 

    <div class="cedtab"> <!--tab 2 -->
        <div class="card">
            <div class="card-body">
                <span><b>ACTIVITY Major Details</b></span><br><br>

                <small>NOTE: Fields with asterisk are required</small>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Department</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_dept" name="event_request_dept" maxlength="100" placeholder="" readonly>
                        <small id="event_request_dept_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Title<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_activity_title" name="event_request_activity_title" maxlength="100" placeholder="">
                        <small id="event_request_activity_title_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Theme<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_activity_theme" name="event_request_activity_theme" maxlength="100" placeholder="">
                        <small id="event_request_activity_theme_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Objective<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_activity_obj" name="event_request_activity_obj" maxlength="100" placeholder="">
                        <small id="event_request_activity_obj_error" class="input_error_color"></small>
                    </div>
                </div>


                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Nature of Activity<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <select id="event_request_nature_activity" name="event_request_nature_activity" class="custom-select mr-sm-2">
                            <option selected>Choose...</option>
                            <option value="Academic">Academic</option>
                            <option value="Non-academic">Non-academic</option>
                            <option value="Organization/Club">Organization/Club</option>
                        </select>
                        <small id="event_request_nature_activity_error" class="input_error_color"></small>
                    </div>
                </div>

                <br>
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        <!--Start form checkbox inline -->
                        <div class="form-check form-check-inline">
                            <div class="md-6 ">
                                <label for="inputText">Date of Event</label>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12 ">
                                <label for="inputText">From<font color="red"><i>*</i></font></label>
                                <input type="date" class="form-control" id="event_request_date_from" name="event_request_date_from" placeholder="">
                                <small id="event_request_date_from_error" class="input_error_color"></small>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12 ">
                                <label for="inputText">To<font color="red"><i>*</i></font></label>
                                <input type="date" class="form-control" id="event_request_date_to" name="event_request_date_to" placeholder="">
                                <small id="event_request_date_to_error" class="input_error_color"></small>
                            </div> 
                        </div>
                        <div class="form-check form-check-inline">
                            
                            <div class="col-md-12 ">
                                <label for="inputText">No. Days</label>
                                <input type="number" class="form-control" id="event_request_noOfDays" name="event_request_noOfDays" placeholder="" readonly>
                                <small id="event_request_noOfDays_error" class="input_error_color"></small>
                            </div> 
                        </div>
                        <!--End form checkbox inline -->
                    </div>
                </div>

                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        <!--Start form checkbox inline -->
                        <div class="form-check form-check-inline">
                            <div class="md-6 ">
                                <label for="inputText">Time of Event</label>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12 ">
                                <label for="inputText">From<font color="red"><i>*</i></font></label>
                                <input type="time" class="form-control" id="event_request_time_from" name="event_request_time_from" placeholder="">
                                <small id="event_request_time_from_error" class="input_error_color"></small>
                            </div>   
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="col-md-12 ">
                                <label for="inputText">To<font color="red"><i>*</i></font></label>
                                <input type="time" class="form-control" id="event_request_time_to" name="event_request_time_to" placeholder="">
                                <small id="event_request_time_to_error" class="input_error_color"></small>
                            </div> 
                        </div>
                        <!--End form checkbox inline -->
                    </div>
                </div>

                <br>
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Venue of Activity<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_venue_actvty" name="event_request_venue_actvty" maxlength="100" placeholder="">
                        <small id="event_request_venue_actvty_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity Target Participant<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_target_participant" name="event_request_actvty_target_participant" maxlength="100" placeholder="">
                        <small id="event_request_actvty_target_participant_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Activity In-Charge<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_in_charge" name="event_request_actvty_in_charge" maxlength="100" placeholder="">
                        <small id="event_request_actvty_in_charge_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Contact#<font color="red"><i>*</i></font></label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="event_request_actvty_contact" name="event_request_actvty_contact" maxlength="30" placeholder="">
                        <small id="event_request_actvty_contact_error" class="input_error_color"></small>
                    </div>
                </div>

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 2 -->

    <!--SPACES --> 

    <div class="cedtab"> <!--tab 3 -->
        <div class="card">
            <div class="card-body">
                <table style="width:100%">
                    <tr>
                        <td style="width:70%; text-align:left"><span><b>SUPPORT Details</b></span></td>
                        <td style="text-align:right">
                               <!--Start - Attach File -->
                        </td>
                    </tr>
                </table>
            
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Guest Speaker (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_speaker" name="event_request_actvty_speaker" maxlength="100" placeholder="">
                        <small id="event_request_actvty_contact_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Company Prospect (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_company_prospect" name="event_request_actvty_company_prospect" maxlength="100" placeholder="">
                        <small id="event_request_actvty_company_prospect_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Reference Person from Company (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event_request_actvty_company_person" name="event_request_actvty_company_person" maxlength="100" placeholder="">
                        <small id="event_request_actvty_company_person_error" class="input_error_color"></small>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="LabelSample" class="col-form-label">Contact Number (if any)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="event_request_actvty_company_person_contact" name="event_request_actvty_company_person_contact" maxlength="30" placeholder="">
                        <small id="event_request_actvty_company_person_contact_error" class="input_error_color"></small>
                    </div>
                </div>

                <p>
                <!--Start form checkbox inline -->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="event_request_support_letter_with" name="event_request_support_letter" value="With Invitation Letter Attached">
                    <label class="form-check-label" for="inlineCheckbox1">With Invitation Letter Attached</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="event_request_support_letter_without" name="event_request_support_letter" value="Without Invitation Letter Attached" checked>
                    <label class="form-check-label" for="inlineCheckbox2">Without Invitation Letter Attached</label>
                </div>
                </p>
                <!--End form checkbox inline -->

                <!--Start - Attach File -->
                <br>
                <div id="div_upload_request_letter2" class="form-row">
                    <input type="file" id="file-request_letter" name="file-request_letter" accept="image/*" onchange="showPreview_request_letter(event);">
                    <br>
                    <div class="preview_request_letter">
                        <img class="img-thumbnail" id="file-preview-request_letter" >
                    </div>
                </div>
                <!--End - Attach File -->

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div> <!--End Tab 3 -->

    <!--SPACES --> 

    <div class="cedtab"> <!--tab 4 -->
        <div class="card">
            <div class="card-body">
                <span><b>ACTIVITY Funding/Collection</b></span><br><br>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="radio_event_request_with_fee" name="radio_event_request_fee" value="With Activity Fee Collection">
                    <label class="form-check-label" for="inlineCheckbox1">With Activity Fee Collection</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="radio_event_request_without_fee" name="radio_event_request_fee" value="Without Activity Fee Collection" checked>
                    <label class="form-check-label" for="inlineCheckbox1">Without Activity Fee Collection</label>
                </div>

                <br><br>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_student_funded" name="event_request_wfee_student_funded" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Student Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" value="0.00" id="event_request_wfee_student_funded_amount" name="event_request_wfee_student_funded_amount" class="form-control class_activity_funding_inputs"  >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_student_funded_remarks" name="event_request_wfee_student_funded_remarks" maxlength="100" class="form-control class_activity_funding_inputs" >
                        </div>
                    </div><!--End form-row --> 

                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_school_funded" name="event_request_wfee_school_funded" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">School Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                        <input type="number" step="any" value="0.00" id="event_request_wfee_school_funded_amount" name="event_request_wfee_school_funded_amount" class="form-control class_activity_funding_inputs" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                        <input type="text" id="event_request_wfee_school_funded_remarks" name="event_request_wfee_school_funded_remarks" maxlength="100" class="form-control class_activity_funding_inputs" >
                        </div>
                    </div><!--End form-row --> 
    
                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_org_funded" name="event_request_wfee_org_funded" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Organization Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" value="0.00" id="event_request_wfee_org_funded_amount" name="event_request_wfee_org_funded_amount" class="form-control class_activity_funding_inputs" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_org_funded_remarks" name="event_request_wfee_org_funded_remarks" maxlength="100" class="form-control class_activity_funding_inputs" >
                        </div>
                    </div><!--End form-row --> 

                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_ext_funded" name="event_request_wfee_ext_funded" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">External Funded</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" value="0.00" id="event_request_wfee_ext_funded_amount" name="event_request_wfee_ext_funded_amount" class="form-control class_activity_funding_inputs" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_ext_funded_remarks" name="event_request_wfee_ext_funded_remarks"maxlength="100"  class="form-control class_activity_funding_inputs" >
                        </div>
                    </div><!--End form-row --> 

                    <p></p>
                    <div class="form-row ">
                        <div class="form-check form-check-inline">
                            &emsp;&emsp;
                            <input class="form-check-input class_activity_funding_inputs" type="checkbox" id="event_request_wfee_fund_raising" name="event_request_wfee_fund_raising" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Fund-Raising</label>
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">PHP</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" value="0.00" id="event_request_wfee_fund_raising_amount" name="event_request_wfee_fund_raising_amount" class="form-control class_activity_funding_inputs" >
                        </div>

                        <div class="col-auto">
                            &emsp;&emsp;
                            <label for="TextLable" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="event_request_wfee_fund_raising_remarks" name="event_request_wfee_fund_raising_remarks" maxlength="100" class="form-control class_activity_funding_inputs" >
                        </div>
                    </div><!--End form-row --> 
                

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 4 -->

    <!--SPACES --> 

    <div class="cedtab"> <!--tab 5 -->
        <div class="card">
            <div class="card-body">
                <span><b>MODE of Transportation</b></span><br><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="radio_event_request_with_transpo" name="radio_event_request_transpo" value="With Transportation Need">
                    <label class="form-check-label" for="inlineCheckbox1">With Transportation Need</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="radio_event_request_without_transpo" name="radio_event_request_transpo" value="Without Transportation Need" checked>
                    <label class="form-check-label" for="inlineCheckbox1">Without Transportation Need</label>
                </div>

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_personal" name="event_request_with_transpo_personal" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Personnel Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_personal_details" name="event_request_with_transpo_personal_details" maxlength="100" class="form-control class_activity_transpo_inputs" >
                    </div>
                </div><!--End form-row --> 

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_private" name="event_request_with_transpo_private" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Private Rented Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_private_details" name="event_request_with_transpo_private_details" maxlength="100" class="form-control class_activity_transpo_inputs" >
                    </div>
                </div><!--End form-row --> 

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_school" name="event_request_with_transpo_school" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">School Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_school_details" name="event_request_with_transpo_school_details" maxlength="100"class="form-control class_activity_transpo_inputs" >
                    </div>
                </div><!--End form-row --> 

                <p></p>
                <div class="form-row ">
                    <div class="form-check form-check-inline">
                        &emsp;&emsp;
                        <input class="form-check-input class_activity_transpo_inputs" type="checkbox" id="event_request_with_transpo_solicited" name="event_request_with_transpo_solicited" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Solicited Vehicle</label>
                    </div>

                    <div class="col-auto">
                        &emsp;&emsp;
                        <label for="TextLable" class="col-form-label">Details</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" id="event_request_with_transpo_solicited_details" name="event_request_with_transpo_solicited_details" maxlength="100" class="form-control class_activity_transpo_inputs" >
                    </div>
                </div><!--End form-row --> 


            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 5 -->

    <!--SPACES --> 

    <div class="cedtab"> <!--tab 6 -->
        <div class="card">
            <div class="card-body">
                <table style="width:100%">
                    <tr>
                        <td style="width:70%; text-align:left"><span><b>INSIDE Request and Reservation</b></span></td>
                        <td style="text-align:right">
                                <label for="files" class="btn">Attach PSMO File</label>
                                <input id="files" name="files" style="visibility:hidden;" type="file" accept="image/*" onchange="showPreview_request_inside(event);">                                
                        </td>
                    </tr>
                </table>

                <small>NOTE: Fields with asterisk are required</small><br>
                <div class="row"> <!-- Start of Class=row 1 -->

                    <!-- Left side columns -->
                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Venue Request<font color="red"><i>*</i></font></label>
                            <input type="text" id="event_request_person_venue_request" name="event_request_person_venue_request" maxlength="100" class="form-control " >
                            <small id="event_request_person_venue_request_error" class="input_error_color"></small>
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Service Vehicle<font color="red"><i>*</i></font></label>
                            <input type="text" id="event_request_person_service_vehicle" name="event_request_person_service_vehicle" maxlength="100" class="form-control " >
                            <small id="event_request_person_service_vehicle_error" class="input_error_color"></small>
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Facility and Equipment<font color="red"><i>*</i></font></label>
                            <input type="text" id="event_request_person_facequip" name="event_request_person_facequip" maxlength="100" class="form-control " >
                            <small id="event_request_person_facequip_error" class="input_error_color"></small>
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                    <div class="col-lg-3">
                        <div class="row">
                            <label for="TextLable" class="col-form-label">Activity In-Charge<font color="red"><i>*</i></font></label>
                            <input type="text" id="event_request_person_incharge" name="event_request_person_incharge" maxlength="100" class="form-control " >
                            <small id="event_request_person_incharge_error" class="input_error_color"></small>
                        </div><!-- End of row -->
                    </div><!-- End Left side columns -->

                </div><!-- End of Class=row 1 -->

                <br>
                <!--Start - Attach File -->
                <div id="div_attach_inside" class="form-row">
                    <div class="preview_request_inside">
                        <img class="img-thumbnail" id="file-preview-request_inside" >
                    </div>
                </div>
                <!--End - Attach File -->

            </div><!--End Card-Body -->  
        </div><!--End Card -->
    </div><!--End Tab 6 -->

    <!--SPACES --> 

    <!--SPACES --> 

    <div class="cedtab"> <!--tab Last -->
        <div class="card">
            <div class="card-body">

                <span><b>SUBMISSION of Event Request</b></span><br><br>

                <div id="div_captcha" class="text-xs-center">
                    <!--google reCaptha v2 -->
                    <div class="g-recaptcha" data-sitekey="6LfBeFIdAAAAAKz9ZcOu2twO7AuDwS46_Cuuqg3G" ></div>
                </div>
                <br>

                <!-- Hidden Modal Variable -->
                <input type="hidden" name="event_request_apps_userid" id="event_request_apps_userid"  />
                <input type="hidden" name="event_request_apps_user_fullname" id="event_request_apps_user_fullname"   />
                <input type="hidden" name="event_request_apps_user_deptid" id="event_request_apps_user_deptid"   />

                <div class="col text-center">
                    <button type="submit" id="btn_event_request_save" class="btn btn-primary">
                        <i class="event_request-loading-icon fa fa-paper-plane"></i>
                        <span class="event_request-btn-text">Submit Request</span>
                    </button>
                    
                    <!--Progress bar -->
                    <div class="container-fluid">
                        <div id="display_progressbar_event_request" class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" id="progressbar_event_request" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    </div>
                    <br>   
                </div>

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
        <span class="step"></span><!-- Tab 6 -->
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
    //alert("Event Request");

    //Multi-Form2 -Start
    var form2_value = false;
    var add_f2_activity_title = 1;
    var add_f2_activity_theme = 1;
    var add_f2_activity_obj = 1;
    var add_f2_nature = 1;
    var add_f2_activity_date_from = 1;
    var add_f2_activity_date_to = 1;
    var add_f2_activity_time_from = 1;
    var add_f2_activity_time_to = 1;
    var add_f2_activity_venue = 1;
    var add_f2_activity_target = 1;
    var add_f2_activity_incharge = 1;
    var add_f2_activity_contact = 1;
    //Multi-Form2 -End

    //Multi-Form6 -Start
    var form6_value = false;
    var add_f6_venue_request = 1;
    var add_f6_service_vehicle = 1;
    var add_f6_facequip = 1;
    var add_f6_incharge = 1;
    var add_f6_est_budget = 1;
    //Multi-Form6 -End

    //Disable Checkbox -Start
    $('.class_activity_funding_inputs').prop('checked', false);
    $('.class_activity_funding_inputs').prop('disabled', true); //para masama ang radio/checkbox                
    $('.class_activity_funding_inputs').val(''); //clear Textbox Value

    $('.class_activity_transpo_inputs').prop('checked', false);
    $('.class_activity_transpo_inputs').prop('disabled', true); //para masama ang radio/checkbox                
    $('.class_activity_transpo_inputs').val(''); //clear Textbox Value
    //Disable Checkbox -End

    //============================================================================

    //Progress bar | Div
    $("#display_progressbar_event_request").hide();

    $("#div_upload_request_letter").hide();
    $("#div_upload_request_letter2").hide();

    //============================================================================
    //Get Department Description of Event Requester
    var user_deptid = $("#user_deptid").val();
    var user_fullname = $("#hid_user_fullname").val();
    
    $('#event_request_apps_user_deptid').val(user_deptid);   
    $('#event_request_apps_user_fullname').val(user_fullname);  

    var base_path = base_url + "/Users/get_dept_single_record";
    $.ajax({
            url: base_path,
            data: {user_deptid:user_deptid},
            method:'POST',
            dataType: 'json',
            success:function(data) {
                //alert(data.length);             
                $('#event_request_dept').val(data.dept_desc);   
                				
            }//end of success
    });//end of ajax

    
    //===========================================================================
    //START MULTI-FORM
    //===========================================================================
    var ctrko = 0;
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        ctrko = n;
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("cedtab");
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
        var x = document.getElementsByClassName("cedtab");
        
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

        //alert(ctrko);
        switch(ctrko) {
            case 0:
                if(document.getElementById('event_request_l1a').checked) {
                    //alert(document.getElementById("event_request_l1a").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('event_request_l1b').checked) {
                    //alert(document.getElementById("event_request_l1b").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('event_request_l1c').checked) {
                    //alert(document.getElementById("event_request_l1c").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('event_request_l2a').checked) {
                    //alert(document.getElementById("event_request_l2a").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('event_request_l2b').checked) {
                    //alert(document.getElementById("event_request_l2b").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('event_request_l3a').checked) {
                    //alert(document.getElementById("event_request_l3a").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('event_request_l3b').checked) {
                    //alert(document.getElementById("event_request_l3b").value + " is selected");
                    valid = true;
                }
                else {
                    return_msg = "Please select LEVEL of References!";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: ''+ return_msg + '',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        //footer: '<a href="">Why do I have this issue?</a>'
                    })//end swall.fire Error
                    valid = false;
                }
                break;

            case 1:
                //alert("F2");
                if(form2_value) {
                    valid = true;
                } else {
                    return_msg = "Please complete this ACTIVITY Major Details form!";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: ''+ return_msg + '',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        //footer: '<a href="">Why do I have this issue?</a>'
                    })//end swall.fire Error
                    valid = false;
                }
                break;

            case 2: 
                //alert("F3");
                var form3 = false;
                if(document.getElementById('event_request_support_letter_with').checked) {
                    //alert(document.getElementById("event_request_support_letter_with").value + " is selected");

                    var image_extension = $('#file-request_letter').val().split('.').pop().toLowerCase();
                    if((jQuery.inArray(image_extension, ['gif','png','jpg','jpeg']) == -1) || (image_extension == "")) {
                        form3 = false;
                    } else {
                        form3 = true;
                    }

                } else if(document.getElementById('event_request_support_letter_without').checked) {
                    //alert(document.getElementById("event_request_support_letter_without").value + " is selected");
                    form3 = true;
                } 

                if(form3) {
                    valid = true;
                } else {
                    return_msg = "Please Complete this Form !";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: ''+ return_msg + '',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        //footer: '<a href="">Why do I have this issue?</a>'
                    })//end swall.fire Error
                    valid = false;
                }
                break;

            case 3:
                //alert("F4");
                if(document.getElementById('radio_event_request_with_fee').checked) {
                    //alert(document.getElementById("radio_event_request_with_fee").value + " is selected");
                }
                else if(document.getElementById('radio_event_request_without_fee').checked) {
                    //alert(document.getElementById("radio_event_request_without_fee").value + " is selected");
                    valid = true;
                }
                else {
                    return_msg = "Please select Activity Fee Collection!";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: ''+ return_msg + '',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        //footer: '<a href="">Why do I have this issue?</a>'
                    })//end swall.fire Error
                    valid = false;
                }
                break;
            case 4:
                //alert("F5");
                if(document.getElementById('radio_event_request_with_transpo').checked) {
                    //alert(document.getElementById("radio_event_request_with_transpo").value + " is selected");
                    valid = true;
                }
                else if(document.getElementById('radio_event_request_without_transpo').checked) {
                    //alert(document.getElementById("radio_event_request_without_transpo").value + " is selected");
                    valid = true;
                }
                else {
                    return_msg = "Please select Mode of Transportation!";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: ''+ return_msg + '',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        //footer: '<a href="">Why do I have this issue?</a>'
                    })//end swall.fire Error
                    valid = false;
                }
                break;

            case 5:
                //alert("F6");
                if(form6_value) {
                    valid = true;
                } else {
                    return_msg = "Please complete this Request and Reservation form!";
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: ''+ return_msg + '',
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        //footer: '<a href="">Why do I have this issue?</a>'
                    })//end swall.fire Error
                    valid = false;
                }
                break;

            case 6:
                //alert("F7");
                break;

            default:
                alert("Default");
        }
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

        //START OF FORM2 OF MULTI-FORM==================================================================================================
            
            //Check Input FORM2 - Start
                $(document).on("focusout keyup","#event_request_activity_title",function(e) {
                    var input = $("#event_request_activity_title").val();
                    if (input.length == 0) {
                        $("#event_request_activity_title_error").html('Activity Title is blank');
                        add_f2_activity_title = 1;
                    } else {
                        $("#event_request_activity_title_error").html('');
                        $("#event_request_activity_title").val(input.toUpperCase());
                        add_f2_activity_title = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_activity_theme",function(e) {
                    var input = $("#event_request_activity_theme").val();
                    if (input.length == 0) {
                        $("#event_request_activity_theme_error").html('Activity Theme is blank');
                        add_f2_activity_theme = 1;
                    } else {
                        $("#event_request_activity_theme_error").html('');
                        $("#event_request_activity_theme").val(input.toUpperCase());
                        add_f2_activity_theme = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_activity_obj",function(e) {
                    var input = $("#event_request_activity_obj").val();
                    if (input.length == 0) {
                        $("#event_request_activity_obj_error").html('Activity Objective is blank');
                        add_f2_activity_obj = 1;
                    } else {
                        $("#event_request_activity_obj_error").html('');
                        $("#event_request_activity_obj").val(input.toUpperCase());
                        add_f2_activity_obj = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                //event_request_nature_activity
                $(document).on("change focusout","#event_request_nature_activity",function(e) {
                    var input = $("#event_request_nature_activity").val();
                    if (input == "Choose...") {
                        $("#event_request_nature_activity_error").html('Invalid Nature of Activity');
                        add_f2_nature = 1;
                    } else {
                    $("#event_request_nature_activity_error").html('');
                        add_f2_nature = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click 

                $(document).on("focusout","#event_request_date_from",function(e) {
                    var input = $("#event_request_date_from").val();
                    var numdays = $("#event_request_noOfDays").val();
                    if (input.length == 0) {
                        $("#event_request_date_from_error").html('Date From is blank');
                        add_f2_activity_date_from = 1;
                    } else {
                        $("#event_request_date_from_error").html('');
                        if(numdays <= 0) {
                            $("#event_request_noOfDays_error").html('Invalid Number of Days');
                            add_f2_activity_date_from = 1;
                            add_f2_activity_date_to = 1;
                        } else {
                            $("#event_request_noOfDays_error").html('');
                            add_f2_activity_date_from = 0;
                        }
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout","#event_request_date_to",function(e) {
                    var input = $("#event_request_date_to").val();
                    var numdays = $("#event_request_noOfDays").val();
                    if (input.length == 0) {
                        $("#event_request_date_to_error").html('Date To is blank');
                        add_f2_activity_date_to = 1;
                    } else {
                        $("#event_request_date_to_error").html('');
                        if(numdays <= 0) {
                            $("#event_request_noOfDays_error").html('Invalid Number of Days');
                            add_f2_activity_date_from = 1;
                            add_f2_activity_date_to = 1;
                        } else {
                            $("#event_request_noOfDays_error").html('');
                            add_f2_activity_date_from = 0;
                            add_f2_activity_date_to = 0;
                        }
                    }
                    check_multi_form_Form2();
                });//end of document click  

                //Calculate Difference Between Two Dates
                $(document).off('change', '#event_request_date_from, #event_request_date_to').on('change', '#event_request_date_from, #event_request_date_to', function (event) {
                    event.preventDefault();
                
                    var date_fromx = $("#event_request_date_from").val();
                    var date_tox = $("#event_request_date_to").val();

                    var date_from = moment(date_fromx).format('MM/DD/YYYY'); 
                    var date_to = moment(date_tox).format('MM/DD/YYYY'); 

                    let date1 = new Date(date_from);
                    let date2 = new Date(date_to);

                    if(date_from.length > 0 && date_to.length > 0 ) {
                        // To calculate the time difference of two dates
                        let Difference_In_Time = date2.getTime() - date1.getTime();
                        
                        // To calculate the no. of days between two dates
                        let Difference_In_Days = Math.round(Difference_In_Time / (1000 * 3600 * 24));
                        
                        //alert(Difference_In_Days);
                        $("#event_request_noOfDays").val(Difference_In_Days); 
                    } 
                });//end of document click

                
                $(document).on("focusout keyup","#event_request_time_from",function(e) {
                    var input = $("#event_request_time_from").val();
                   
                    if (input.length == 0) {
                        $("#event_request_time_from_error").html('Time From is blank');
                        add_f2_activity_time_from = 1;
                    } else {
                        $("#event_request_time_from_error").html('');
                        add_f2_activity_time_from = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_time_to",function(e) {
                    var input = $("#event_request_time_to").val();
                   
                    if (input.length == 0) {
                        $("#event_request_time_to_error").html('Time To is blank');
                        add_f2_activity_time_to = 1;
                    } else {
                        $("#event_request_time_to_error").html('');
                        add_f2_activity_time_to = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                
                $(document).on("focusout keyup","#event_request_venue_actvty",function(e) {
                    var input = $("#event_request_venue_actvty").val();
                   
                    if (input.length == 0) {
                        $("#event_request_venue_actvty_error").html('Venue of Activity is blank');
                        add_f2_activity_venue = 1;
                    } else {
                        $("#event_request_venue_actvty_error").html('');
                        $("#event_request_venue_actvty").val(input.toUpperCase());
                        add_f2_activity_venue = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_actvty_target_participant",function(e) {
                    var input = $("#event_request_actvty_target_participant").val();
                   
                    if (input.length == 0) {
                        $("#event_request_actvty_target_participant_error").html('Target Participant is blank');
                        add_f2_activity_target = 1;
                    } else {
                        $("#event_request_actvty_target_participant_error").html('');
                        $("#event_request_actvty_target_participant").val(input.toUpperCase());
                        add_f2_activity_target = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_actvty_in_charge",function(e) {
                    var input = $("#event_request_actvty_in_charge").val();
                   
                    if (input.length == 0) {
                        $("#event_request_actvty_in_charge_error").html('Activity In-Charge is blank');
                        add_f2_activity_incharge = 1;
                    } else {
                        $("#event_request_actvty_in_charge_error").html('');
                        $("#event_request_actvty_in_charge").val(input.toUpperCase());
                        add_f2_activity_incharge = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_actvty_contact",function(e) {
                    var input = $("#event_request_actvty_contact").val();
                   
                    if (input.length == 0) {
                        $("#event_request_actvty_contact_error").html('Activity Contact is blank');
                        add_f2_activity_contact = 1;
                    } else {
                        $("#event_request_actvty_contact_error").html('');
                        add_f2_activity_contact = 0;
                    }
                    check_multi_form_Form2();
                });//end of document click  


                function check_multi_form_Form2() {
                    if(add_f2_activity_title == 1 || add_f2_activity_theme == 1 || add_f2_activity_obj == 1 || add_f2_activity_date_from == 1 ||
                        add_f2_activity_date_from == 1 || add_f2_activity_time_from == 1 || add_f2_activity_time_to == 1 || add_f2_activity_venue == 1 || add_f2_activity_target == 1 ||
                        add_f2_activity_incharge == 1 || add_f2_activity_contact == 1 || add_f2_nature == 1) 
                    {
                        form2_value = false;
                    } else {
                        form2_value = true;
                    }
                }//end of function
            //Check Input FORM 2 - End
            //===============================================
            //Input to UpperCase FORM 3 - Start
                $(document).on("focusout keyup","#event_request_actvty_speaker",function(e) {
                    var input = $("#event_request_actvty_speaker").val();
                    $("#event_request_actvty_speaker").val(input.toUpperCase());
                });//end of document click 

                $(document).on("focusout keyup","#event_request_actvty_company_prospect",function(e) {
                    var input = $("#event_request_actvty_company_prospect").val();
                    $("#event_request_actvty_company_prospect").val(input.toUpperCase());
                });//end of document click 

                $(document).on("focusout keyup","#event_request_actvty_company_person",function(e) {
                    var input = $("#event_request_actvty_company_person").val();
                    $("#event_request_actvty_company_person").val(input.toUpperCase());
                });//end of document click 

                $(document).on("focusout keyup","#event_request_actvty_company_person_contact",function(e) {
                    var input = $("#event_request_actvty_company_person_contact").val();
                    $("#event_request_actvty_company_person_contact").val(input.toUpperCase());
                });//end of document click 

                $(document).on("click","#event_request_support_letter_with",function(e) {
                    //alert(document.getElementById("radio_event_request_with_fee").value + " is selected");
                    $("#div_upload_request_letter").show();
                    $("#div_upload_request_letter2").show();
                });//end of document click 
                
                $(document).on("click","#event_request_support_letter_without",function(e) {
                    //alert(document.getElementById("radio_event_request_with_fee").value + " is selected");
                    $("#div_upload_request_letter").hide();
                    $("#div_upload_request_letter2").hide();
                    
                    //CLEAR IMAGE VALUE FROM GET FILE AND PREVIEW IMAGE-----
                    $("#file-request_letter").val(""); //mawala ang select image or larawan
                    $('#file-preview-request_letter+ img').remove();
                    $("#file-preview-request_letter").hide();
                   
                });//end of document click 
                
            //Input to UpperCase FORM 3 - End
            //===============================================
            //FORM 4 - Start
                $(document).on("click","#radio_event_request_with_fee",function(e) {
                    $('.class_activity_funding_inputs').prop('disabled', false);  //para masama ang radio/checkbox
                    //$('.class_activity_funding_inputs').prop('readOnly', false);
                });//end of document click 

                $(document).on("click","#radio_event_request_without_fee",function(e) {
                    $('.class_activity_funding_inputs').prop('checked', false);
                    $('.class_activity_funding_inputs').prop('disabled', true); //para masama ang radio/checkbox
                    //$('.class_activity_funding_inputs').prop('readOnly', false); //Textbox lang ang affected
                    $('.class_activity_funding_inputs').val(''); //clear Textbox Value
                });//end of document click 
            //FORM 4 - End
            //===============================================
            //FORM 5 - Start
                $(document).on("click","#radio_event_request_with_transpo",function(e) {
                    $('.class_activity_transpo_inputs').prop('disabled', false);  //para masama ang radio/checkbox
                    //$('.class_activity_funding_inputs').prop('readOnly', false); //Textbox lang ang affected
                });//end of document click 

                $(document).on("click","#radio_event_request_without_transpo",function(e) {
                    $('.class_activity_transpo_inputs').prop('checked', false);
                    $('.class_activity_transpo_inputs').prop('disabled', true); //para masama ang radio/checkbox
                    //$('.class_activity_funding_inputs').prop('readOnly', true); //Textbox lang ang affected
                    $('.class_activity_transpo_inputs').val(''); //clear Textbox Value
                });//end of document click 
            //FORM 5 - End
            //===============================================
            //CHECK INPUT FORM 6 - START
                $(document).on("focusout keyup","#event_request_person_venue_request",function(e) {
                    var input = $("#event_request_person_venue_request").val();
                   
                    if (input.length == 0) {
                        $("#event_request_person_venue_request_error").html('Venue Request is blank');
                        add_f6_venue_request = 1;
                    } else {
                        $("#event_request_person_venue_request_error").html('');
                        $("#event_request_person_venue_request").val(input.toUpperCase());
                        add_f6_venue_request = 0;
                    }
                    check_multi_form_Form6();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_person_service_vehicle",function(e) {
                    var input = $("#event_request_person_service_vehicle").val();
                   
                    if (input.length == 0) {
                        $("#event_request_person_service_vehicle_error").html('Service Vehicle is blank');
                        add_f6_service_vehicle = 1;
                    } else {
                        $("#event_request_person_service_vehicle_error").html('');
                        $("#event_request_person_service_vehicle").val(input.toUpperCase());
                        add_f6_service_vehicle = 0;
                    }
                    check_multi_form_Form6();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_person_facequip",function(e) {
                    var input = $("#event_request_person_facequip").val();
                   
                    if (input.length == 0) {
                        $("#event_request_person_facequip_error").html('Facility and Equipment is blank');
                        add_f6_facequip = 1;
                    } else {
                        $("#event_request_person_facequip_error").html('');
                        $("#event_request_person_facequip").val(input.toUpperCase());
                        add_f6_facequip = 0;
                    }
                    check_multi_form_Form6();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_person_incharge",function(e) {
                    var input = $("#event_request_person_incharge").val();
                   
                    if (input.length == 0) {
                        $("#event_request_person_incharge_error").html('Activity In-charge is blank');
                        add_f6_incharge = 1;
                    } else {
                        $("#event_request_person_incharge_error").html('');
                        $("#event_request_person_incharge").val(input.toUpperCase());
                        add_f6_incharge = 0;
                    }
                    check_multi_form_Form6();
                });//end of document click  

                $(document).on("focusout keyup","#event_request_est_budget",function(e) {
                    var input = $("#event_request_est_budget").val();
                   
                    if (input.length == 0) {
                        $("#event_request_est_budget_error").html('Estimate Budget is blank');
                        add_f6_incharge = 1;
                    } else {
                        $("#event_request_est_budget_error").html('');
                        //$("#event_request_person_incharge").val(input.toUpperCase());
                        add_f6_incharge = 0;
                    }
                    check_multi_form_Form6();
                });//end of document click  



                function check_multi_form_Form6() {
                    if(add_f6_venue_request == 1 || add_f6_service_vehicle == 1 || add_f6_facequip == 1 || add_f6_incharge == 1) 
                    {
                        form6_value = false;
                    } else {
                        form6_value = true;
                    }
                }//end of function

            //CHECK INPUT FORM 6 - END
            //===============================================

        //END OF FORM2 OF MULTI-FORM==================================================================================================

        
    });//end of document ready function
    //========================================================

    //Submitting Form Data | EVENT REQUEST - Start
    $('#submit_event_request_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_event_request").show();
            var base_path = base_url + "/Employee/submit_event_request_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_event_request').html(percentComplete + '%');
                    $('#progressbar_event_request').width(percentComplete + '%');
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
                    document.getElementById("btn_event_request_save").disabled = true;
                    $(".event_request-loading-icon").removeClass('fa fa-paper-plane');
                    $(".event_request-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".event_request-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_event_request_save").disabled = false;
                            $(".event_request-loading-icon").removeClass('spinner-border text-warning');
                            $(".event_request-loading-icon").addClass('fa fa-paper-plane');
                            $(".event_request-btn-text").text("Submit Record");

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
                                        $('#progressbar_apps_event_request').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_event_request").hide();

                                            //Update DataTable
                                            $('#table_event_request_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_event_request_save").disabled = true;

                                            //Load List of Event Request Form
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_request"); 

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_event_request').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_event_request").hide();

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
    //Submitting Form Data | EVENT REQUEST - End

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //showPreview_image
    function showPreview_request_letter(event) {
            var image_ext = $('#file-request_letter').val().split('.').pop().toLowerCase();
       
            if(jQuery.inArray(image_ext, ['gif','png','jpg','jpeg']) == -1) {
                setTimeout(function(){
                    $("#file-request_letter").val(""); //mawala ang select image or larawan
                    $('#file-preview-request_letter+ img').remove();
                    $("#file-preview-request_letter").hide();
                }, 1500);

                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Request Letter Image, only gif, png, jpg or jpeg',
                //footer: '<a href="">Why do I have this issue?</a>'
                })
                return false;
                
            } else {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-preview-request_letter");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
        }//end of function

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //showPreview_image
    function showPreview_request_inside(event) {
            var image_ext = $('#files').val().split('.').pop().toLowerCase();
       
            if(jQuery.inArray(image_ext, ['gif','png','jpg','jpeg']) == -1) {
                setTimeout(function(){
                    $("#file-request_inside").val(""); //mawala ang select image or larawan
                    $('#file-preview-request_inside+ img').remove();
                    $("#file-preview-request_inside").hide();
                }, 1500);

                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Image, only gif, png, jpg or jpeg',
                //footer: '<a href="">Why do I have this issue?</a>'
                })
                return false;
                
            } else {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-preview-request_inside");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
        }//end of function

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

</script>