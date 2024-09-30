<?php

class M_data extends CI_Model
{

	// FUNGSI CRUD
	// fungsi untuk mengambil data dari database
	function get_data($table, $kol1, $kol2)
	{
		$id = $this->session->userdata('tahun');
		$this->db->where($kol1, $id);
		$this->db->order_by($kol2, 'DESC');
		return $this->db->get($table);
	}

	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	// fungsi untuk mengedit data
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function get_all($table, $kol2)
	{
		$this->db->order_by($kol2, 'DESC');
		return $this->db->get($table);
	}

	function get_disposisi($table)
	{
		$this->db->where('status', 1);
		$this->db->where('suratinstansi !=', NULL);
		$this->db->order_by('id', 'DESC');
		return $this->db->get($table);
	}

	function pejabat()
	{
		$array = array('typeId >=' => 2, 'typeId <=' => 11);
		$this->db->where($array);
		return $this->db->get('tbtypeuser');
	}

	function disp_add($dispoke)
	{
		//Insert Tabel Disposisi
		$userid = $this->session->userdata['userId'];
		$noreg = $this->input->post('surat_id'); //noreg
		$dispo_dari = $this->session->userdata['userType'];
		$dispo_ke =$dispoke;
		$create_user = $userid;
		$tgl = date('Y-m-d H:i:s');
		$perihalsurat=isset($_POST['tentang'])?$_POST['tentang']:'';
		$disposisicatatan=isset($_POST['isi'])?$_POST['isi']:'';
		$dok=isset($_POST['dok'])?$_POST['dok']:'';
		//var_dump($dispo_ke);
		$dispokode= $noreg.'_'.$dispo_dari.'_'.$dispoke;
		$resultdispo = $this->db->query("insert tbdisposisi (disposisi_kode,disposisi_noreg,disposisi_dari,disposisi_ke,create_user) values ('$dispokode','$noreg','$dispo_dari','$dispoke','$create_user') ");
		$jab = $this->db->query("SELECT * FROM tbtypeuser WHERE typeId=$dispoke")->result();
		foreach ($jab as $key => $value) {
			if($value->typeJab !=''){
				$hasilJ[] = $value->typeJab;
		}}
		$dtdispo = $this->db->query("select ifnull(userWA,'') as userWA from tbuser where ifnull(userWA,'') <> '' and userType = '$dispoke' ")->result();
		if ($row->userWA != ''){
		
			$lembar = base_url().'index.php/data/lembardisposisi?q='.$noreg;
			$dok = str_replace(viewdoc(),'',$dok);
			$dok = viewdoc().$dok;
			$msg = "📨 *Disposisi Surat*\n✉️ Agenda No: *$noreg*\n✉️ Perihal:*$perihalsurat*\n✉️ Isi Disposisi: *$disposisicatatan*\n✉️ File Surat: $dok\n✉️ Lembar Disposisi: $lembar\n✉️ Disposisi dari: *$dispo_dari*\nNote: Simpan terlebih dahulu nomor WA ini jika link diatas tidak aktif. -SANTUN Kemenag Kab. Ngawi-";
			sendWA($row->userWA,$msg,'Disposisi');
		    }
		
		$x = implode(",",$dispo_ke);
		$y = implode(",", $hasilJ);
				if ($x != '' && $disposisicatatan != ''){
					$status = 3;
				}
				$result = $this->db->query("update tbsuratmasuk set status = '$status',updatedispotgl = current_timestamp(),disposisiid = '$x',disposisi = '$y', disposisicatatan = '$disposisicatatan' where noreg = '$noreg' ");
        var_dump($result);
	}
}
