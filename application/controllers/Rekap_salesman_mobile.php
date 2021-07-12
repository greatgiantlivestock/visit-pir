<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class rekap_salesman_detail extends CI_Controller {
	public function index($id="") {
		$row = $this->db->query("SELECT trm.*,nama_karyawan,name1,desa,trd.id_customer,status_rencana,trd.active,ckin.*,tanggal_checkout
							FROM trx_rencana_master trm JOIN trx_rencana_detail trd ON trm.id_rencana_header = trd.id_rencana_header
							JOIN mst_user mu ON trd.id_karyawan=mu.id_karyawan JOIN trx_checkin ckin ON trd.id_rencana_detail=ckin.id_rencana_detail 
							JOIN trx_checkout ckout ON ckout.id_rencana_detail=trd.id_rencana_detail 
							WHERE trm.id_rencana_header='6060' AND mu.active='1' GROUP BY trd.id_rencana_detail");
		$d['detail_visit'] = $row;
		$d['id'] = $id;
		$d['judul'] = "Detail Visit";
		$this->load->view('rekap_salesman/detail_mobile.php',$d);
		$this->load->view('bottom');
	}
}
