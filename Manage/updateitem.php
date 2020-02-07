<form>
    <div class="col col-md-12" style="text-align: center; margin-top: 30px; margin-bottom: 30px">
        <h2>CHỈNH SỬA THÔNG TIN SẢN PHẨM</h2>
    </div>
    <div class="container">
        <div class="row" style="color: black; text-align: left; margin-left: 150px">
            <div class="col col-md-8">
                <span>Mã sản phẩm</span>
                <input type="text" value="" name="name" class="id"
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
                <span>Tên sản phẩm</span>
                <input type="text" value="" name="name" class="name"
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
                <span>Giá thành sản phẩm</span>
                <input type="number" value="" name="price" class="price"
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
                <span>Số lượng</span>
                <input type="number" value="" name="quantity" class="quantity"
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
            </div>
            <div class="col col-md-4">
                Url-image
                <input type="text" value="" name="url-image" class="image">
            </div>
            <div class="col col-md-12">
                <p>Mô tả sản phầm</p>
                <textarea class="des" rows="4" cols="100%" style="border: solid 1px black; border-radius: 10px">
                </textarea>
                <br /> <br />
            </div>
        </div>
    </div>
    <div class="col col-md-12" style="text-align: center">
        <button type="button" id="updateItem" class="btn btn-secondary" style="border-radius: 20px; font-size: 30px">UPDATE</button>
        <br /> <br/>
    </div>
</form>
<script>
$('#updateItem').click(function(){
    var id = $('.id').val();
    var name = $('.name').val();
    var price = $('.price').val();
    var quantity = $('.quantity').val();
    var des = $('.des').val();
    var url = $('.image').val();
    
    $.ajax({
        url : '../Controller/itemController.php',
        type : 'post',
        dataType : 'text',
        data : {
            REQUEST: 'updateItem',
            id : id,
            name: name,
            price: price,
            quantity: quantity,
            des: des,
            url: url
        },
        success : function(data){
            console.log(data);
        }
     });
})
</script>