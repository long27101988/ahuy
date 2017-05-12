        <!-- basic scripts -->
        <!--[if !IE]> -->

        <!-- <![endif]-->

        <!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

        <!--[if !IE]> -->
       <!--  <script type="text/javascript">
            window.jQuery || document.write("<script src='dist/js/jquery.min.js'>"+"<"+"/script>");
        </script> -->

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='dist/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <!-- <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write('<?php //echo \Theme::instance()->asset->js('jquery.mobile.custom.min.js');?>');
        </script> -->

        <?php
            echo \Theme::instance()->asset->js([

                'bootstrap.min.js',
                'ace-elements.min.js',
                'ace.min.js',
                'script.js',
                'select2.min.js'
            ]);
        ?>
    </body>

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.3/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 May 2015 15:59:10 GMT -->
</html>
