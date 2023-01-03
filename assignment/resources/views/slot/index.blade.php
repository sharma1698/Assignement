<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{URL::asset('css/custom.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<input type="hidden" id="total_slots" value="{{count($data)+1}}">
<div id="slots">
@foreach($data as $key=>$v)
<div class="slot_style" id="slot_{{$v->id}}">
    <div>
        <div>
            Slot {{$v->id}}
        </div>
        <div>
            <input type="number" name="field{{$v->id}}_1" id="field{{$v->id}}_1" value="{{$v->field1}}">
        </div>
        <div>
            <input type="number" name="field{{$v->id}}_2" id="field{{$v->id}}_2" value="{{$v->field2}}">
        </div>
        <div>
            <input type="number"name="field{{$v->id}}_3" id="field{{$v->id}}_3" value="{{$v->field3}}">
        </div>
    </div>
</div>
@endforeach
<div class="btn_style">
<span class="msg"></span>
<button type="button" id="update_slot" class="btn btn-danger" value="">Update</button>
<button type="button" id="add_slot" class="btn btn-success">Add</button>
</div>
</div>
<script>
var new_slot = 1;
var last_slot = parseInt($("#total_slots").val())+1 ;

$("#add_slot").click(function(){
  new_slot++;
  last_slot++;  
  var fieldHtml = '<div class="slot_style" id="slot_'+new_slot+'"><div><div>Slot '+new_slot+'</div><div><input type="number" name="field'+new_slot+'_1" id="field'+new_slot+'_1" value="0"></div><div><input type="number" name="field'+new_slot+'_2" id="field'+new_slot+'_2" value="0"></div><div><input type="number"name="field'+new_slot+'_3"  id="field'+new_slot+'_3" value="0"></div>    </div>';
  $(fieldHtml).insertAfter("#slot_"+last_slot);
  arr={};
  for(var i= 1 ; i<=3;i++){
     arr['field'+new_slot+"_"+i]  = 0;
  }
  json_format = JSON.stringify(arr);
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    $.ajax({
    type: "POST",
    url: "{{route('add.slot')}}",
    data: {data:json_format} ,
    success: function(msg) {
     var arr = Object.values(msg.data);
    $("#total_slots").val(msg.total_slots);
     last_slot=msg.total_slots;  
     var fieldHtml = '<div class="slot_style" id="slot_'+last_slot+'"><div><div>Slot '+last_slot+'</div><div><input type="number" name="field'+last_slot+'_1" id="field'+last_slot+'_1" value="0"></div><div><input type="number" name="field'+last_slot+'_2" id="field'+last_slot+'_2" value="0"></div><div><input type="number"name="field'+last_slot+'_3"  id="field'+new_slot+'_3" value="0"></div>    </div>';
    $(fieldHtml).insertBefore(".btn_style");
    }
    });
});

$('input').on('focusin', function() {
  var updated_field= $(this).attr("id") ;
  var slot_id = $("#update_slot").val(updated_field);
});

$("#update_slot").click(function(){
   var slot_field = $(this).val();
   if(slot_field==""){
    $(".msg").text("Please select field to update");      
   }else{
    var updated_val= $("#"+slot_field).val();
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
        type: "POST",
        url: "{{route('update.slot')}}",
        data: slot_field +'='+updated_val ,
        success: function(msg) {
            if(msg.success){
                $(".msg").html(msg.success);
            }else{
                $.each(msg, function (index, value)  
                    {  
                        $(".msg").html(value); 
                    });  
            
            }
           }        });
    }
});

</script>


