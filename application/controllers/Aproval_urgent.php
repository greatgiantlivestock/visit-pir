<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aproval_urgent extends CI_Controller {

	public function index($id="") {
		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {
			$d['judul'] = "Aproval Kunjungan";
					$d['tipe'] = "edit";
					$d['color'] = 'style="background:#ffffe1;"';
					$d['btn_batal'] = '<a class="btn btn-xs btn-default" style="margin-left: 40px;" href="'.base_url().'customer">
										<i class="ace-icon fa fa-undo"></i>
										<span class="bigger-110">Batal</span></a>';
					$d['customer'] = $this->App_model->get_aproval_urgent();
					$d['btn_batal_edit'] = '';
					
					$d['btn_name'] = "Ubah";
					$d['btn_nota'] = '<button class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> Simpan</button>';
					$d['disable'] = '';

					$d['readonly'] = '';

			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('aproval_urgent/aproval_urgent_table');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}	
	}

	public function get_aproval() {
		$id_rencana_header = $this->input->post("id_rencana_header");
		$no = 1;	
		$get = $this->db->query("SELECT trm.id_rencana_header,id_rencana_detail,tanggal_rencana,trd.active,nama,name1,desa FROM trx_rencana_master trm JOIN trx_rencana_detail trd 
								ON trm.id_rencana_header=trd.id_rencana_header JOIN mst_user mu ON trm.id_user_input_rencana=mu.id_user WHERE trd.active=2 and urgent='0' AND trm.id_rencana_header='$id_rencana_header'");
		echo '<table class="table table-bordered">
					<thead>
						<tr>
							<th>PPL</th>
							<th>Nama Petani</th>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>';
		foreach($get->result_array() as $data) { 
					echo '<tr>
							<td>'.$data['nama'].'</td>
							<td>'.$data['name1'].'</td>
							<td>'.$data['desa'].'</td>
						  </tr>';
		$no++; }
		echo		'</tbody>
				</table>';	
	}
}



