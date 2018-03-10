
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */

    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });

    $('#loginBtn').click(function () {

        $.ajax({
            url: 'http://bank.recruit.cn/admin/login/login',
            dataType: 'json',
            type: 'post',
            data: $('.login-form').serialize(),
            success: function (res) {
                if (res.code != 201) {
                    alert(res.msg);
                }else {
                    window.location.href = 'http://bank.recruit.cn/admin/announce/getAnnounceInfo';
                }
            }
        });
    });
    
    
});
