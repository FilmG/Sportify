$(document).ready(function() {	
    //alert("App website JS");

    $(document).on("click","#website_home",function(e) {
        //alert("from website to Basketball Site");
        //window.location.href=base_url+"/Login/forgot_password","_blank"; //open to same tab
        //window.open(base_url+"/Games/basketball_site"); //open to another tab

        //window.location.href=base_url+"/Games/basketball_site","_blank"; //open to same tab

        //
        $("#website_container").load(base_url+"/Games/website_home");       
    });//end of document click
    
    $(document).on("click","#website_basketball",function(e) {
        //alert("from website to Basketball Site");
        //window.location.href=base_url+"/Login/forgot_password","_blank"; //open to same tab
        //window.open(base_url+"/Games/basketball_site"); //open to another tab

        //window.location.href=base_url+"/Games/basketball_site","_blank"; //open to same tab
        //
        $("#website_container").load(base_url+"/Games/basketball_site");       
    });//end of document click

    $(document).on("click","#website_volleyball",function(e) {
        //alert("from website to Basketball Site");
        //window.location.href=base_url+"/Login/forgot_password","_blank"; //open to same tab
        //window.open(base_url+"/Games/basketball_site"); //open to another tab

        //window.location.href=base_url+"/Games/basketball_site","_blank"; //open to same tab
        //
        $("#website_container").load(base_url+"/Games/volleyball_site");       
    });//end of document click

    $(document).on("click","#website_apps_login",function(e) {
        //alert("from website to Appls login");
        //window.location.href=base_url+"/Login/forgot_password","_blank"; //open to same tab

        window.open(base_url+"/Login/index","_blank"); //open to another tab
    });//end of document click

    
    //====================================================================================================
    //SPACER=>
    //====================================================================================================
    
}); //end of document ready ##############################################################################