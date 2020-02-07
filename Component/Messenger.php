
<!-- Load Facebook SDK for JavaScript : Không hoạt động do tên miền ko thể add vô Miền liên kết của Fanpage (ko có tên miền chính thức)
     -->
      <div id='fb-root'></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class='fb-customerchat'
        attribution=setup_tool
        page_id='106520974118558'>
      </div>

 