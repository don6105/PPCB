function get_resume_data(id) {
    $('#resume_content').html('').removeClass("text-center");
    $.post(site_url+"/get_resume", {id: id}, function(data) {
        var obj = JSON && JSON.parse(data) || $.parseJSON(data);
        if(obj.result.indexOf("Success")>-1) {
            if(!obj.resume) {
            	$("#resume_content").addClass("text-center");
                $("#resume_content").html("<span style='font-size: 30px; color: rgb(120, 120, 120);'>Empty</span>");
            } else {
                $("#resume_content").html(obj.resume);
            }
        } else {
        	$("#resume_content").addClass("text-center");
            $("#resume_content").html("<span style='font-size: 30px; color: rgb(220, 0, 0);'>Failed to fetch data.</span>");
        }
    }).fail(function() {
    	$("#resume_content").addClass("text-center");
        $("#resume_content").html("<span style='font-size: 30px; color: rgb(220, 0, 0);'>Network error.</span>");
    });
}