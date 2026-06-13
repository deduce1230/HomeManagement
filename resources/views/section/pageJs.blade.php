@section('pageJs')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="js/jQuery.MiniCalendar-master/jquery.minicalendar.js"></script>
<script type="text/javascript">
(function($) {
  $(function() {
    $('#mini-calendar').miniCalendar();
  });
})(jQuery);
</script>
@endsection

