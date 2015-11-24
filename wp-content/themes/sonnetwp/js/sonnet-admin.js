(function($){
    "use srict";
    $(document).ready(function(){
        $("#aboutusdetails").hide();
        $("#attachments-sonnet_portfolio").hide();
        $("#portfolioquotes").hide();
//        $("#pricingtable").hide();
        $("#newsdetails").hide();
        $("#subscriptiondetails").hide();
        $("#storysectiondetails").hide();
        $("#attachments-sonnet_clients").hide();
        $("#quotedetails").hide();

        $("#_sonnet_section_type").bind("change",function(){
            if ($(this).val()==5){
                $("#aboutusdetails").show();
            }else{
                $("#aboutusdetails").hide();
            }

            if ($(this).val()==3){
                $("#attachments-sonnet_portfolio").show();

                $("#portfolioquotes").show();
            }else{
                $("#portfolioquotes").hide();
                $("#attachments-sonnet_portfolio").hide();
            }

//            if ($(this).val()==10){
//                $("#pricingtable").show();
//            }else{
//                $("#pricingtable").hide();
//            }
            if ($(this).val()==13){ //news
                $("#newsdetails").show();
            }else{
                $("#newsdetails").hide();
            }

            if ($(this).val()==8){ //news
                $("#subscriptiondetails").show();
            }else{
                $("#subscriptiondetails").hide();
            }
            if ($(this).val()==1){ //news
                $("#storysectiondetails").show();
            }else{
                $("#storysectiondetails").hide();
            }
            if ($(this).val()==11){ //news
                $("#attachments-sonnet_clients").show();
            }else{
                $("#attachments-sonnet_clients").hide();
            }
            if ($(this).val()==4){ //news
                $("#quotedetails").show();
            }else{
                $("#quotedetails").hide();
            }
        });

        if($("#_sonnet_section_type").val()==5)
            $("#aboutusdetails").show();
        if($("#_sonnet_section_type").val()==3){
            $("#attachments-sonnet_portfolio").show();
            $("#portfolioquotes").show();
        }
//        if($("#_sonnet_section_type").val()==10)
//            $("#pricingtable").show();
        if($("#_sonnet_section_type").val()==13)
            $("#newsdetails").show();
        if($("#_sonnet_section_type").val()==8)
            $("#subscriptiondetails").show();
        if($("#_sonnet_section_type").val()==1)
            $("#storysectiondetails").show();

        if($("#_sonnet_section_type").val()==11){
            $("#attachments-sonnet_clients").show();
        }

        if($("#_sonnet_section_type").val()==4){
            $("#quotedetails").show();
        }


        $("#_sonnet_service_icon").on("change",function(){
            //alert($(this).val());
            var icon = "<i style='font-size:24px;color:#222;padding-top:20px;' class='fa "+$(this).val()+"'></i>";
            $(this).next().html(icon);
        });
        //$("#_sonnet_service_icon").select2();


    });


})(jQuery);

function addSectionOrder(id,obj){
    var $ = jQuery;
    var o = $(obj).val();
    var params = {"id":id,"order":o,action:"orderchange"};
    $.post("/wp-admin/admin-ajax.php",params, function(data){
        //alert(data);
    })
}