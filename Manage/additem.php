<form>
    <div class="col col-md-12" style="text-align: center; margin-top: 30px; margin-bottom: 30px">
        <h2>THÊM SẢN PHẨM</h2>
    </div>
    <div class="container">
        <div class="row" style="color: black; text-align: left; margin-left: 150px">
            <div class="col col-md-8">
                Tên sản phẩm
                <input type="text" value="" name="name" id="name" 
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
                Giá thành sản phẩm
                <input type="number" value="" name="price" id="price"
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
                Số lượng
                <input type="number" value="" name="quantity" id="quantity" 
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
                Category
                <select name=category style="border: solid 1px black; border-radius: 10px" id="selectCategory">
                    <?php 
                        $LIST=getAllCategoryPHP();
                        $list=json_decode($LIST,true);
                        foreach ($list as $val) {
                            echo '<option value='.$val['id'].'>'.$val['name'].'</option>';
                        }
                     ?>
                </select> <br /><br />
                Classifying
                <input type="text" value="" name="classifying" id="txtClassifying"
                        style="border: solid 1px black; border-radius: 10px; width: 300px; hejght: 40px"> <br /> <br />
            </div>
            <div class="col col-md-4">
            Url Image:
            <input type="text" value="" name="url-image" id="image">
            </div>
            <div class="col col-md-12">
                <p>Mô tả sản phầm</p>
                <textarea rows="4" cols="100%" style="border: solid 1px black; border-radius: 10px" id="des">
                </textarea>
                <br /> <br />
            </div>
        </div>
    </div>
    <div class="col col-md-12" style="text-align: center">
        <button type="button" class="btn btn-secondary additem" style="border-radius: 20px; font-size: 30px">THÊM</button>
        <br /> <br/>
    </div>
</form>
<script>
$('.additem').click(function(){
    var name = $('#name').val();
    var price = $('#price').val();
    var quantity = $('#quantity').val();
    var des = $('#des').val();
    var url = $('#image').val();
    var classifying = $('#txtClassifying').val();
    var category = $('#selectCategory').val();
    console.log(name, price , quantity , des , url , classifying, category);
    $.ajax({
        url : '../Controller/itemController.php',
        type : 'post',
        dataType : 'text',
        data : {
            REQUEST: 'addItem',
            name: name,
            price: price,
            quantity: quantity,
            des: des,
            categoryID: category,
            classifyingName: classifying,
            url: url,
        },
        success : function(data){
            console.log(data);
        }
    });
})
</script>