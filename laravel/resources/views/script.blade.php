@extends("layouts/masterlayout")
@section("script")
  <script src= "{{ asset('js/bootstrap.min.js') }}">
  </script> 
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/jquery-1.12.4.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/jquery-1.8.3.min.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/jquery-3.3.1.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript">
  </script> 
  
  <script class="include" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }} " type="text/javascript">
  </script> 
  <script src="{{ asset('js/jquery.scrollTo.min.js') }}">
  </script> 
  <script src= "{{ asset('js/jquery.nicescroll.js') }}"type="text/javascript">
  </script> 
  <script src="{{ asset('js/jquery.sparkline.js') }}">
  </script> <!--common script for all pages-->
  <script src="{{ asset('js/bootstrap-timepicker.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/bootstrap-timepicker.min.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/common-scripts.js') }}">
  </script> 
  <script src="{{ asset('js/gritter/js/jquery.gritter.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/gritter-conf.js') }}" type="text/javascript">
  </script> 
   
  <script src="{{ asset('js/sparkline-chart.js') }}">
  </script> 
  <script src="{{ asset('js/zabuto_calendar.js') }}">
  </script> 

  
  @endsection