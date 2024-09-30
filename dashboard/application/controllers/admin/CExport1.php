<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Admincontroller'.EXT);

class CExport extends Admincontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->isLogin();
        $this->load->helper('app_helper');
    }

	public function index()
	{
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}

	function excelSuratmasukrekap(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and ifnull(layananTemplate,'') not in ('','web_konsul','web_legalisir') ";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		$wheredispo = " and disposisi_ke = 1 ";
		// if ($usertype > 0){
		// 	$wheredispo = " and disposisi_ke = '$usertype' ";
		// } else {
		// 	$wheredispo = " and disposisi_dari = '$usertype' ";
		// }

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['menuJudul'].'</td>
							<td  class="text">'.$dataRow['layananJenis'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['suratno'].'</td>
							<td  class="text">'.$dataRow['tglsurat'].'</td>
							<td  class="text">'.$dataRow['suratinstansi'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['surattujuan'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">LAYANAN</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">NOMOR SURAT</th>
				<th rowspan="2">TGL SURAT</th>
				<th rowspan="2">INSTANSI SURAT</th>
				<th rowspan="2">PERIHAL SURAT</th>
				<th rowspan="2">TUJUAN SURAT</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >UNIT KERJA</th>
				<th >LAYANAN</th>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
	function excelSuratkeluar(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$tipe = isset($_POST['tipe']) ? addslashes($_POST['tipe']) : '1';
		
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and surattipe = '$tipe' and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(createtgl,'%Y-%m-%d %H:%i') as tgl,date_format(surattgl,'%Y-%m-%d') as tglsurat from vwsuratkeluar ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$dataRow['nourut'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['surattgl'].'</td>
							<td  class="text">'.$dataRow['kodesurat'].'</td>
							<td  class="text">'.$dataRow['typeNama'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['surattujuan'].'</td>
							<td  class="text">'.$dataRow['userNama'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th>NOMOR URUT</th>
				<th>TGL.KELUAR</th>
				<th>TGL.SURAT</th>
				<th>KODE SURAT</th>
				<th>UNIT KERJA</th>
				<th>PERIHAL</th>
				<th>TUJUAN</th>
				<th>PENGAMBIL NO.SURAT</th>
				<th>KETERANGAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
	

	function excelbukutamu(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		if ($sort == 'tgl'){
			$sort = 'bt_tgl';
		}
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and date_format(bt_tgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(bt_tgl,'%Y-%m-%d %H:%i') as tgl from vwbukutamu ";
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order );
		$data = $rs->result_array();
		$i = 1;
		ini_set('precision', '15');
		$datatbl = "";
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td class="text">'.$i.'</td>
							<td class="text">'.$dataRow['tgl'].'</td>
							<td class="text">'.$dataRow['bt_nama'].'</td>
							<td class="text">'.$dataRow['bt_alamat'].'</td>
							<td class="text">'.$dataRow['bt_hp'].'</td>
							<td class="text">'.$dataRow['bt_email'].'</td>
							<td class="text">'.$dataRow['namalayanan'].'</td>
							<td class="text">'.$dataRow['bt_layananlain'].'</td>
							<td class="text">'.$dataRow['bt_pesan'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
					<tr>
						<th>NO</th>
						<th>TANGGAL</th>
						<th>NAMA LENGKAP</th>
						<th>ALAMAT LENGKAP</th>
						<th>NO.HP/WA</th>
						<th>EMAIL</th>
						<th>LAYANAN</th>
						<th>LAYANAN LAINNYA</th>
						<th>PESAN</th>
					</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}

	function excelikm(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		if ($sort == 'tgl'){
			$sort = 'ikm_tgl';
		}
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and date_format(ikm_tgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(ikm_tgl,'%Y-%m-%d %H:%i') as tgl from tbikm ";
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order );
		$data = $rs->result_array();
		$i = 1;
		ini_set('precision', '15');
		$datatbl = "";
		$vtstr = array('','Sangat Tidak Puas','Tidak Puas','Cukup Puas', 'Puas', 'Sangat Puas');
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td class="text">'.$i.'</td>
							<td class="text">'.$dataRow['tgl'].'</td>
							<td class="text">'.$dataRow['ikm_vt_layanan'].'</td>
							<td class="text">'.$vtstr[$dataRow['ikm_vt_layanan']].'</td>
							<td class="text">'.$dataRow['ikm_saran'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
					<tr>
						<th>NO</th>
						<th>TANGGAL VOTE</th>
						<th>NILAI</th>
						<th>VOTE</th>
						<th>SARAN</th>
					</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}

	function excelPengadaan(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and (disposisi_ke < 3 or disposisi_ke = 12) ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}

		$where = " where ". $icari . " like '%$ncari%' ".$wheredispo.$wherekode.$wheretgl.$wherestatus;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['suratno'].'</td>
							<td  class="text">'.$dataRow['suratinstansi'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th rowspan="2">NOMOR PT/CV</th>
				<th rowspan="2">NOMOR SPK</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
	function excelSuratmasuk(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['suratno'].'</td>
							<td  class="text">'.$dataRow['tglsurat'].'</td>
							<td  class="text">'.$dataRow['suratinstansi'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['surattujuan'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">NOMOR SURAT</th>
				<th rowspan="2">TGL SURAT</th>
				<th rowspan="2">INSTANSI SURAT</th>
				<th rowspan="2">PERIHAL SURAT</th>
				<th rowspan="2">TUJUAN SURAT</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}

	function excelPermohonan(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['suratno'].'</td>
							<td  class="text">'.$dataRow['tglsurat'].'</td>
							<td  class="text">'.$dataRow['suratinstansi'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">NOMOR SURAT</th>
				<th rowspan="2">TGL SURAT</th>
				<th rowspan="2">INSTANSI/LEMBAGA SURAT</th>
				<th rowspan="2">PERIHAL SURAT PERMOHONAN</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
	function excelPais(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">PERIHAL SURAT PERMOHONAN</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
	function excelSuruq(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'rekomid';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwsuruq ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['tglsurat'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonhp'].'</td>

							<td  class="text">'.$dataRow['travelnama'].'</td>
							<td  class="text">'.$dataRow['travelnosurat'].'</td>
							<td  class="text">'.$dataRow['traveltglsurat1'].'</td>
							<td  class="text">'.$dataRow['jamaahnama'].'</td>
							<td  class="text">'.$dataRow['jamaahlhrtmp'].'</td>
							<td  class="text">'.$dataRow['jamaahlhrtgl1'].'</td>
							<td  class="text">'.$dataRow['jamaahalamat'].'</td>
							<td  class="text">'.$dataRow['jamaahhp'].'</td>

						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">TGL SURAT</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
				<th colspan="3">TRAVEL</th>
				<th colspan="5">JAMAAH</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>

				<th >NAMA</th>
				<th >NOMOR SURAT</th>
				<th >TGL SURAT</th>

				<th >NAMA</th>
				<th >TEMPAT LAHIR</th>
				<th >TGL LAHIR</th>
				<th >ALAMAT</th>
				<th >HP</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}

	function excelKonsul(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}

		$where = " where ". $icari . " like '%$ncari%' ".$wheredispo.$wherekode.$wheretgl.$wherestatus;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['ftanya'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th rowspan="2">ISI KONSULTASI</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >JAWABAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}

	function excelLegalisir(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">PERIHAL SURAT</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}


	function excelTenagaasing(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$select = $tabel.$where;
		$rs = $this->db->query($select . " order by ". $sort . " ". $order);
		$data = $rs->result_array();
		ini_set('precision', '15');
		$datatbl = "";
		$i = 1;
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td  class="text">'.$i.'</td>
							<td  class="text">'.$dataRow['noreg'].'</td>
							<td  class="text">'.$dataRow['tgl'].'</td>
							<td  class="text">'.$dataRow['nmstatus'].'</td>
							<td  class="text">'.$dataRow['ket'].'</td>
							<td  class="text">'.$dataRow['disposisi'].'</td>
							<td  class="text">'.$dataRow['disposisicatatan'].'</td>
							<td  class="text">'.$dataRow['suratno'].'</td>
							<td  class="text">'.$dataRow['tglsurat'].'</td>
							<td  class="text">'.$dataRow['suratinstansi'].'</td>
							<td  class="text">'.$dataRow['suratperihal'].'</td>
							<td  class="text">'.$dataRow['surattujuan'].'</td>
							<td  class="text">'.$dataRow['pemohonnama'].'</td>
							<td  class="text">'.$dataRow['pemohonnowa'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
				<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2"><b>NOMOR LAYANAN</b></th>
				<th rowspan="2">TANGGAL</th>
				<th colspan="2">STATUS</th>
				<th colspan="2">DISPOSISI</th>
				<th rowspan="2">NOMOR SURAT</th>
				<th rowspan="2">TGL SURAT</th>
				<th rowspan="2">INSTANSI SURAT</th>
				<th rowspan="2">PERIHAL SURAT</th>
				<th rowspan="2">ALAMAT SELAMA DI INDONESIA</th>
				<th rowspan="2">NAMA LENGKAP PEMOHON</th>
				<th rowspan="2">NO.HP/WA PEMOHON</th>
			</tr>
			<tr>
				<th >STATUS</th>
				<th >KET</th>
				<th >UNIT</th>
				<th >CATATAN</th>
			</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
}
