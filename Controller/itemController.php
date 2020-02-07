<?php 
	include_once './dbCon.php';
	include_once './itemImpl.php';
	$request = (isset($_REQUEST['REQUEST'])) ? $_REQUEST['REQUEST'] : "";
	switch ($request) {

		// Tìm tất cả sản phẩm có trong danh mục con = tên danh mục con (AJAX JSON):----------------------------------------------------------------------Pass
		case 'getAllItemByClassifyingName':
			getAllItemByClassifyingName();
			break;
		// Lấy tất cả item từ CSDL (Sử dụng AJAX JSON)-------------------------------Pass
		case 'getAllItem':
			getAllItem();
			break;
		//  Lấy item có id = ? (Sử dụng AJAX JSON)-----------------------------------Pass
		case 'getItemByID':
			getItemByID();
			break;
		// Lấy tất cả các item có trong Category có id = ? (Sử dụng AJAX JSON)--------Pass
		case 'getItemByCategoryID':
			getItemByCategoryID();
			break;
		// Lấy 4 sản phẩm bán chạy nhất (sử dụng AJAX JSON JSON) ------------------------Pass
		case 'getItemTopSeller':
			getItemTopSeller();
			break;
		// Lấy sản phẩm bán được nhiều nhất (sử dụng AJAX JSON)------------------------Pass
		case 'getItemBestSeller':
			getItemBestSeller();
			break;
		// Lấy 4 sản phẩm được xem nhiều nhất (sử dụng AJAX JSON) -------------------(Pass)
		case 'getItemTopView':
			getItemTopView();
			break;
		// Lấy sản phẩm được xem nhiều nhất (sử dụng AJAX JSon)--------------------------Pass
			case 'getItemBestView':
			getItemBestView();
			break;
		// Tăng số lần xem khi xem 1 sản phẩm (sử dụng AJAX Text)------------------------------Pass
			case 'autoIncrementViewItem':
			autoIncrementViewItem();
			break;
		// Hàm thống kê số lượng hàng bán ra (kết quả trả về :id,sum JSON) ------------------Pass
		case 'countSoldItem':
			countSoldItem();
			break;
		// Thêm 1 sản phẩm với các thông tin : name ... (ko cần id) (Sử dụng AJAX TEXT)------Pass
		case 'addItem':
			addItem();
			break;
		// Xóa sản phẩm với id = ? (Sử dụng AJAX TEXT)---------------------------------Pass
		case 'deleteItem':
			deleteItem();
			break;
		// Cập nhật Item với các thông tin : id,name.....(Sử dụng AJAX TEXT) -----------Pass
		case 'updateItem':
			updateItem();
			break;
		default:
			getAllItem();
			break;
	}
 ?>
 