function ubahForm(){

    if ($(".customer1").attr('hidden')) {
        
        $(".customer0").attr("hidden",true);
        $(".select-customer").removeAttr('required');
        $(".select-customer").attr("disabled", true);

        $(".customer1").attr("hidden",false);
        $(".customer1").removeAttr('disabled');
        $(".customer1").attr('required', '');

    }else{

        $(".customer1").attr("hidden",true);
        $(".customer1").removeAttr('required');
        $(".customer1").attr("disabled", true);

        $(".customer0").attr("hidden",false);
        $(".select-customer").removeAttr('disabled');
        $(".select-customer").attr('required', '');
    
    }

}

// function switchStatus(a, b, c){

//     $(a).attr("hidden",true);
//     $(b).removeAttr('required');
//     $(b).attr("disabled", true);

//     $(c).attr("hidden",false);
//     $(c).removeAttr('disabled');
//     $(c).attr('required', '');

// }