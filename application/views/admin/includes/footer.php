	<!-- scripts -->

    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <script src="<?php echo base_url(); ?>/files/theme/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>/files/theme/js/jquery-ui-1.10.2.custom.min.js"></script>

    <!-- knob -->

    <script src="<?php echo base_url(); ?>/files/theme/js/jquery.knob.js"></script>

    <!-- flot charts -->

    <script src="<?php echo base_url(); ?>/files/theme/js/jquery.flot.js"></script>

    <script src="<?php echo base_url(); ?>/files/theme/js/jquery.flot.stack.js"></script>

    <script src="<?php echo base_url(); ?>/files/theme/js/jquery.flot.resize.js"></script>

     <script src="<?php echo base_url(); ?>/files/theme/js/jquery.dataTables.js"></script>

    <script src="<?php echo base_url(); ?>/files/theme/js/theme.js"></script>



    <script type="text/javascript">

        $(function () {



            // jQuery Knobs

            $(".knob").knob();







            // jQuery UI Sliders

            $(".slider-sample1").slider({

                value: 100,

                min: 1,

                max: 500

            });

            $(".slider-sample2").slider({

                range: "min",

                value: 130,

                min: 1,

                max: 500

            });

            $(".slider-sample3").slider({

                range: true,

                min: 0,

                max: 500,

                values: [ 40, 170 ],

            });

            $('#example').dataTable({

                "sPaginationType": "full_numbers"

            });

             

        });





         $( "#pay_type" ).change(function() {

      	    if($(this).val()=='per')

      	    {

				$('.pay_cap_div').show();

            }

      	    else{

      	    	$('.pay_cap_div').hide();

          	}   

      	 });



      	 	

    </script>

     

    

</body>

</html>