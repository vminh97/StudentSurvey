 $(document).ready(function(){
        $("#id_faculty").change(function(){
            var vien = $(this).val();
            $.get("admin/ajax/nganh"+vien,function(data){
                alert(data);
                $("id_branch").html('data');
            })
        })
    })
    $(document).ready(function(){
    
        $(document).on('change','.faculty1',function(){
              // console.log("hmm its change");
   
          var cat_id=$(this).val();
          // console.log(cat_id);
          var div=$(this).parent();
   
          var op=" ";
   
          $.ajax({
            type:'get',
            url:'{!!URL::to('findProductName')!!}',
            data:{'id':cat_id},
            success:function(data){
              // console.log('success');
   
              // console.log(data);
   
              // console.log(data.length);
              op+='<option value="0" selected disabled>Chọn Ngành</option>';
              for(var i=0;i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].NameBranch+'</option>';
              }
   
              div.find('.branch1').html(" ");
              div.find('.branch1').append(op);
            },
            error:function(){
   
            }
          });
        });
       
      });