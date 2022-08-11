<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
             if($(this).val() != '')
             {
                 var select    = $(this).attr("id");
                 var value     = $(this).val();
                 var dependent = $(this).data('dependent');
                 var dependente= "fclass";
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

        $('.typevoie').change(function(){

            if($(this).val() != '')
            {

                var select    = $(this).attr("id");
                var value     = $(this).val();
                var dependente= 'fclass';
                var _token    = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('formVoieController.typevoie') }}",
                    method:"POST",
                    data:{
                        select:select,
                        value:value,
                        _token:_token,
                        dependente:dependente
                    },
                    success:function(result)
                    {
                        $('#'+dependente).html(result);
                    },
                    error:function()
                    {

                        alert('échec');

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

    $('.search').click(function(){
        if($(commune).val() != '')
        {
            var select    = $(commune).attr("id");
            var valueCom  = $(commune).val();
            var typeVoie  = $(fclass).val();
            //var dependent = $(this).data('dependent');
            var _token    = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('formVoieController.zoomCommune') }}",
               method:"POST",
               data:{
                    select:select,
                    valueCom:valueCom,
                    typeVoie:typeVoie,
                    _token:_token,
                    //dependent:dependent
                },
                success:function(data)
                {
                    zoomreq(data,typeVoie);
                    //$('#'+dependent).html(data);
                }
            });
        }
   });

   $('.fclass').click(function(){
    if($(commune).val() != '')
    {
        var select    = $(commune).attr("id");
        var value     = $(this).val();
        var valueCom  = $(commune).val();
        var typeVoie  = $(fclass).val();
        //var dependent = $(this).data('dependent');
        var _token    = $('input[name="_token"]').val();
        zoommer(value,typeVoie);
        //$.ajax({
        //    url:"{{ route('formVoieController.fclass') }}",
         //  method:"POST",
       //    data:{
        //        select:select,
         //       valueCom:valueCom,
          //      value:value,
           //     typeVoie:typeVoie,
         //       _token:_token,
                //dependent:dependent
         //   },
          //  success:function(data)
         //   {
         //       zoommer(value,typeVoie);
                //$('#'+dependent).html(data);
           // }
       // });
    }
});

    $('.voie').click(function(){
        if($(commune).val() != '')
        {
            var select    = $(commune).attr("id");
            var valueCom  = $(commune).val();
            var typeVoie  = $(fclass).val();
            var dependent = $(this).data('dependent');
            var _token    = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('formVoieController.voie') }}",
               method:"POST",
               data:{
                    select:select,
                    valueCom:valueCom,
                    typeVoie:typeVoie,
                    _token:_token,
                    dependent:dependent
                },
                success:function(data)
                {
                    //alert('succes')
                    $('#'+dependent).html(data);
                },
                error:function()
                {
                    alert('error');
                }
            });
        }
   });

   $('.voie').click(function(){
        if($(commune).val() != '')
        {
            var select    = $(commune).attr("id");
            var valueCom  = $(commune).val();
            var typeVoie  = $(fclass).val();
            var dependent = $(this).data('dependent');
            var _token    = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('formVoieController.voie') }}",
               method:"POST",
               data:{
                    select:select,
                    valueCom:valueCom,
                    typeVoie:typeVoie,
                    _token:_token,
                    dependent:dependent
                },
                success:function(data)
                {
                    //alert('succes')
                    $('#'+dependent).html(data);
                },
                error:function()
                {
                    alert('error');
                }
            });
        }
   });
    });
 </script>
