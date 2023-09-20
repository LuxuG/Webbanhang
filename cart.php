<?php 
require_once('layouts/header1.php');
?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		<table class="table table-bordered">
			<tr>
				<th>STT</th>
				<th>Ảnh Mô Tả</th>
				<th>Tiêu Đề</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng Giá</th>
				<th></th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
$total = 0;
foreach($_SESSION['cart'] as $item) {
	$total += $item['discount'] * $item['num'];
	echo '<tr>
			<td>'.(++$index).'</td>
			<td><img src="'.$item['thumbnail'].'" style="height: 80px"/></td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>
			<td style="display: flex"><button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
				<input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
			</td>
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
			<td><button class="btn btn-danger" onclick="updateCart('.$item['id'].', 0)">Xoá</button></td>
		</tr>';
}
?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<th>Tổng Tiền</th>
				<th><?=number_format($total)?> VND</th>
				<td></td>
			</tr>
		</table>
		<div style="margin-top: 20px; margin-bottom: 50px; margin: 0px">
			<a href="checkout.php"><button class="btn btn-success" style="border-radius: 0px; font-size: 26px; float:left;">TIẾP TỤC THANH TOÁN</button></a>

			<a href="#remove_cart"><button class="btn btn-secondary" style="border-radius: 0px; font-size: 26px; float:right" onclick="removeAllCart()">XOÁ GIỎ HÀNG</button></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	function addMoreCart(id, delta) {
		num = parseInt($('#num_' + id).val())
		num += delta
		$('#num_' + id).val(num)

		updateCart(id, num)
	}

	function fixCartNum(id) {
		$('#num_' + id).val(Math.abs($('#num_' + id).val()))

		updateCart(id, $('#num_' + id).val())
	}

	function removeAllCart(){
		option = confirm('Bạn có muốn xoá hết giỏ hàng không?')
		if(option){
			$.post('api/ajax_request.php', {
			'action': 'remove_all_cart',
		}, function(data) {
			location.reload()
		})
		}
	}

	function updateCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'update_cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
require_once('layouts/footer.php');
?>