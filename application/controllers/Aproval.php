<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aproval extends CI_Controller {

	public function index($id="") {
		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {
			$d['judul'] = "Aproval Kunjungan";
					$d['tipe'] = "edit";
					$d['color'] = 'style="background:#ffffe1;"';
					$d['btn_batal'] = '<a class="btn btn-xs btn-default" style="margin-left: 40px;" href="'.base_url().'customer">
										<i class="ace-icon fa fa-undo"></i>
										<span class="bigger-110">Batal</span></a>';
					$d['customer'] = $this->App_model->get_aproval();
					$d['btn_batal_edit'] = '';
					
					$d['btn_name'] = "Ubah";
					$d['btn_nota'] = '<button class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> Simpan</button>';
					$d['disable'] = '';

					$d['readonly'] = '';

			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('aproval/aproval_table');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}	
	}

	public function edit($id="") {
		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {
			$d['judul'] = "Edit Customer";			
			if($id != "") { 
				$d['id_customer'] = $id;
				$get_id = $this->db->query("SELECT * FROM mst_customer WHERE id_customer = '$id'");
				if($get_id->num_rows() > 0) {
					$d['tipe'] = "edit";
					$d['color'] = 'style="background:#ffffe1;"';
					$d['btn_batal'] = '<a class="btn btn-xs btn-default" style="margin-left: 40px;" href="'.base_url().'customer">
					<i class="ace-icon fa fa-undo"></i>
					<span class="bigger-110">Batal</span></a>';
					foreach($get_id->result() as $data) {
						$d['kode_customer'] = $data->kode_customer;
						$d['nama_customer'] = $data->nama_customer;
						$d['alamat_customer'] = $data->alamat;
						$d['no_hp'] = $data->no_hp;
						$d['no_ktp'] = $data->no_ktp;
						$d['nama_usaha'] = $data->nama_usaha;
						$d['combo_wilayah'] = $this->App_model->get_combo_wilayah_id($data->id_wilayah);
						$d['combo_status_customer'] = $this->App_model->get_combo_status_customer($data->id_status_customer);
						$d['lats'] = $data->lats;
						$d['longs'] = $data->longs;
					}
					$d['customer_alamat_kirim'] = $this->App_model->get_customer_alamat_kirim($id);
					$d['btn_batal_edit'] = '';
					
					$d['btn_name'] = "Ubah";
					$d['btn_nota'] = '<button class="btn btn-xs btn-success"><i class="fa fa-check"> </i> Simpan </button>';
					$d['btn_add_alamat'] = '<button class="btn btn-xs btn-primary"><i class="fa fa-plus"> </i> Tambah Alamat Kirim</button>';
					$d['btn_batal'] = '<button class="btn btn-xs btn-danger"><i class="fa fa-undo"> </i>Batal</button>';
					$d['disable'] = '';

					$d['readonly'] = '';

				} else {
					redirect("error");
				}
			}
	
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('customer/customer_edit');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}	
	}

	function generate_code(){
		$modul=$this->input->post('modul');
		$id_wilayah=$this->input->post('id_wilayah');

		$max_jml = $this->db->query("SELECT COUNT(id_customer) AS jumlah FROM mst_customer WHERE id_wilayah = $id_wilayah")->row();
		$kode = $this->db->query("SELECT kode_wilayah FROM mst_wilayah WHERE id_wilayah = $id_wilayah")->row();
		
		$kode_cust=$kode->kode_wilayah.str_pad($max_jml->jumlah+1, 5,'0', STR_PAD_LEFT);
		if($modul=="generate_kode"){
			echo strval($kode_cust);
		}
	}

	public function cetak($id) {
		$get_detail = $this->db->query("SELECT trx_rencana_master.tanggal_rencana, process_detail.id_rencana_header, process_detail.id_rencana_detail, process_detail.qty, process_detail.no_box,process_detail.id_product, mst_product.nama_product FROM process_detail LEFT JOIN trx_rencana_master ON trx_rencana_master.id_rencana_header = process_detail.id_rencana_header LEFT JOIN mst_product ON mst_product.id_product = process_detail.id_product WHERE process_detail.id_rencana_header = '$id' ORDER BY process_detail.id_rencana_detail DESC");

		$this->load->library('Zend');
	    $this->zend->load('Zend/Barcode');
		foreach($get_detail->result_array() as $data) {
			$id_product = str_pad($data['id_product'], 3, '0', STR_PAD_LEFT);
			$qty = str_pad($data['qty'], 3, '0', STR_PAD_LEFT);
			$no_box = str_pad($data['no_box'], 3, '0', STR_PAD_LEFT);
			$kode = $data['tanggal_rencana']."-".$no_box."-".$id_product.$qty;
			$file =  Zend_Barcode::draw('code39', 'image', array('text'=>$kode,'font'=>4, array()));
			$store_image = imagepng($file,"./barcode/{$kode}.png");			
			$in['barcode'] = $kode.".png";
			$in['id_rencana_header'] = $id;
			$cek_barcode = $this->db->query("SELECT * FROM tmp_barcode WHERE barcode = '$in[barcode]' AND id_rencana_header='$id'");
			if($cek_barcode->num_rows() <= 0) {
				$this->db->insert("tmp_barcode",$in);
			}
			
			$this->load->view("barcode/barcode_print");
		}
	}

	public function get_aproval() {
		$id_rencana_header = $this->input->post("id_rencana_header");
		$no = 1;	
		$get = $this->db->query("SELECT trm.id_rencana_header,id_rencana_detail,tanggal_rencana,trd.active,veraa_user,name1,desa FROM trx_rencana_master trm JOIN trx_rencana_detail trd 
							ON trm.id_rencana_header=trd.id_rencana_header WHERE trd.active=1 and urgent='0' AND trm.id_rencana_header='$id_rencana_header'");
		echo '<table class="table table-bordered">
					<thead>
						<tr>
							<th><input type="checkbox" onClick="all_check(this)" /> <span class="lbl"></span></th>
							<th>PPL</th>
							<th>Nama Petani</th>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>';
		foreach($get->result_array() as $data) { 
					echo '<tr>
							<td><input class="check" type="checkbox" name="ck_id_detail[]" value="'.$data['id_rencana_detail'].'" checked>
								<span class="lbl"></span>
							</td>
							<td>'.$data['veraa_user'].'</td>
							<td>'.$data['name1'].'</td>
							<td>'.$data['desa'].'</td>
						  </tr>';
		$no++; }
		echo		'</tbody>
				</table>';	
	}

	public function save_aproval() {
		if($this->session->userdata('id_role') == "4") {
			$id_rencana_header = $this->input->post("id_rencana_header");
			$in['aproved'] = '1';
			$in['approved_by'] = $this->session->userdata("id_user");
			$this->db->update("trx_rencana_master",$in,array('id_rencana_header' => $id_rencana_header));				
			foreach($this->input->post("ck_id_detail") as $data_id) {
				$this->db->update("trx_rencana_detail",array('active' => '2'),array('id_rencana_detail' => $data_id));
			}
			$this->session->set_flashdata("success","Rencana berhasil di aprove.");
			redirect("Aproval");	
		} else {
			redirect("login");
		}
	}

	public function save() {
		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {
			$required = array('kode_customer','nama_customer','id_wilayah','city','alamat');
			$error = false;
			foreach($required as $field) {
				if(empty($_POST[$field])) {
					$error = true;
				}
			}
			$tipe = $this->input->post("tipe");	

			$in['kode_customer'] 	= $this->input->post('kode_customer');
			$customer_input = $this->input->post('nama_customer');
			$customer_input1 = str_replace("'", " ", $customer_input);
			$in['nama_customer'] =  strtoupper($customer_input1);
			$in['no_hp'] 	= $this->input->post('no_hp');
			$in['nama_usaha'] 	= strtoupper($this->input->post('nama_usaha'));
			$in['id_wilayah'] = $this->input->post('id_wilayah');
			$in['city'] = strtoupper($this->input->post('city'));
			$in['alamat'] 	= strtoupper($this->input->post('alamat'));
			$in['no_ktp'] 	= $this->input->post('no_ktp');
			
			$in['lats'] 	= '0';
			if ($this->input->post('lats') != ""){
				$in['lats'] 	= $this->input->post('lats');
			}

			$in['longs'] 	= '0';
			if ($this->input->post('longs') != ""){
				$in['longs'] 	= $this->input->post('longs');
			}

			if($tipe == "add") {
				$in['id_status_customer'] 	= 2;
				$kode_check=$this->input->post('kode_customer');	
				$nama_check=str_replace("'", " ", $this->input->post('nama_customer'));	
				$nope_check=$this->input->post('no_hp');	
				$qval1=$this->db->query("SELECT count(kode_customer) as jumlah_customer from mst_customer where kode_customer ='$kode_check'")->row();

				$qval2=$this->db->query("SELECT * from mst_customer where nama_customer ='$nama_check' AND no_hp ='$nope_check'")->row();
				if($error) {
					$this->session->set_flashdata("error","Gagal, Mohon input data customer dengan lengkap");
					redirect("customer");	
				} else if($qval1->jumlah_customer > 0) {
					$this->session->set_flashdata("error","Data customer sudah diinput sebelumnya");							
					redirect("customer");
				}else{
					if($qval2 == ''){
						$this->db->insert("mst_customer",$in);
						//$last_id = $this->db->insert_id();

						//$inAlamat['alamat_kirim'] 	= strtoupper($this->input->post('alamat'));
						//$inAlamat['id_customer'] 	= $last_id;
						//$this->db->insert("alamat_kirim",$inAlamat);
						
						$this->session->set_flashdata("success","Customer baru berhasil dtambahkan");
						redirect("customer");
					}else{
						$this->session->set_flashdata("error","Gagal, customer sudah terdaftar dengan kode ".$qval2->kode_customer);							
						redirect("customer");						
					}
				}
			} else if($tipe = 'edit') {
					$in['id_status_customer'] = $this->input->post('id_status_customer');
					$where['id_customer'] = $this->input->post('id_customer');
					$this->db->update("mst_customer",$in,$where);
					$this->session->set_flashdata("success","Edit customer Berhasil");
					redirect("customer");	
						
			} else if($tipe = 'hapus'){
				$del['id_status_customer'] = 0;
				$whereDelete['id_customer'] = $this->input->post('id_customer');;
				$this->db->update("mst_customer",$del,$whereDelete);
				$this->session->set_flashdata("success","Hapus Data Customer Berhasil");
				redirect("customer");
			}else {
				redirect("customer");
			}
		} else {
			redirect("login");
		}
	}

	public function save_detail() {
		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {
			$required = array('id_wilayah','kode_customer','nama_customer','alamat','no_hp','nama_usaha');
			$error = false;
			foreach($required as $field) {
				if(empty($_POST[$field])) {
					$error = true;
				}
			}

			$tipe = $this->input->post("tipe");
			$in['kode_customer'] 	= $this->input->post('kode_customer');
			$in['nama_customer'] 	= str_replace("'", " ", $this->input->post('nama_customer'));
			$in['alamat'] 	= $this->input->post('alamat');
			$in['no_hp'] 	= $this->input->post('no_hp');
			$in['lats'] 	= '0';
			$in['longs'] 	= '0';
			$in['id_wilayah'] = $this->input->post('id_wilayah');

			$where['id_customer'] = $this->input->post('id_customer');

			$this->load->library('Zend');
	        $this->zend->load('Zend/Barcode');

			if($tipe == "edit") {	
				if($error) {
					$this->session->set_flashdata("error","Inputan tidak boleh kosong");
					redirect("customer/index/".$this->input->post('id_customer'));	
				} else {				
					$this->db->update("mst_customer",$in,$where);
					$this->session->set_flashdata("success","Edit processing Detail Berhasil");
					redirect("customer");			
				}		
			} else {
				redirect("customer");
			}
		} else {
			redirect("login");
		}
	}

	public function add_alamat_kirim() {
		if($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") {
			$required = array('id_customer','alamat_kirim');
			$error = false;
			foreach($required as $field) {
				if(empty($_POST[$field])) {
					$error = true;
				}
			}

			$tipe = $this->input->post("tipe");
			$in['id_customer'] 	= $this->input->post('id_customer');
			$in['alamat_kirim'] = strtoupper($this->input->post('alamat_kirim'));

			$where['id_customer'] = $this->input->post('id_customer');

			if($tipe == "add") {	
				if($error) {
					$this->session->set_flashdata("error","Masukkan Data dengan lengkap");
					redirect("customer/edit/".$this->input->post('id_customer'));	
				} else {				
					$this->db->insert("alamat_kirim",$in);
					$this->session->set_flashdata("success","Tambah alamat kirim selesai");
					redirect("customer/edit/".$this->input->post('id_customer'));			
				}		
			} else {
				redirect("customer/edit/".$this->input->post('id_customer'));
				$this->session->set_flashdata("error","tipe belum ada");
			}
		} else {
			redirect("login");
		}
	}

	public function hapus_customer() {
		if($this->session->userdata('id_role') == "4" || $this->session->userdata('id_role') == "1") {			
			//$this->db->delete("mst_customer",array('id_customer' => $id));		
			$in['id_status_customer'] = 0;
			$where['id_customer'] = $this->input->post('id_customer');
			$this->db->update("mst_customer",$in,$where);
			$this->session->set_flashdata("success","Hapus Data Customer Berhasil");
			redirect("customer");		
		} else {
			redirect("login");
		}
	}
	public function hapus_alamat_kirim($id="", $idt="") {
		if($this->session->userdata('id_role') == "4" || $this->session->userdata('id_role') == "1" && $id != null && $idt != null) {			

			$this->db->delete("alamat_kirim",array('id_alamat_kirim' => $id));		

			$this->session->set_flashdata("error","Hapus Data Alamat Kirim Berhasil");		
			redirect("customer/edit/".$idt);
		} else {
			redirect("login");
		}
	}

}



