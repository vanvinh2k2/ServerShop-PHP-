<?php
	require "connect.php";
	$query = "SELECT * FROM sanpham";
	$data = mysqli_query($connect,$query);
	class SanPham{
		public $Id;
		public $TenSanPham;
		public $HinhAnh;
		public function __construct($id,$tensanpham,$hinhanh){
			$this->Id = $id;
			$this->TenSanPham = $tensanpham;
			$this->HinhAnh = $hinhanh;
		}
	}
	$mang_sanPham = array();
	while($row = mysqli_fetch_assoc($data)){
		array_push($mang_sanPham, new SanPham($row["id"],$row["tensanpham"],$row["hinhanh"]));
	}

	if(!empty($mang_sanPham)){
		$arr = array(
			'success' => true,
			'message' => "thanh cong",
			'result' => $mang_sanPham
		);
	}else{
		$arr = array(
			'success' => false,
			'message' => "ko thanh cong",
			'result' => $mang_sanPham
		);
	}
	$xml = new SimpleXMLElement('<root/>');

	foreach ($mang_sanPham as $sanpham) {
	    $sanpham_xml = $xml->addChild('SanPham');
	    $sanpham_xml->addChild('Id', $sanpham->Id);
	    $sanpham_xml->addChild('TenSanPham', $sanpham->TenSanPham);
	    $sanpham_xml->addChild('HinhAnh', $sanpham->HinhAnh);
	}

	// Xuất ra định dạng XML
	echo $xml->asXML();
?>