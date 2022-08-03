<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
             if($(this).val() != '')
             {
                 var select    = $(this).attr("id");
                 var value     = $(this).val();
                 var dependent = $(this).data('dependent');
                 var _token    = $('input[name="_token"]').val();
                 $.ajax({
                     url:"{{ route('formVoieController.fetch') }}",
                    method:"POST",
                    data:{
                         select:select,
                         value:value,
                         _token:_token,
                         dependent:dependent
                     },
                     success:function(result)
                     {
                         $('#'+dependent).html(result);
                     }
                 });
             }
        });
        $('.dynamictypo').change(function(){
         if($(this).val() != '')
         {
             var select    = $(this).attr("id");
             var value     = $(this).val();
             var comValue  = $(commune).val();
             var dependent = $(this).data('dependent');
             var _token    = $('input[name="_token"]').val();
             $.ajax({
                 url:"{{ route('formVoieController.fetchtypo') }}",
                method:"POST",
                data:{
                     select   :select,
                     value    :value,
                     comValue :comValue,
                     _token   :_token,
                     dependent:dependent
                 },
                 success:function(result)
                 {
                     $('#'+dependent).html(result);
                 }
             });
         }
    });

    $('.description').dblclick(function(){
        prompt('doo')
        if($(this).val() != '')
        {
            var value  = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('formVoieController.description') }}",
                method:"POST",
                data:{
                    value    :value,
                    _token   :_token
                },
                success:function(result)
                 {

                 }
            });

        }
    });
    });
 </script>
