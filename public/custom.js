<script>
	$(document).ready(function(){
		$.ajax({
			url : './page/Home.php',
			dataType : 'text',
			type : 'post',
			success : function(data){
				$("#content").html(data);
			}
		});
		$('.item').click(function(){
			var itemID = $(this).attr('itemID');
			$.ajax({
				url : './page/DetailItem.php',
				dataType : 'text',
				type : 'post',
				data : {id:itemID},
				success : function(data){
					$("#content").html(data);
				}
			});
            $.ajax({
                data : {REQUEST:'autoIncrementViewItem',id:itemID},
                url : './Controller/itemController.php',
                dataType : 'text',
                type : 'post',
                success : function(data){
                    console.log(data+":"+itemID);
                }
            });
		});
        $('.category').click(function(){
            var categoryID=$(this).attr('categoryID');
            var categoryName=$(this).attr('categoryName');
            $.ajax({
                url : './page/ListItem.php',
                type : 'post',
                dataType : 'text',
                data : {REQUEST : 'category',id:categoryID,name:categoryName},
                success : function(data){
                    $('#content').html(data);
                }
            });
        });
        $('.classifying').click(function(){
            var Name=$(this).attr('name');
            $.ajax({
                url : './page/ListItem.php',
                type : 'post',
                dataType : 'text',
                data : {REQUEST : 'classifying',name:Name},
                success : function(data){
                    $('#content').html(data);
                }
            });
        });
		
	});
</script>